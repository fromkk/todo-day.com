<?php /* Smarty version Smarty-3.1.5, created on 2012-03-24 15:29:33
         compiled from "/home/evedoko/www/lib_todo/application/View/author/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9060796724f6d69cd72f502-75816404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c34db56f17983bf53f76ca73508447eee9b59ea' => 
    array (
      0 => '/home/evedoko/www/lib_todo/application/View/author/common/header.tpl',
      1 => 1331721243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9060796724f6d69cd72f502-75816404',
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
  'unifunc' => 'content_4f6d69cd7aadb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f6d69cd7aadb')) {function content_4f6d69cd7aadb($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
    <head>
        <title><?php if (isset($_smarty_tpl->tpl_vars['title']->value)){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true);?>
 | <?php }?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['site_title'], ENT_QUOTES, 'UTF-8', true);?>
管理画面</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/css/bootstrap.css" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/css/bootstrap-responsive.css" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/css/common.css" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/css/author.css" />
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/js/jquery.author_form.js"></script>
    </head>
    <body data-offset="50" data-spy="scroll">
        <header class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['author'];?>
/" class="brand"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['site_title'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['author'];?>
/members/">会員</a>
                            </li>
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['author'];?>
/label/">ラベルカラー</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
        <?php }} ?>