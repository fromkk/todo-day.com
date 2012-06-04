<?php /* Smarty version Smarty-3.1.5, created on 2012-03-18 18:48:50
         compiled from "/home/evedoko/www/lib_todo/application/View/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4021499824f609c43012d21-52921430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9fc40036c5727145d58e02a29a33ef540d1481a' => 
    array (
      0 => '/home/evedoko/www/lib_todo/application/View/common/header.tpl',
      1 => 1332064125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4021499824f609c43012d21-52921430',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f609c4305d68',
  'variables' => 
  array (
    'title' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f609c4305d68')) {function content_4f609c4305d68($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
    <head>
        <title><?php if (isset($_smarty_tpl->tpl_vars['title']->value)){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true);?>
 | <?php }?><?php echo $_smarty_tpl->tpl_vars['config']->value['site_title'];?>
</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta http-equiv="pragma" content="no-cache">
        <meta http-equiv="cache-control" content="no-cache">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon_114x114.png" />
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
        <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-30121454-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

        </script>
    </head>
    <body data-offset="30">
        <div class="container">
            <header>
                <a href="./index.html"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/img/logo.gif" alt="<?php echo $_smarty_tpl->tpl_vars['config']->value['site_title'];?>
" /></a>
            </header><?php }} ?>