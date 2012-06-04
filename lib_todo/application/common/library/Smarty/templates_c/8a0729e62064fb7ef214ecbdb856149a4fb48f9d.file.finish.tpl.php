<?php /* Smarty version Smarty-3.1.5, created on 2012-03-14 20:16:26
         compiled from "/home/evedoko/www/lib_sml/application/View/finish.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4152519634f607e0ab8fa90-31145486%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a0729e62064fb7ef214ecbdb856149a4fb48f9d' => 
    array (
      0 => '/home/evedoko/www/lib_sml/application/View/finish.tpl',
      1 => 1331721240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4152519634f607e0ab8fa90-31145486',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errorList' => 0,
    'config' => 0,
    'back_year' => 0,
    'back_month' => 0,
    'year' => 0,
    'month' => 0,
    'next_year' => 0,
    'next_month' => 0,
    'calendar' => 0,
    'week' => 0,
    'day' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f607e0aca2f6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f607e0aca2f6')) {function content_4f607e0aca2f6($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<section id="contents">
    <?php if (0!=count($_smarty_tpl->tpl_vars['errorList']->value)){?>
    <div class="alert alert-error">
        <?php echo implode($_smarty_tpl->tpl_vars['errorList']->value,"<br />");?>

    </div>
    <?php }?>
    
    <div class="subnav">
        <ul class="nav nav-pills">
            <li><a href="./index.html">ホーム</a></li>
            <li><a href="javascript:void(0);" class="btn_create_project">プロジェクト作成</a></li>
            <li><a href="./logout.html">ログアウト</a></li>
        </ul>
    </div>

    <br />
    <div class="projects">
        <table class="table table-bordered calendar">
            <thead>
                <tr>
                    <th>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['self'];?>
?year=<?php echo $_smarty_tpl->tpl_vars['back_year']->value;?>
&month=<?php echo $_smarty_tpl->tpl_vars['back_month']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['back_year']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['back_month']->value;?>
</a>
                    </th>
                    <th colspan="5">
                        <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
月<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
月
                    </th>
                    <th>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['self'];?>
?year=<?php echo $_smarty_tpl->tpl_vars['next_year']->value;?>
&month=<?php echo $_smarty_tpl->tpl_vars['next_month']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['next_year']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['next_month']->value;?>
</a>
                    </th>
                </tr>
                <tr>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['week'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['week']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['week']['name'] = 'week';
$_smarty_tpl->tpl_vars['smarty']->value['section']['week']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['week']['max'] = (int)7;
$_smarty_tpl->tpl_vars['smarty']->value['section']['week']['loop'] = is_array($_loop=7) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['week']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['week']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['week']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['week']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['week']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['week']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['week']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['week']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['week']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['week']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['week']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['week']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['week']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['week']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['week']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['week']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['week']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['week']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['week']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['week']['total']);
?>
                    <th><?php echo $_smarty_tpl->tpl_vars['config']->value['weeks']['jp'][$_smarty_tpl->getVariable('smarty')->value['section']['week']['index']];?>
</th>
                <?php endfor; endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars['week'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['week']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['calendar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['week']->key => $_smarty_tpl->tpl_vars['week']->value){
$_smarty_tpl->tpl_vars['week']->_loop = true;
?>
                <tr>
                    <?php  $_smarty_tpl->tpl_vars['day'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['day']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['week']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['day']->key => $_smarty_tpl->tpl_vars['day']->value){
$_smarty_tpl->tpl_vars['day']->_loop = true;
?>
                    <td<?php if (''!=$_smarty_tpl->tpl_vars['day']->value){?> id="calendar_day_<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
</td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="project_list">
        </div>
    </div>
</section>
<div id="modal_view_bg"></div>
<script type="text/javascript">
    var current_year = <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
;
    var current_month = <?php echo $_smarty_tpl->tpl_vars['month']->value;?>
;
</script>
<?php echo $_smarty_tpl->getSubTemplate ("common/create_project.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("common/create_task.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("common/project_detail.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("common/task_detail.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['top'];?>
/js/finish.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>