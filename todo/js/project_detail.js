$(function() {
    var project = null;
    
    $('.project_name').live('click', function() {
        var aryIds = $(this).attr('id').split(/_/g);
        
        project = findFromProject_id(aryIds.pop());
        if ( false != project ) {
            project_mode = PROJECT_MODE_DETAIL;
            
            $('#project_detail_name').text( project.project_name );
            
            if ( 'alive' == project.status ) {
                $('#btn_project_done').show();
                $('#btn_project_alive').hide();
            } else if ( 'finish' == project.status ) {
                $('#btn_project_done').hide();
                $('#btn_project_alive').show();
            }
            
            $('body').scrollTop(0);
            $('#modal_view_bg').show();
            $('#modal_project_detail').fadeIn('fast');
        }
    } );
    
    $('.btn_close_project_detail').click( function() {
        project_mode = null;
        
        $('#modal_view_bg').hide();
        $('#modal_project_detail').hide();
    } );
    
    $('#btn_project_done').click( function() {
        if ( null == project ) {
            return;
        }
        
        if ( confirm("プロジェクト[" + project.project_name + "]を完了します。よろしいですか？") ) {
            $.ajax( {
                url: './edit_project.html',
                type: 'post',
                data: 'mode=done&id=' + project.id,
                dataType: 'json',
                success: function(json) {
                    if ( json.result == true ) {
                        location.reload();
                    }
                }
            } );
        }
    } );
    
    $('#btn_project_alive').click( function() {
        if ( null == project ) {
            return;
        }
        
        $.ajax( {
            url: './edit_project.html',
            type: 'post',
            data: 'mode=alive&id=' + project.id,
            dataType: 'json',
            success: function(json) {
                if ( json.result == true ) {
                    location.reload();
                }
            }
        } );
    } );
    
    $('#btn_project_edit').click( function() {
        if ( null == project ) {
            return;
        }
        project_mode = PROJECT_MODE_EDIT;
        
        $('#edit_project_id').val( project.id );
        $('#modal_create_project [name=project_name]').val(project.project_name);
        $('#modal_create_project [name=color_id]').each( function() {
            if ($(this).val() == project.label_color_id) {
                $(this).attr('checked', true);
            }
        } );
        
        $('body').scrollTop(0);
        $('#modal_project_detail').fadeOut('fast');
        $('#modal_create_project').fadeIn('fast');
    } );
    
    $('#btn_project_delete').click( function() {
        if ( null == project ) {
            return;
        }
        
        if ( confirm("プロジェクト[" + project.project_name + "]を削除します。よろしいですか？") ) {
            $.ajax( {
                url: './edit_project.html',
                type: 'post',
                data: 'mode=delete&id=' + project.id,
                dataType: 'json',
                success: function(json) {
                    if ( json.result == true ) {
                        //location.reload();
                        
                        for (var i = 0; i < project.tasks.length; i++) {
                            $('#task_calendar_' + project.tasks[i].id).remove();
                        }
                        
                        $('#projects_' + project.id).closest('.projects').remove();
                        $('#modal_view_bg').hide();
                        $('#modal_project_detail').hide();
                    }
                }
            } );
        }
    } );
});