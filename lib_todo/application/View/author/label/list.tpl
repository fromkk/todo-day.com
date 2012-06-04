{assign var="title" value="ラベルカラー"}
{include file="author/common/header.tpl"}
<h2>
    {$title}
</h2>
<br />
<a href="./edit.html" class="btn">新規追加</a><br />
<table class="table table-striped">
    <thead>
        <tr>
            <th>
                色名
            </th>
            <th>
                カラーコード
            </th>
            <th>
                編集
            </th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$colorList item=color_label}
        <tr>
            <td>
                {$color_label->name}
            </td>
            <td>
                # {$color_label->color_code}
            </td>
            <td>
                <a href="./edit.html?id={$color_label->id}">編集</a>
                <a href="./edit.html?mode=del&id={$color_label->id}">削除</a>
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>
{include file="author/common/footer.tpl"}