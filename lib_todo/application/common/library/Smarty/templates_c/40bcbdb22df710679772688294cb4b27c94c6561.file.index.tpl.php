<?php /* Smarty version Smarty-3.1.5, created on 2012-03-14 19:57:12
         compiled from "/home/evedoko/www/lib_sml/application/View/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15090551384f607988139795-34381007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40bcbdb22df710679772688294cb4b27c94c6561' => 
    array (
      0 => '/home/evedoko/www/lib_sml/application/View/index.tpl',
      1 => 1331721240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15090551384f607988139795-34381007',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f607988179a1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f607988179a1')) {function content_4f607988179a1($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["title"] = new Smarty_variable("What's Today", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="well">
    <a class="btn btn-info" href="tw_login.html">Login With Twitter</a>
    <a class="btn btn-primary" href="fb_login.html">Login With Facebook</a>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>