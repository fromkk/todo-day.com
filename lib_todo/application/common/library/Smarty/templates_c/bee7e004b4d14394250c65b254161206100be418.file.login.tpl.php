<?php /* Smarty version Smarty-3.1.5, created on 2012-03-24 15:29:28
         compiled from "/home/evedoko/www/lib_todo/application/View/author/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9156695004f6d69c87af962-06310881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bee7e004b4d14394250c65b254161206100be418' => 
    array (
      0 => '/home/evedoko/www/lib_todo/application/View/author/login.tpl',
      1 => 1331721241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9156695004f6d69c87af962-06310881',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'user_name' => 0,
    'passwd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f6d69c887a3a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f6d69c887a3a')) {function content_4f6d69c887a3a($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_entity')) include '/home/evedoko/www/lib_todo/application/common/library/Smarty/plugins/modifier.entity.php';
?><!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf8" />
        <title>ログイン | <?php echo $_smarty_tpl->tpl_vars['config']->value['site_title'];?>
</title>
    </head>
    <body>
        <form action="<?php echo $_smarty_tpl->tpl_vars['config']->value['self'];?>
" method="post">
            Userid : <input type="text" name="user_name" value="<?php echo smarty_modifier_entity($_smarty_tpl->tpl_vars['user_name']->value);?>
" /><br />
            Passwd : <input type="password" name="passwd" value="<?php echo smarty_modifier_entity($_smarty_tpl->tpl_vars['passwd']->value);?>
" /><br />
            <input type="submit" value="ログイン" />
        </form>
    </body>
</html><?php }} ?>