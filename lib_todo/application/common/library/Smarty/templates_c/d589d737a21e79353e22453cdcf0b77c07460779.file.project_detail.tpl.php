<?php /* Smarty version Smarty-3.1.5, created on 2012-03-14 20:14:21
         compiled from "/home/evedoko/www/lib_sml/application/View/common/project_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4710094684f607d8d4fbc92-68863239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd589d737a21e79353e22453cdcf0b77c07460779' => 
    array (
      0 => '/home/evedoko/www/lib_sml/application/View/common/project_detail.tpl',
      1 => 1331721241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4710094684f607d8d4fbc92-68863239',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f607d8d51654',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f607d8d51654')) {function content_4f607d8d51654($_smarty_tpl) {?><div id="modal_project_detail" class="well">
    <div class="right">
        <a href="javascript:void(0);" class="btn_close_project_detail">&times;</a>
    </div>
    <h3 id="project_detail_name"></h3>
    <div class="row-fluid">
        <div class="span4 center">
            <input type="button" class="btn btn-primary" id="btn_project_done" value="プロジェクトを完了" />
            <input type="button" class="btn btn-primary" id="btn_project_alive" value="プロジェクトを復活" />
        </div>
        <div class="span4 center">
            <input type="button" class="btn" id="btn_project_edit" value="編集" />
        </div>
        <div class="span4 center">
            <input type="button" class="btn btn-danger" id="btn_project_delete" value="削除" />
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/js/project_detail.js"></script><?php }} ?>