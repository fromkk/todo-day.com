<div id="modal_create_task" class="well">
    <div class="right">
        <a href="javascript:void(0);" class="btn_close_task">&times;</a>
    </div>
    <form action="{$config.top}/create_task.html" method="post">
        <input type="hidden" name="id" value="" id="edit_task_id" />
        <fieldset>
            <div class="control-group">
                <label class="control-label">
                    プロジェクト名
                </label>
                <div class="controls">
                    <select name="project_id" id="project_id"><option value="">選択</option></select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    タスク名
                </label>
                <div class="controls">
                    <input type="text" name="task_name" value="" maxlength="100" id="task_name" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    タスク実行日
                </label>
                <div class="controls">
                    <select name="schedule_year" class="span2">{html_options values=$config.master.schedule_year output=$config.master.schedule_year selected=$config.year}</select>年
                    <select name="schedule_month" class="span2">{html_options values=$config.master.month output=$config.master.month selected=$config.month}</select>月
                    <select name="schedule_day" class="span2">{html_options values=$config.master.day output=$config.master.day selected=$config.day}</select>日
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    備考
                </label>
                <div class="controls">
                    <textarea name="options"></textarea>
                </div>
            </div>
        </fieldset>
        <div class="center submit">
            <input type="submit" value="送信" class="btn-primary" />
        </div>
    </form>
</div>
<script type="text/javascript" src="{$config.top}/js/create_task.js"></script>