{assign var="title" value="ラベルカラー情報入力"}
{include file="author/common/header.tpl"}
<h2>
    {$title}
</h2>
<br />
{if 0 !== count($errorList)}
<div class="alert alert-error">
    <strong>入力情報にエラーがあります。</strong><br />
    {$errorList|@implode:'<br />'}
</div>
{/if}
<form action="{$config.self}" method="post" class="well">
    <input type="hidden" name="id" value="{$id}" />
    <input type="hidden" name="mode" value="confirm" />
    <input type="hidden" name="{$token_name}" value="{$token}" />
    <label>
        色名
        <input type="text" name="name" value="{$name|escape}" />
    </label>
    <label>
        カラーコード
        <div class="input-prepend">
            <div class="add-on">
                #
            </div>
            <input type="text" name="color_code" value="{$color_code|escape}" />
        </div>
    </label>
    <div class="center submit">
        <input type="submit" class="btn-primary" value="送信" />
    </div>
</form>
{include file="author/common/footer.tpl"}