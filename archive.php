<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<?php $this->need('html/winter/winter.html'); ?>
<!-- 文章区域 -->
<div class="container">
    
    <g-h3 class="gcq_h3">
        <?php $this->archiveTitle([
            'category' => _t('%s'),//分类
            'search'   => _t('关键字 %s 的文章'),
            'tag'      => _t('包含%s 标签的文章'),
            'author'   => _t('%s 发布的文章')
        ], '', ''); ?>
    </g-h3>

<?php if ($this->have()): ?>
    <?php while ($this->next()): ?>
    <blur-card class="blur_list">
        <div class="blur_card">
            <div class="blur_container">
                <div class="blur_card_view">
                    <!--缩略图-->
                    <img class="blur_card_bg" src="<?php echo getArticleOneImg($this); ?>" alt="?php $this->title() ?">

                    <a href="<?php $this->permalink() ?>" target="_blank">
                        <div class="blur_card_info">
                            <div class="blur_card_box">
                                
                                <?php if (getArticleOneImg($this)): ?>
                                    <img class="blur_card_icon" src="<?php echo getArticleOneImg($this); ?>" alt="<?php $this->title() ?>">
                                <?php endif; ?>
                      
                                <div class="blur_card_body">
                                    <div class="blur_card_title">
                                        <?php $this->title() ?>
                                    </div>
                                    <div class="blur_card_desc">
                                        <?php $this->excerpt(180, '...');?>
                                    </div>
                                    <div class="blur_card_belong">
                                        <!--作者-->
                                        <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author">
                                            <?php $this->author(); ?> 
                                        </a>
                                        <!--dateWord('c')-->
                                        <time datetime="<?php $this->dateWord('Y-m-d H:i'); ?>" itemprop="datePublished" style="margin-left:.5rem">
                                            <?php $this->dateWord(); ?>
                                        </time>
                                        <!--评论-->
                                        <a href="<?php $this->permalink() ?>#comments" style="margin-left:.5rem">
                                            <?php $this->commentsNum('', '  评论（1）', '评论（%d） '); ?>
                                        </a>
                                        <!--分类:-->
                                        <!--<?php $this->category(','); ?>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </blur-card>
    <?php endwhile; ?>
    <?php else: ?>
    <article class="post gcq_h3">
        <h2 class="post-title">
            <?php _e('没有找到内容'); ?>
        </h2>
    </article>
    <?php endif; ?>
<div class="blur_list">
    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div>
</div>

<!-- end #main -->


<?php $this->need('footer.php'); ?>
