<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-12 col-lg-8" id="secondary" role="complementary">
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="widget">
        <g-h3 class="gcq_h3">
            <?php _e('新文章'); ?>
        </g-h3>

        <ul class="widget-list">
            <?php \Widget\Contents\Post\Recent::alloc()
                    ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
        </ul>
    </section>
    <?php endif; ?>



    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="widget">
        <g-h3 class="gcq_h3">
            <?php _e('新评论'); ?>
        </g-h3>


        <ul class="widget-list">
            <?php \Widget\Comments\Recent::alloc()->to($comments); ?>
            <?php while ($comments->next()): ?>
            <li>
                <a href="<?php $comments->permalink(); ?>">
                    <?php $comments->author(false); ?>
                </a>:
                <?php $comments->excerpt(35, '...'); ?>
            </li>
            <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>

<!--标签云-->
    <section class="widget">
        <h3 class="widget-title"><?php _e('标签云'); ?></h3>  
        <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=30&sort=count&desc=1')->to($tags); ?>
        <?php if($tags->have()): ?>     
            <?php while ($tags->next()): ?>   
                <a style="color:rgb(<?php echo(rand(0,255)); ?>,<?php echo(rand(0,255)); ?>,<?php echo(rand(0,255)); ?>);font-size:<?php echo(rand(12,22));?>px;" href="<?php $tags->permalink();?>" title="<?php $tags->count(); ?> 个话题"><?php $tags->name(); ?></a>
            <?php endwhile; ?> 
        <?php endif; ?>
    </section>
    
    
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget">
        <g-h3 class="gcq_h3">
            <?php _e('分类'); ?>
        </g-h3>


        <?php \Widget\Metas\Category\Rows::alloc()->listCategories('wrapClass=widget-list'); ?>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <section class="widget">
        <g-h3 class="gcq_h3">
            <?php _e('时间线'); ?>
        </g-h3>


        <ul class="widget-list">
            <?php \Widget\Contents\Post\Date::alloc('type=month&format=m月 Y') ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
        </ul>
    </section>
    <?php endif; ?>

    
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
    <section class="widget">
        <g-h3 class="gcq_h3">
            <?php _e('其它'); ?>
        </g-h3>


        <ul class="widget-list">
            <?php if ($this->user->hasLogin()): ?>
            <li class="last"><a href="<?php $this->options->adminUrl(); ?>">
                    <?php _e('进入后台'); ?>
                    (
                    <?php $this->user->screenName(); ?>)
                </a></li>
            <li><a href="<?php $this->options->logoutUrl(); ?>">
                    <?php _e('退出'); ?>
                </a></li>
            <?php else: ?>
            <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>">
                    <?php _e('登录'); ?>
                </a>
            </li>
            <form action="<?php $this->options->loginAction()?>" method="post" name="login" rold="form">
                <input type="hidden" name="referer" value="<?php $this->options->siteUrl(); ?>">
                <input type="text" name="name" autocomplete="username" placeholder="请输入用户名" required />
                <input type="password" name="password" autocomplete="current-password" placeholder="请输入密码" required />
                <button type="submit">登录</button>
                
 
            </form>
            <br/>

            <form action="<?php $this->options->registerAction();?>" method="post" name="register" role="form">
                <input type="hidden" name="_"
                    value="<?php echo $this->security->getToken($this->request->getRequestUrl());?>">
                <div>用户名</div>
                <input type="text" name="name">
                <div>邮箱:</div>
                <input type="email" id="mail" name="mail">
                <button type="submit" name="loginsubmit" value="true">注册</button>
            </form>
            <?php endif; ?>
            <li><a href="<?php $this->options->feedUrl(); ?>">
                    <?php _e('文章 RSS'); ?>
                </a></li>
            <li><a href="<?php $this->options->commentsFeedUrl(); ?>">
                    <?php _e('评论 RSS'); ?>
                </a></li>
            <li><a href="http://www.typecho.org">Typecho</a></li>
        </ul>
    </section>
    <?php endif; ?>

</div><!-- end #sidebar -->