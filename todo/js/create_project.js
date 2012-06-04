$(function() {
    $('.btn_create_project').click( function() {
        project_mode = PROJECT_MODE_CREATE;
        
        $('#modal_create_project [name=project_name]').val('');
        $('#modal_create_project [name=color_id]').each( function() {
            $(this).attr('checked', false);
        } );
        
        $('body').scrollTop(0);
        $('#modal_view_bg').show();
        $('#modal_create_project').fadeIn('fast', function() {
            $('#project_name').focus();
        });
    } );
    
    $('.btn_close_project').click( function() {
        $('#modal_view_bg').hide();
        $('#modal_create_project').hide();
    } );
    
    $('#modal_create_project form').submit( function() {
        var form = $(this);
        
        var url = form.attr('action');
        var mode = '';
        if ( PROJECT_MODE_CREATE == project_mode ) {
            if ( -1 != url.indexOf('edit')) {
                url = url.replace('edit', 'create');
            }
        } else if ( PROJECT_MODE_EDIT == project_mode ) {
            if ( -1 != url.indexOf('create')) {
                url = url.replace('create', 'edit');
            }
            
            mode = '&mode=edit';
        }
        
        $.ajax({
            url: url,
            type: form.attr('method'),
            data: form.serialize() + mode,
            dataType: 'json',
            success: function(json) {
                if ( false === json.result ) {
                    alert(json.reason.join("\n"));
                } else {
                    var prj_name = $('[name=project_name]').val();
                    var color_id = $('[name=color_id]:checked', form).val();
                    
                    if ( PROJECT_MODE_CREATE == project_mode ) {
                        var appendProject = '<div class="projects">\n\
                            <a href="javascript:void(0);" class="project_name" id="projects_' + json.id + '">\n\
                                <div class="color_label calendar_label_' + color_id + '"></div>\n\
                                ' + prj_name + '</a>\n\
                                <div class="projects_menu">\n\
                                    <div class="right">\n\
                                        <a href="javascript:void(0);" class="btn_create_task" id="btn_create_task_' + json.id + '">タスクを追加</a>\n\
                                    </div>\n\
                                </div>\n\
                            </div>';
                        $('.project_list').append(appendProject);
                        
                        addProject( {
                            id: json.id,
                            project_name: prj_name,
                            label_color_id: color_id,
                            status: 'alive',
                            tasks: []
                        } );
                        //'id', 'project_name', 'label_color_id', 'status'
                    } else if ( PROJECT_MODE_EDIT == project_mode ) {
                        $('#projects_' + $('[name=id]', form).val()).html(
                            '<div class="color_label calendar_label_' + color_id + '"></div>' + prj_name
                        );
                            
                        editProject($('[name=id]', form).val(), {
                            project_name: prj_name,
                            label_color_id: color_id,
                        });
                    }
                    console.log(aryProjects);
                    
                    $('#modal_view_bg').hide();
                    $('#modal_create_project').hide();
                    //location.reload();
                }
            }
        });
        
        return false;
    } );
});