$(function() {
    var project = null;
    
    $('.task_list a, .calendar a.calendar_label').live('click', function() {
        var aryIds = $(this).attr('id').split('_');
        var id = aryIds.pop();
        
        project = findFromTask_id(id);
        
        if ( false != project ) {
            task_mode = TASK_MODE_DETAIL;
            
            if ( 'yet' == project.task.status ) {
                $('#btn_task_done').show();
                $('#btn_task_yet').hide();
            } else if ( 'done' == project.task.status ) {
                $('#btn_task_done').hide();
                $('#btn_task_yet').show();
            }
            
            $('#task_detail_name').text( project.task.task_name + '(' + project.project_name + ')' );
            $('#task_detail_options').html( project.task.options.h() );
            $('#task_detail_date').text(project.task.schedule_date.replace(/-/g, '/'));
            
            $('body').scrollTop(0);
            $('#modal_view_bg').show();
            $('#modal_task_detail').fadeIn('fast');
        }
    });
    
    $('.btn_close_task_detail').click( function() {
        task_mode = null;
        
        $('#modal_view_bg').hide();
        $('#modal_task_detail').hide();
    } );
    
    $('#btn_task_done').click( function() {
        if (null == project) {
            return;
        }
        
        if ( confirm("タスク[" + project.task.task_name + "]を完了します。よろしいですか？") ) {
            $.ajax( {
                url: './edit_task.html',
                type: 'post',
                data: 'mode=done&id=' + project.task.id,
                dataType:'json',
                success: function(json) {
                    if ( true == json.result ) {
                        location.reload();
                    }
                }
            } );
        }
    } );
    
    $('#btn_task_yet').click( function() {
        if (null == project) {
            return;
        }
        
        $.ajax( {
            url: './edit_task.html',
            type: 'post',
            data: 'mode=yet&id=' + project.task.id,
            dataType:'json',
            success: function(json) {
                if ( true == json.result ) {
                    location.reload();
                }
            }
        } );
    } );
    
    $('#btn_task_tomorrow').click( function() {
        if (null == project) {
            return;
        }
        
        $.ajax( {
            url: './edit_task.html',
            type: 'post',
            data: 'mode=tomorrow&id=' + project.task.id,
            dataType:'json',
            success: function(json) {
                if ( true == json.result ) {
                    location.reload();
                }
            }
        } );
    } );
    
    $('#btn_task_edit').click( function() {
        if (null == project) {
            return;
        }
        
        task_mode = TASK_MODE_EDIT;
        
        $('#edit_task_id').val(project.task.id);
        
        $('#modal_create_task form [name=task_name]').val(project.task.task_name);
        $('#modal_create_task form [name=options]').val(project.task.options);
        
        aryDate = project.task.schedule_date.split(/-/g);
        $('#modal_create_task form [name=schedule_year]').val(Number(aryDate[0]));
        $('#modal_create_task form [name=schedule_month]').val(Number(aryDate[1]));
        $('#modal_create_task form [name=schedule_day]').val(Number(aryDate[2]));
        
        $('#project_id').val(project.id);
        
        $('body').scrollTop(0);
        $('#modal_task_detail').fadeOut('fast');
        $('#modal_create_task').fadeIn('fast');
    } );
    
    $('#btn_task_delete').click( function() {
        if (null == project) {
            return;
        }
        
        if ( confirm("タスク[" + project.task.task_name + "]を削除します。よろしいですか？") ) {
            $.ajax( {
                url: './edit_task.html',
                type: 'post',
                data: 'mode=delete&id=' + project.task.id,
                dataType:'json',
                success: function(json) {
                    if ( true == json.result ) {
                        location.reload();
                    }
                }
            } );
        }
    } );
});