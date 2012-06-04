<?php /* Smarty version Smarty-3.1.5, created on 2012-03-14 22:25:31
         compiled from "/home/evedoko/www/lib_todo/application/View/common/task_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19006206804f609c4b8dc3f4-86651912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe470e2a43a69b29278d38ce42a0ac704949d183' => 
    array (
      0 => '/home/evedoko/www/lib_todo/application/View/common/task_detail.tpl',
      1 => 1331721241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19006206804f609c4b8dc3f4-86651912',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f609c4b9044a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f609c4b9044a')) {function content_4f609c4b9044a($_smarty_tpl) {?><div id="modal_task_detail" class="well">
    <div class="right">
        <a href="javascript:void(0);" class="btn_close_task_detail">&times;</a>
    </div>
    <h3 id="task_detail_name"></h3>
    <table class="table table-condensed">
        <tbody>
            <tr>
                <th class="right" style="width:20%;">
                    タスク実行日
                </th>
                <td id="task_detail_date" style="width:80%;"></td>
            </tr>
            <tr>
                <th>
                    備考
                </th>
                <td id="task_detail_options"></td>
            </tr>
        </tbody>
    </table>
    <div class="row-fluid">
        <div class="span3 center">
            <input type="button" class="btn btn-primary" id="btn_task_done" value="タスクを完了" />
            <input type="button" class="btn btn-primary" id="btn_task_yet" value="タスクを復活" />
        </div>
        <div class="span3 center">
            <input type="button" class="btn btn-info" id="btn_task_tomorrow" value="次の日に持ち越す" />
        </div>
        <div class="span3 center">
            <input type="button" class="btn" id="btn_task_edit" value="編集" />
        </div>
        <div class="span3 center">
            <input type="button" class="btn btn-danger" id="btn_task_delete" value="削除" />
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/js/task_detail.js"></script><?php }} ?>