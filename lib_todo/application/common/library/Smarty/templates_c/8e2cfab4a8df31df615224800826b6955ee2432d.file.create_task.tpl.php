<?php /* Smarty version Smarty-3.1.5, created on 2012-03-26 16:52:42
         compiled from "/home/evedoko/www/lib_todo/application/View/common/create_task.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21238780414f609c4b854132-16403719%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e2cfab4a8df31df615224800826b6955ee2432d' => 
    array (
      0 => '/home/evedoko/www/lib_todo/application/View/common/create_task.tpl',
      1 => 1332748280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21238780414f609c4b854132-16403719',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f609c4b8aac0',
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f609c4b8aac0')) {function content_4f609c4b8aac0($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/evedoko/www/lib_todo/application/common/library/Smarty/plugins/function.html_options.php';
?><div id="modal_create_task" class="well">
    <div class="right">
        <a href="javascript:void(0);" class="btn_close_task">&times;</a>
    </div>
    <form action="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/create_task.html" method="post">
        <input type="hidden" name="id" value="" id="edit_task_id" />
        <fieldset>
            <div class="control-group">
                <label class="control-label">
                    プロジェクト名
                </label>
                <div class="controls">
                    <select name="project_id" id="project_id"><option value="">選択</option></select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    タスク名
                </label>
                <div class="controls">
                    <input type="text" name="task_name" value="" maxlength="100" id="task_name" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    タスク実行日
                </label>
                <div class="controls">
                    <select name="schedule_year" class="span2"><?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['config']->value['master']['schedule_year'],'output'=>$_smarty_tpl->tpl_vars['config']->value['master']['schedule_year'],'selected'=>$_smarty_tpl->tpl_vars['config']->value['year']),$_smarty_tpl);?>
</select>年
                    <select name="schedule_month" class="span2"><?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['config']->value['master']['month'],'output'=>$_smarty_tpl->tpl_vars['config']->value['master']['month'],'selected'=>$_smarty_tpl->tpl_vars['config']->value['month']),$_smarty_tpl);?>
</select>月
                    <select name="schedule_day" class="span2"><?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['config']->value['master']['day'],'output'=>$_smarty_tpl->tpl_vars['config']->value['master']['day'],'selected'=>$_smarty_tpl->tpl_vars['config']->value['day']),$_smarty_tpl);?>
</select>日
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    備考
                </label>
                <div class="controls">
                    <textarea name="options"></textarea>
                </div>
            </div>
        </fieldset>
        <div class="center submit">
            <input type="submit" value="送信" class="btn-primary" />
        </div>
    </form>
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/js/create_task.js"></script><?php }} ?>