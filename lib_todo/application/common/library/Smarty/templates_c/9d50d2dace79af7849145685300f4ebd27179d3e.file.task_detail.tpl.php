<?php /* Smarty version Smarty-3.1.5, created on 2012-03-14 20:14:21
         compiled from "/home/evedoko/www/lib_sml/application/View/common/task_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8953448024f607d8d520cc5-92517992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d50d2dace79af7849145685300f4ebd27179d3e' => 
    array (
      0 => '/home/evedoko/www/lib_sml/application/View/common/task_detail.tpl',
      1 => 1331721241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8953448024f607d8d520cc5-92517992',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f607d8d548f3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f607d8d548f3')) {function content_4f607d8d548f3($_smarty_tpl) {?><div id="modal_task_detail" class="well">
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