var aryProjects = [];

var findFromTask_id = function(id) {
    for (var i = 0; i < aryProjects.length; i++) {
        for (var j = 0; j < aryProjects[i].tasks.length; j++) {
            if ( aryProjects[i].tasks[j].id == id ) {
                project = aryProjects[i];
                project.task = aryProjects[i].tasks[j];
                
                return project;
            }
        }
    }
    
    return false;
}

var findFromProject_id = function(id) {
    for (var i = 0; i < aryProjects.length; i++) {
        project = aryProjects[i];
        
        if ( project.id == id ) {
            return project;
        }
    }
    return false;
}

var addProject = function(object) {
    aryProjects.push( object );
}

var editProject = function(id, object) {
    var project;
    for ( var i = 0; i < aryProjects.length; i++ ) {
        project = aryProjects[i];
        
        if ( project.id == Number(id) ) {
            for (var key in object) {
                aryProjects[i][key] = object[key];
            }
            return;
        }
    }
}

var deleteProject = function(id) {
    var project;
    for ( var i = 0; i < aryProjects.length; i++ ) {
        project = aryProjects[i];
        
        if ( project.id == Number(id) ) {
            project.slice(i, 1);
            return;
        }
    }
}

var addTask = function(project_id, object) {
    for (var i = 0; i < aryProjects.length; i++) {
        project = aryProjects[i];
        
        if ( project.id == project_id ) {
            aryProjects[i].tasks.push(object);
            return true;
        }
    }
    return false;
}

var editTask = function(task_id, object) {
    for (var i = 0; i < aryProjects.length; i++) {
        for (var j = 0; j < aryProjects[i].tasks.length; j++) {
            if ( aryProjects[i].tasks[j].id == task_id ) {
                for (var key in object) {
                    aryProjects[i].tasks[j][key] = object[key];
                }
                return true;
            }
        }
    }
    
    return false;
}

var deleteTask = function(task_id) {
    for (var i = 0; i < aryProjects.length; i++) {
        for (var j = 0; j < aryProjects[i].tasks.length; j++) {
            if ( aryProjects[i].tasks[j].id == task_id ) {
                aryProjects[i].tasks.slice(j, 1);
                return true;
            }
        }
    }
    
    return false;
}

String.prototype.h = function() {
    return this.replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/&/g, "&amp;").replace(/\n/g, "<br />\n");
}

String.prototype.zerofill = function(count) {
    var zero = '0';
    
    for (var i = 1; i <= count; i++) {
        zero += zero;
    }
    
    return (zero + this).slice(-(count + 1));
}

var PROJECT_MODE_CREATE = 0;
var PROJECT_MODE_EDIT   = 1;
var PROJECT_MODE_DETAIL = 2;

var TASK_MODE_CREATE    = 0;
var TASK_MODE_EDIT      = 1;
var TASK_MODE_DETAIL    = 2;

var project_mode, task_mode;

$(function() {
    if (navigator.userAgent.indexOf('iPhone;') != -1) {
        addEventListener("DOMContentLoaded", function() {
            setTimeout(function () {
                if (window.pageYOffset === 0) {
                    window.scrollTo(0,1);
                }
            }, 100);
        }, false);
    }
    
    var year , month, day, date;
    date  = new Date();
    year  = date.getFullYear();
    month = date.getMonth() + 1;
    day   = date.getDate();
    
    if ( year == current_year && month == current_month ) {
        $('#calendar_day_' + day).addClass('today');
    }
    
    $('.project_name').live( 'mouseover', function() {
        var aryPrIds = $(this).attr('id').split(/_/g);
        var prj_id   = aryPrIds.pop();
        var curPrj   = findFromProject_id(prj_id);
        var curTask;
        
        for ( var i = 0; i < curPrj.tasks.length; i++ ) {
            curTask = curPrj.tasks[i];
            
            $('#task_calendar_' + curTask.id).addClass('hover');
        }
        
    } ).live('mouseout', function() {
        $('.calendar a').removeClass('hover');
    });
    
    $.ajax( {
        url: './finish_list.html',
        type: 'get',
        data: 'year=' + current_year + '&month=' + current_month,
        dataType:'json',
        success:function(json) {
            aryProjects = json;
            
            for (var i = 0; i < aryProjects.length; i++) {
                project = aryProjects[i];
                tasks   = '';
                
                $('#project_id').append( $('<option />').val(project.id).text(project.project_name) );
                if ( 0 != project.tasks.length ) {
                    tasks += "<ul class=\"nav nav-tabs nav-stacked task_list\">";
                    for (var j = 0; j < project.tasks.length; j++) {
                        task = project.tasks[j];
                        
                        aryScheduleDate = task.schedule_date.split('-');
                        tasks += "<li><a href=\"javascript:void(0);\" id=\"task_list_" + task.id + "\">" + task.task_name + '(' + aryScheduleDate[1] + '/' + aryScheduleDate[2] + ')' + "</a></li>";
                        
                        if ( current_year == Number(aryScheduleDate[0]) && current_month == Number(aryScheduleDate[1]) ) {
                            var curTask = $('<a href="javascript:void(0);" class="calendar_label calendar_label_' + project.label_color_id + '" id="task_calendar_' + task.id + '" />').text(task.task_name).hide();
                            $('#calendar_day_' + Number(aryScheduleDate[2])).append( curTask );
                            curTask.fadeIn('fast');
                        } 
                    }
                    tasks += "</ul>";
                }
                
                
                curProject = $('<div class="projects" />').append(
                    '<a href="javascript:void(0);" class="project_name" id="projects_' + project.id + '">'
                  + '<div class="color_label calendar_label_' + project.label_color_id + '"></div>'
                  + project.project_name + '</a>'
                  + tasks
                  + '<div class="projects_menu">'
                  + '<div class="right"><a href="javascript:void(0);" class="btn_create_task" id="btn_create_task_' + project.id + '">タスクを追加</a></div>'
                  + '</div>' );
                $('.project_list').append( curProject.hide() );
                curProject.fadeIn('fast');
            }
        }
    } );
});