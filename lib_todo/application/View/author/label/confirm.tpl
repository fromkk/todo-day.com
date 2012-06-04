{assign var="title" value="ラベルカラー情報入力"}
{include file="author/common/header.tpl"}
<h2>
    {$title}
</h2>
<br />
<form action="{$config.self}" method="post" class="well">
    <input type="hidden" name="id" value="{$id}" />
    <input type="hidden" name="mode" value="exe" />
    <input type="hidden" name="{$token_name}" value="{$token}" />
    <fieldset>
        <div class="control-group">
            <label class="control-label">色名</label>
            <div class="controls">
                {$name|escape}
                <input type="hidden" name="name" value="{$name|escape}" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">
                カラーコード
            </label>
            <div class="controls">
                # {$color_code|escape}
                <input type="hidden" name="color_code" value="{$color_code|escape}" />
            </div>
        </div>
    </fieldset>
    <div class="center submit">
        <input type="button" class="btn-info back" value="戻る" />
        <input type="submit" class="btn-primary" value="送信" />
    </div>
</form>
{include file="author/common/footer.tpl"}