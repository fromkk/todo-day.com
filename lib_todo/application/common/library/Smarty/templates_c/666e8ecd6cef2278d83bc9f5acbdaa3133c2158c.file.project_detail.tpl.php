<?php /* Smarty version Smarty-3.1.5, created on 2012-03-14 22:25:31
         compiled from "/home/evedoko/www/lib_todo/application/View/common/project_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21348876264f609c4b8b73a9-88000496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '666e8ecd6cef2278d83bc9f5acbdaa3133c2158c' => 
    array (
      0 => '/home/evedoko/www/lib_todo/application/View/common/project_detail.tpl',
      1 => 1331721241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21348876264f609c4b8b73a9-88000496',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f609c4b8d1a4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f609c4b8d1a4')) {function content_4f609c4b8d1a4($_smarty_tpl) {?><div id="modal_project_detail" class="well">
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