<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>{if isset($title)}{$title|escape} | {/if}{$config.site_title}</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta http-equiv="pragma" content="no-cache">
        <meta http-equiv="cache-control" content="no-cache">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon_114x114.png" />
        <link rel="stylesheet" href="{$config.top}/css/bootstrap.css" />
        <link rel="stylesheet" href="{$config.top}/css/bootstrap-responsive.css" />
        <link rel="stylesheet" href="{$config.top}/css/common.css" />
        <link rel="stylesheet" href="{$config.top}/style.html" />
        <script type="text/javascript" src="{$config.top}/js/jquery.js"></script>
        <script type="text/javascript" src="{$config.top}/js/bootstrap.js"></script>
        <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-30121454-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

        </script>
    </head>
    <body data-offset="30">
        <div class="container">
            <header>
                <a href="./index.html"><img src="{$config.top}/img/logo.gif" alt="{$config.site_title}" /></a>
            </header>