<?php /* Smarty version Smarty-3.1.5, created on 2012-03-14 19:57:12
         compiled from "/home/evedoko/www/lib_sml/application/View/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5779808874f6079881a61d6-87693931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ec46b52d47284a062236698b8438ca90094a1fb' => 
    array (
      0 => '/home/evedoko/www/lib_sml/application/View/common/header.tpl',
      1 => 1331721241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5779808874f6079881a61d6-87693931',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f60798820d50',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f60798820d50')) {function content_4f60798820d50($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
    <head>
        <title><?php if (isset($_smarty_tpl->tpl_vars['title']->value)){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true);?>
 | <?php }?><?php echo $_smarty_tpl->tpl_vars['config']->value['site_title'];?>
</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta http-equiv="pragma" content="no-cache">
        <meta http-equiv="cache-control" content="no-cache">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/css/bootstrap.css" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/css/bootstrap-responsive.css" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/css/common.css" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/style.html" />
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/js/bootstrap.js"></script>
        <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
    </head>
    <body data-offset="30">
        <div class="container">
            <header>
                <a href="./index.html"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/img/logo.gif" alt="<?php echo $_smarty_tpl->tpl_vars['config']->value['site_title'];?>
" /></a>
            </header><?php }} ?>