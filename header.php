<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html lang="zh-CN">

<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>
        <?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search'   => _t('包含关键字 %s 的文章'),
            'tag'      => _t('标签 %s 下的文章'),
            'author'   => _t('%s 发布的文章')
        ], '', ' - '); ?>
        <?php $this->options->title(); ?>
    </title>
    <link rel="stylesheet" href="/favicon.ico">
    <!-- 使用url函数转换相关路径 -->
    <!--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/zui/1.10.0/css/zui.min.css">-->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/post.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/gcqweb_cn.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('html/winter/winter.css'); ?>">
    <script src="<?php $this->options->themeUrl('js/jQuery-3.6.1.min.js'); ?>"></script>
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header("generator=&template=&rss1=&rss2=&wlw=&xmlrpc=&pingback=&atom="); ?>
    <?php header('Access-Control-Allow-Origin: https://gcqweb.cn, http://gcqweb.cn,https://www.gcqweb.cn'); ?>
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?085b3a52ca72a850268c5658869a9ba2";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <style>
        .timer {
            top: 8rem;
            right: 6rem;
            width: 3rem;
            height: 3rem;
            background-color: transparent;
            box-shadow: inset 0px 0px 0px 3px #fff;
            border-radius: 50%;
            position: fixed;
            z-index: 9999;
        }

        .timer:before {
            width: .8rem;
            height: 3px;
            top: 1.5rem;
            left: 1.5rem;
            -webkit-transform-origin: 1px 1px;
            -moz-transform-origin: 1px 1px;
            transform-origin: 1px 1px;
            -webkit-animation: hrhand 8s linear infinite;
            -moz-animation: hrhand 8s linear infinite;
            animation: hrhand 8s linear infinite;
        }

        .timer:after {
            width: 1.1rem;
            height: 3px;
            top: 1.5rem;
            left: 1.5rem;
            -webkit-transform-origin: 1px 1px;
            -moz-transform-origin: 1px 1px;
            transform-origin: 1px 1px;
            -webkit-animation: minhand 2s linear infinite;
            -moz-animation: minhand 2s linear infinite;
            animation: minhand 2s linear infinite;
        }

        .timer:after,
        .timer:before {
            position: absolute;
            content: "";
            background-color: #fff;
        }

        @-webkit-keyframes minhand {
            0% {
                -webkit-transform: rotate(0deg)
            }

            100% {
                -webkit-transform: rotate(360deg)
            }
        }

        @-moz-keyframes minhand {
            0% {
                -moz-transform: rotate(0deg)
            }

            100% {
                -moz-transform: rotate(360deg)
            }
        }

        @keyframes minhand {
            0% {
                transform: rotate(0deg)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        @-webkit-keyframes hrhand {
            0% {
                -webkit-transform: rotate(0deg)
            }

            100% {
                -webkit-transform: rotate(360deg)
            }
        }

        @-moz-keyframes hrhand {
            0% {
                -moz-transform: rotate(0deg)
            }

            100% {
                -moz-transform: rotate(360deg)
            }
        }

        @keyframes hrhand {
            0% {
                transform: rotate(0deg)
            }

            100% {
                transform: rotate(360deg)
            }
        }
    </style>
</head>

<body class="flex" style="min-height:100vh;display:flex;flex-direction: column;
">
    <!--loading-->
    <div class="timer"></div>

    <header id="header" class="clearfix navblur">
        <div class="container">
            <div class="flex " style="justify-content: space-between;align-items: center; ">
                <div class="走码观花" onmouseover="playAudio()" onmouseout="pauseAudio()">
                    <?php if ($this->options->logoUrl): ?>
                    <a id="logo" draggable="true" href="<?php $this->options->siteUrl(); ?>">
                        <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
                    </a>
                    <?php else: ?>
                    <a id="logo" draggable="true" href="<?php $this->options->siteUrl(); ?>">
                        <?php $this->options->title() ?>
                    </a>
                    <!--<p class="description"><?php $this->options->description() ?></p>-->
                    <?php endif; ?>
                    <audio id="myAudio">
                        <source src="<?php $this->options->themeUrl('style/zmgh.mp3'); ?>" type="audio/mpeg">
                        浏览器不支持
                    </audio>
                    <script>
                        var audio = document.getElementById("myAudio");
                        function playAudio() { audio.play(); }//播放
                        function pauseAudio() { audio.pause(); }//暂停

                    </script>
                </div>
                <div>
                    <!--<button class="mobileNav" id ="toggle-sidebar" ></button>-->
                    <?php $this->need('html/menu-box/menu-box.php'); ?>
                </div>
                <div class="flex ju-al gcqnav">
                    <div class="">
                        <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                            <!--<label for="s" class="sr-only">?php _e('搜索关键字'); ?></label>-->
                            <input style="width:3.3rem" type="text" id="s" name="s" class="text"
                                placeholder="<?php _e('搜索'); ?>" />
                            <!--<button type="submit" class="submit">搜索</button>-->
                        </form>
                    </div>
                    <nav class="menuAndNav" role="navigation">
                        <!--<div class="nav-menu">-->
                        <a<?php if ($this->is('index')): ?> class="current"
                            <?php endif; ?>
                            href="<?php $this->options->siteUrl(); ?>">首页</a>
                            <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
                            <menu class="navMeun">
                                <ul class="flex">
                                    <!--分类菜单-->
                                    <li class="">
                                        <span class="fl">分类</span>
                                        <ul>
                                            <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
                                            <?php while ($categorys->next()) : ?>
                                            <?php if ($categorys->levels === 0) : ?>
                                            <?php $children = $categorys->getAllChildren($categorys->mid); ?>
                                            <li><a href="<?php $categorys->permalink(); ?>"
                                                    style="word-break:break-all;">
                                                    <?php $categorys->name(); ?>
                                                </a></li>
                                            <?php endif; ?>
                                            <?php endwhile; ?>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <span class="ym">更多</span>
                                        <ul>
                                            <li><a href="<?php $this->options->themeUrl('html/drew/index.html');?>"
                                                    target="_blank">画板（压感）</a></li>
                                            <li><a href="https://www.aliyundrive.com/s/mWSHVMYphdB"
                                                    target="_blank">黑马前端教程视频</a></li>
                                            <?php while ($pages->next()): ?>
                                            <li>
                                                <a <?php if ($this->is('page', $pages->slug)): ?>
                                                    class="current"
                                                    <?php endif; ?>
                                                    href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
                                            </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    </li>

                                    <li class="">
                                        <span class="ym">GPT</span>
                                        <ul>
                                            <li><a href="https://chat.6.bnu120.space/" target="_blank">🔥FreeGPT</a></li>
                                            <li><a href="https://chat2.jinshutuan.com/" target="_blank">✅AIChatOS</a></li>
                                            <li><a href="https://chatgpt.gcqweb.cn" target="_blank">❌ChatGPT</a></li>
                                            <li><a href="https://gpt.gcqweb.cn" target="_blank">❌GPT</a></li>
                                            <li><a href="https://gpt.1.gcqweb.cn" target="_blank">❌GPT-1</a></li>
                                            <li><a href="http://chat.gcqweb.cn/" target="_blank">❌GPT-python</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </menu>
                            <!--</div>-->
                            <?php if ($this->user->hasLogin()): ?>
                            <a class="hovera" href="<?php $this->options->adminUrl(); ?>">
                                <?php $this->user->screenName(); ?>
                            </a>
                            <a class="ahover" href="<?php $this->options->logoutUrl(); ?>">注销</a>
                            <?php else: ?>
                            <a href="<?php $this->options->adminUrl('login.php'); ?>">登录/注册</a>
                            <?php endif; ?>
                    </nav>
                </div>

            </div><!-- end .row -->
        </div>
                        
    </header>
    <!--<-?php $this->need('html/menu-box/menu-box.php'); ?>-->