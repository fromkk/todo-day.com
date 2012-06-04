<?php /* Smarty version Smarty-3.1.5, created on 2012-03-14 19:57:12
         compiled from "/home/evedoko/www/lib_sml/application/View/common/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7019644714f607988218688-06114531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b1c218c09085da812689e59239bb8f6cc8ee9c7' => 
    array (
      0 => '/home/evedoko/www/lib_sml/application/View/common/footer.tpl',
      1 => 1331721241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7019644714f607988218688-06114531',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f60798823c1a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f60798823c1a')) {function content_4f60798823c1a($_smarty_tpl) {?>            </section>
            <footer class="center">
                &copy; <?php echo $_smarty_tpl->tpl_vars['config']->value['site_title'];?>
 <?php if ($_smarty_tpl->tpl_vars['config']->value['start_year']==$_smarty_tpl->tpl_vars['config']->value['year']){?><?php echo $_smarty_tpl->tpl_vars['config']->value['year'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['config']->value['start_year'];?>
 - <?php echo $_smarty_tpl->tpl_vars['config']->value['year'];?>
<?php }?> All Rights Reserved.
            </footer>
        </div>
    </body>
</html><?php }} ?>