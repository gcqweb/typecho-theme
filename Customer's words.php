<?php
/**
 * talk
 *
 * @package custom
 */
 if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php'); ?>
 
 <div class="talkTop">
    <canvas class="talkTopBg"></canvas>
    <div class="helloFriend">
        <div class="helloLeft">
            <span class="talk-bannerCn">
                <i class="">期待</i>你的声音</span>
            <span class="helloTextEn">
                 <!--Look forward to your voice!-->
            </span>
        </div>
    </div>
</div>
 <div class="container talk-layout">
    <?php $this->need('talk.php');?>
 </div>
 
 <?php $this->need('footer.php');?>
 