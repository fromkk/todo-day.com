{include file="common/header.tpl"}
<section id="contents">
    {if 0 != count($errorList)}
    <div class="alert alert-error">
        {$errorList|@implode:"<br />"}
    </div>
    {/if}
    
    <div class="subnav">
        <ul class="nav nav-pills">
            <li><a href="javascript:void(0);" class="btn_create_project">プロジェクト作成</a></li>
            <li><a href="./finish.html">完了済み</a></li>
            <li><a href="./logout.html">ログアウト</a></li>
        </ul>
    </div>
    <br />
    <div class="projects">
        <table class="table table-bordered calendar">
            <thead>
                <tr>
                    <th>
                        <a href="{$config.self}?year={$back_year}&month={$back_month}">{$back_year}/{$back_month}</a>
                    </th>
                    <th colspan="5">
                        {$year}月{$month}月
                    </th>
                    <th>
                        <a href="{$config.self}?year={$next_year}&month={$next_month}">{$next_year}/{$next_month}</a>
                    </th>
                </tr>
                <tr>
                {section name=week start=0 max=7 loop=7}
                    <th>{$config['weeks']['jp'][$smarty.section.week.index]}</th>
                {/section}
                </tr>
            </thead>
            <tbody>
                {foreach from=$calendar item=week}
                <tr>
                    {foreach from=$week item=day}
                    <td{if '' != $day} id="calendar_day_{$day}"{/if}>{$day}</td>
                    {/foreach}
                </tr>
                {/foreach}
            </tbody>
        </table>
        <div class="project_list">
        </div>
    </div>
</section>
<div id="modal_view_bg"></div>
<script type="text/javascript">
    var current_year = {$year};
    var current_month = {$month};
</script>
{include file="common/create_project.tpl"}
{include file="common/create_task.tpl"}
{include file="common/project_detail.tpl"}
{include file="common/task_detail.tpl"}
<script type="text/javascript" src="{$config.top}/js/projects.js"></script>
{include file="common/footer.tpl"}