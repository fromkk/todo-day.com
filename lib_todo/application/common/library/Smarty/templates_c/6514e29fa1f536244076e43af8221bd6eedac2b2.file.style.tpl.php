<?php /* Smarty version Smarty-3.1.5, created on 2012-03-14 22:25:23
         compiled from "/home/evedoko/www/lib_todo/application/View/style.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2118443094f609c4346bf96-35558293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6514e29fa1f536244076e43af8221bd6eedac2b2' => 
    array (
      0 => '/home/evedoko/www/lib_todo/application/View/style.tpl',
      1 => 1331721240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2118443094f609c4346bf96-35558293',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'colorList' => 0,
    'id' => 0,
    'color' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f609c434b67b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f609c434b67b')) {function content_4f609c434b67b($_smarty_tpl) {?>.color_label {
    display:block;
    width: 16px;
    height: 16px;
    float:left;
    margin-left:3px;
    margin-right:3px;
    border: 1px #666666 solid;
}

.calendar_label {
    display:block;
    width:100%;
    padding:1px;
    margin-bottom:2px;
}

<?php  $_smarty_tpl->tpl_vars['color'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['color']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['colorList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['color']->key => $_smarty_tpl->tpl_vars['color']->value){
$_smarty_tpl->tpl_vars['color']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['color']->key;
?>
.calendar_label_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 {
    background-color: #<?php echo $_smarty_tpl->tpl_vars['color']->value;?>
;
}

<?php } ?><?php }} ?>