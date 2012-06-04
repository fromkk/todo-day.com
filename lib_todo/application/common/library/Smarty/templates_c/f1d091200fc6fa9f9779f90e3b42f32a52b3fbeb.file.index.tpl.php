<?php /* Smarty version Smarty-3.1.5, created on 2012-03-26 17:35:29
         compiled from "/home/evedoko/www/lib_todo/application/View/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11680706634f609c42f0b245-96765325%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1d091200fc6fa9f9779f90e3b42f32a52b3fbeb' => 
    array (
      0 => '/home/evedoko/www/lib_todo/application/View/index.tpl',
      1 => 1332750927,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11680706634f609c42f0b245-96765325',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f609c430079f',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f609c430079f')) {function content_4f609c430079f($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["title"] = new Smarty_variable("出来ないことだらけのシンプル過ぎるタスク管理サービス", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=206151349492731";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
$(function() {
    if (navigator.userAgent.indexOf('iPhone;') != -1) {
        addEventListener("DOMContentLoaded", function() {
            setTimeout(function () {
                if (window.pageYOffset === 0) {
                    window.scrollTo(0,1);
                }
            }, 100);
        }, false);
    }
});
</script>
<section id="index">
    <div id="hero">
        <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

    </div>
    <div class="well login">
        <img src="./img/login.gif" id="img_login" /><br />
        <a href="tw_login.html"><img src="./img/sign_in_with_twitter.png" /></a><br />
        <a href="fb_login.html"><img src="./img/login_with_facebook.png" /></a>
    </div>
    <div class="clearfix right">
        <a href="http://b.hatena.ne.jp/entry/http://todo-day.com/" class="hatena-bookmark-button" data-hatena-bookmark-title="Today" data-hatena-bookmark-layout="standard" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
        
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://todo-day.com/" data-lang="ja">ツイート</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        
        <div class="fb-like" data-href="http://todo-day.com/" data-send="false" data-layout="button_count" data-width="120" data-show-faces="true"></div>
    </div>
</section>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>