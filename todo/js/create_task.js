$(function() {
    var project_id;
    var fieldProject = null;
    
    var getMonthDay = function(year, month) {
        return new Date(year,month,0).getDate();
    }
    
    var getOptionDay = function(year, month, day) {
        var maxDay = getMonthDay(year, month);
        var option = '';
        
        for (var d = 1; d <= maxDay; d++) {
            if ( day == d ) {
                option += '<option value="' + d + '" selected="selected">' + d + '</option>';
            } else {
                option += '<option value="' + d + '">' + d + '</option>';
            }
        }
        
        return option;
    }
    
    var setOptionDay = function(year, month, day) {
        if ( undefined == year && undefined == month ) {
            var date = new Date();
            
            year = date.getFullYear();
            month = date.getMonth() + 1;
        }
        
        $('#modal_create_task form [name=schedule_day]').html( getOptionDay(year, month, day) );
    }
    
    setOptionDay();
    
    $('#modal_create_task form [name=schedule_year]').change( function() {
        var year  = $(this).val();
        var month = $('#modal_create_task form [name=schedule_month]').val();
        var day   = $('#modal_create_task form [name=schedule_day]').val();
        
        setOptionDay(year, month, day);
    } );
    
    $('#modal_create_task form [name=schedule_month]').change( function() {
        var year = $('#modal_create_task form [name=schedule_year]').val();
        var month = $(this).val();
        var day   = $('#modal_create_task form [name=schedule_day]').val();
        
        setOptionDay(year, month, day);
    } );
    
    $('.btn_create_task').live('click', function() {
        task_mode = TASK_MODE_CREATE;
        
        aryColumn = $(this).attr('id').match(/[0-9]+$/);
        project_id = aryColumn[0];
        
        $('#modal_create_task form [name=task_name]').val('');
        $('#modal_create_task form [name=options]').val('');
        $('#modal_create_task form [name=task_name]').get(0).focus();
        
        
        date = new Date();
        $('#modal_create_task form [name=schedule_year]').val(date.getFullYear());
        $('#modal_create_task form [name=schedule_month]').val(date.getMonth() + 1);
        $('#modal_create_task form [name=schedule_day]').val(date.getDate());
        
        $('#project_id').val(project_id);
        
        $('body').scrollTop(0);
        $('#modal_view_bg').show();
        $('#modal_create_task').fadeIn('fast', function() {
            $('#task_name').focus();
        });
    } );
    
    $('.calendar td').click( function() {
        var column_id = $(this).attr('id');
        if ( undefined != column_id ) {
            setTimeout(function() {
                if ( 2 != task_mode) {
                    task_mode = TASK_MODE_CREATE;
                    
                    var projectsOption = '<option value="">選択</option>';
                    for (var i = 0; i < aryProjects.length; i++) {
                        projectsOption += '<option value="' + aryProjects[i].id + '">' + aryProjects[i].project_name.h() + '</option>';
                    }
                    
                    var fieldProject = $('<div class="control-group">\n\
                <label class="control-label">\n\
                    プロジェクト名\n\
                </label>\n\
                <div class="controls">\n\
                    <select name="project_id">' + projectsOption + '</select>\n\
                </div>\n\
            </div>');
                    
                    $('#task_name_field').before(fieldProject);
                    
                    current_day = column_id.split(/_/g).pop();

                    $('#modal_create_task form [name=task_name]').val('');
                    $('#modal_create_task form [name=options]').val('');
                    $('#modal_create_task form [name=task_name]').get(0).focus();


                    date = new Date();
                    $('#modal_create_task form [name=schedule_year]').val(current_year);
                    $('#modal_create_task form [name=schedule_month]').val(current_month);
                    $('#modal_create_task form [name=schedule_day]').val(current_day);

                    $('#project_id').val('');

                    $('body').scrollTop(0);
                    $('#modal_view_bg').show();
                    $('#modal_create_task').fadeIn('fast', function() {
                        $('#task_name').focus();
                    });
                }
            }, 0.1);
        }
    } );
    
    $('.btn_close_task').live('click', function() {
        $('#modal_view_bg').hide();
        $('#modal_create_task').hide();
    } );
    
    $('#modal_create_task form').submit( function() {
        var form = $(this);
        
        var url = form.attr('action');
        var mode = '';
        if ( TASK_MODE_CREATE == task_mode ) {
            if ( -1 != url.indexOf('edit')) {
                url = url.replace('edit', 'create');
            }
        } else if ( TASK_MODE_EDIT == task_mode ) {
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
                    location.reload();
                    /*
                    var task_name      = $('[name=task_name]', form).val();
                    var options        = $('[name=options]', form).val();
                    var schedule_year  = $('[name=schedule_year]', form).val();
                    var schedule_month = $('[name=schedule_month]', form).val();
                    var schedule_day   = $('[name=schedule_day]', form).val();
                    
                    if ( TASK_MODE_CREATE == task_mode ) {
                        addTask($('#project_id').val(), {
                            id: json.id,
                            schedule_date: schedule_year + '-' + schedule_month + '-' + schedule_day,
                            task_name: task_name,
                            options: options,
                            status: 'yet'
                        });
                        
                        if ( Number(schedule_year) == current_year && Number(schedule_month) == current_month ) {
                            var project = findFromProject_id($('#project_id').val());
                            var curTask = $('<a href="javascript:void(0);" class="calendar_label calendar_label_' + project.label_color_id + '" id="task_calendar_' + json.id, + '" />').text(task_name).hide();
                            $('#calendar_day_' + schedule_day).append( curTask );
                            curTask.fadeIn('fast');
                        }
                    } else if ( TASK_MODE_EDIT == task_mode ) {
                        var task_id = $('#edit_task_id').val();
                        var baseProject = findFromTask_id(task_id);
                        
                        if ( baseProject.task.schedule_date == schedule_year + '-' + schedule_month + '-' + schedule_day ) {
                            $('#task_calendar_' + task_id).text(task_name);
                        } else {
                            $('#task_calendar_' + task_id).remove();
                            if ( Number(schedule_year) == current_year && Number(schedule_month) == current_month ) {
                                var insTask = $('<a href="javascript:void(0);" class="calendar_label calendar_label_' + baseProject.label_color_id + '" id="task_calendar_' + task_id, + '" />').text(task_name).hide();
                                console.log(insTask);
                                $('#calendar_day_' + schedule_day).append( insTask );
                                insTask.fadeIn('fast');
                            }
                        }
                        editTask(task_id, {
                            schedule_date: schedule_year + '-' + schedule_month.zerofill(1) + '-' + schedule_day.zerofill(1),
                            task_name: task_name,
                            options: options
                        });
                        
                        $('#task_list_' + task_id).text(task_name + '(' + schedule_month.zerofill(1) + '/' + schedule_day.zerofill(1) +  ')');
                    }
                    //'id', 'schedule_date', 'task_name', 'options', 'status'
                    
                    $('#modal_view_bg').hide();
                    $('#modal_create_task').hide();
                    */
                }
            }
        });
        
        return false;
    } );
});