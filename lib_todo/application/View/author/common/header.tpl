<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>{if isset($title)}{$title|escape} | {/if}{$config.site_title|escape}管理画面</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="{$config.top}/css/bootstrap.css" />
        <link rel="stylesheet" href="{$config.top}/css/bootstrap-responsive.css" />
        <link rel="stylesheet" href="{$config.top}/css/common.css" />
        <link rel="stylesheet" href="{$config.top}/css/author.css" />
        <script type="text/javascript" src="{$config.top}/js/jquery.js"></script>
        <script type="text/javascript" src="{$config.top}/js/bootstrap.js"></script>
        <script type="text/javascript" src="{$config.top}/js/jquery.author_form.js"></script>
    </head>
    <body data-offset="50" data-spy="scroll">
        <header class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a href="{$config.author}/" class="brand">{$config.site_title|escape}</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li>
                                <a href="{$config.author}/members/">会員</a>
                            </li>
                            <li>
                                <a href="{$config.author}/label/">ラベルカラー</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
        