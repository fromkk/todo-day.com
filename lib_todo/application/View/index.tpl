{assign var="title" value="出来ないことだらけのシンプル過ぎるタスク管理サービス"}
{include file="common/header.tpl"}
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
        {$title}
    </div>
    <div class="well login">
        <img src="./img/login.gif" id="img_login" /><br />
        <a href="tw_login.html"><img src="./img/sign_in_with_twitter.png" /></a><br />
        <a href="fb_login.html"><img src="./img/login_with_facebook.png" /></a>
    </div>
    <div class="clearfix right">
        <a href="http://b.hatena.ne.jp/entry/http://todo-day.com/" class="hatena-bookmark-button" data-hatena-bookmark-title="Today" data-hatena-bookmark-layout="standard" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
        {literal}
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://todo-day.com/" data-lang="ja">ツイート</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        {/literal}
        <div class="fb-like" data-href="http://todo-day.com/" data-send="false" data-layout="button_count" data-width="120" data-show-faces="true"></div>
    </div>
</section>
{include file="common/footer.tpl"}