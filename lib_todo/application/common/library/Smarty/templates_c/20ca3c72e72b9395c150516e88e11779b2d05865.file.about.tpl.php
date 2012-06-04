<?php /* Smarty version Smarty-3.1.5, created on 2012-03-26 18:31:56
         compiled from "/home/evedoko/www/lib_todo/application/View/about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6655711904f70280f20b8f9-98535073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20ca3c72e72b9395c150516e88e11779b2d05865' => 
    array (
      0 => '/home/evedoko/www/lib_todo/application/View/about.tpl',
      1 => 1332754307,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6655711904f70280f20b8f9-98535073',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f70280f2730d',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f70280f2730d')) {function content_4f70280f2730d($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["title"] = new Smarty_variable("Todayについて", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h3>何が出来ないの？</h3>
<section class="well">
    <ul>
        <li>
            時間指定が出来ません。
        </li>
        <li>
            友達との共有は出来ません。
        </li>
        <li>
            通知機能はありません。
        </li>
        <li>
            スマホアプリはありません。
        </li>
        <li>
            場所の指定は出来ません。
        </li>
        <li>
            IE8以下では正しく見れません。
        </li>
    </ul>
</section>
<br />
<h3>じゃあ何が出来るの？</h3>
<section class="well">
    <ul>
        <li>
            特定の日付にタスクを設定出来ます。
        </li>
        <li>
            複数のプロジェクトを作成することが出来ます。
        </li>
        <li>
            完了済みのタスクが一覧で閲覧出来ます。
        </li>
        <li>
            プロジェクト毎に色分けが出来るのでカレンダーがカラフルになります。
        </li>
        <li>
            ワンクリックでタスクを次の日に持ち越せます。
        </li>
        <li>
            iPhoneでも見れます。（Androidはまだ確認してません。）
        </li>
    </ul>
</section>

<?php echo $_smarty_tpl->getSubTemplate ("common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>