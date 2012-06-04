<div id="modal_create_project" class="well">
    <div class="right">
        <a href="javascript:void(0);" class="btn_close_project">&times;</a>
    </div>
    <form action="{$config.top}/create_project.html" method="post">
        <input type="hidden" name="id" value="" id="edit_project_id" />
        <fieldset>
            <div class="control-group">
                <label class="control-label">
                    プロジェクト名
                </label>
                <div class="controls">
                    <input type="text" name="project_name" value="" maxlength="100" id="project_name" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    ラベルカラー
                </label>
                <div class="controls">
                    {foreach from=$colorList key=id item=color_code}
                    <label class="radio inline">
                        <input type="radio" name="color_id" value="{$id}" />
                        <span style="background-color:#{$color_code};" class="sample_label"></span>
                    </label><br />
                    {/foreach}
                </div>
            </div>
        </fieldset>
        <div class="center submit">
            <input type="submit" value="送信" class="btn-primary" />
        </div>
    </form>
</div>
<script type="text/javascript" src="{$config.top}/js/create_project.js"></script>