<?php /* Smarty version Smarty-3.1.5, created on 2012-03-17 19:38:58
         compiled from "/home/evedoko/www/lib_todo/application/View/common/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:577507014f609c43068238-23091386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '524229fc78d94631ad596424315471ebdba0282b' => 
    array (
      0 => '/home/evedoko/www/lib_todo/application/View/common/footer.tpl',
      1 => 1331980737,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '577507014f609c43068238-23091386',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f609c4308c1d',
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f609c4308c1d')) {function content_4f609c4308c1d($_smarty_tpl) {?>            </section>
            <section class="center">
                <a href="./rule.html">利用規約</a>｜
                <a href="./privacy.html">プライバシーポリシー</a>｜
                <a href="http://fromkk.colab-net.com/" target="_blank">運営者</a>
            </section>
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