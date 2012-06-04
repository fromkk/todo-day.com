<div id="modal_task_detail" class="well">
    <div class="right">
        <a href="javascript:void(0);" class="btn_close_task_detail">&times;</a>
    </div>
    <h3 id="task_detail_name"></h3>
    <table class="table table-condensed">
        <tbody>
            <tr>
                <th class="right" style="width:20%;">
                    タスク実行日
                </th>
                <td id="task_detail_date" style="width:80%;"></td>
            </tr>
            <tr>
                <th>
                    備考
                </th>
                <td id="task_detail_options"></td>
            </tr>
        </tbody>
    </table>
    <div class="row-fluid">
        <div class="span3 center">
            <input type="button" class="btn btn-primary" id="btn_task_done" value="タスクを完了" />
            <input type="button" class="btn btn-primary" id="btn_task_yet" value="タスクを復活" />
        </div>
        <div class="span3 center">
            <input type="button" class="btn btn-info" id="btn_task_tomorrow" value="次の日に持ち越す" />
        </div>
        <div class="span3 center">
            <input type="button" class="btn" id="btn_task_edit" value="編集" />
        </div>
        <div class="span3 center">
            <input type="button" class="btn btn-danger" id="btn_task_delete" value="削除" />
        </div>
    </div>
</div>
<script type="text/javascript" src="{$config.top}/js/task_detail.js"></script>