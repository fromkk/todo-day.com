<?php /* Smarty version Smarty-3.1.5, created on 2012-03-24 15:29:38
         compiled from "/home/evedoko/www/lib_todo/application/View/author/label/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18934241454f6d69d280f430-15775478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75d30331b9e4e9a499477b9c4599a79a89ba70f6' => 
    array (
      0 => '/home/evedoko/www/lib_todo/application/View/author/label/list.tpl',
      1 => 1331721243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18934241454f6d69d280f430-15775478',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'colorList' => 0,
    'color_label' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f6d69d288503',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f6d69d288503')) {function content_4f6d69d288503($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["title"] = new Smarty_variable("ラベルカラー", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("author/common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<h2>
    <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

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
        <?php  $_smarty_tpl->tpl_vars['color_label'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['color_label']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['colorList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['color_label']->key => $_smarty_tpl->tpl_vars['color_label']->value){
$_smarty_tpl->tpl_vars['color_label']->_loop = true;
?>
        <tr>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['color_label']->value->name;?>

            </td>
            <td>
                # <?php echo $_smarty_tpl->tpl_vars['color_label']->value->color_code;?>

            </td>
            <td>
                <a href="./edit.html?id=<?php echo $_smarty_tpl->tpl_vars['color_label']->value->id;?>
">編集</a>
                <a href="./edit.html?mode=del&id=<?php echo $_smarty_tpl->tpl_vars['color_label']->value->id;?>
">削除</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php echo $_smarty_tpl->getSubTemplate ("author/common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>