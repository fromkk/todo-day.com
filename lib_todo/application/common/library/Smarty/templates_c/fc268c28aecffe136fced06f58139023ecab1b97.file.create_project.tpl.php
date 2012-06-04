<?php /* Smarty version Smarty-3.1.5, created on 2012-03-14 22:07:02
         compiled from "/home/evedoko/www/lib_sml/application/View/common/create_project.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13524508344f607d8d456a66-74923632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc268c28aecffe136fced06f58139023ecab1b97' => 
    array (
      0 => '/home/evedoko/www/lib_sml/application/View/common/create_project.tpl',
      1 => 1331730382,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13524508344f607d8d456a66-74923632',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f607d8d48de3',
  'variables' => 
  array (
    'config' => 0,
    'colorList' => 0,
    'id' => 0,
    'color_code' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f607d8d48de3')) {function content_4f607d8d48de3($_smarty_tpl) {?><div id="modal_create_project" class="well">
    <div class="right">
        <a href="javascript:void(0);" class="btn_close_project">&times;</a>
    </div>
    <form action="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/create_project.html" method="post">
        <input type="hidden" name="id" value="" id="edit_project_id" />
        <fieldset>
            <div class="control-group">
                <label class="control-label">
                    プロジェクト名
                </label>
                <div class="controls">
                    <input type="text" name="project_name" value="" maxlength="100" id="project_name" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    ラベルカラー
                </label>
                <div class="controls">
                    <?php  $_smarty_tpl->tpl_vars['color_code'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['color_code']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['colorList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['color_code']->key => $_smarty_tpl->tpl_vars['color_code']->value){
$_smarty_tpl->tpl_vars['color_code']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['color_code']->key;
?>
                    <label class="radio inline">
                        <input type="radio" name="color_id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
                        <span style="background-color:#<?php echo $_smarty_tpl->tpl_vars['color_code']->value;?>
;" class="sample_label"></span>
                    </label><br />
                    <?php } ?>
                </div>
            </div>
        </fieldset>
        <div class="center submit">
            <input type="submit" value="送信" class="btn-primary" />
        </div>
    </form>
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/js/create_project.js"></script><?php }} ?>