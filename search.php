<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<section class="container">
    <div class="section-space--ptb_80 post-cont">
        <p class="search-return">
            <?php $this->archiveTitle(['search'   => _t('%s')], '', ''); ?>
            <span class="search-num">相关内容 为你找到约
                <?php echo $this->getTotal(); ?> 个结果
                <?php if($this->_currentPage>=2) echo '，当前第'.$this->_currentPage.'页'; ?>
            </span>
        </p>

        <div class="search-modular">
            <ul class="search-list-items">
                <?php if ($this->have()): ?>
                <?php while ($this->next()): ?>
                <li class="search-list-item">
                    <div>
                        <div class="search-module">
                            <div class="search-doc">
                                <svg width="1em" height="1em" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" class="icon index-module_size_wVASz"
                                    style="width: 26px; min-width: 26px; height: 26px;">
                                    <path
                                        d="M18.375,2.625 C20.0318542,2.625 21.375,3.96814575 21.375,5.625 L21.375,18.375 C21.375,20.0318542 20.0318542,21.375 18.375,21.375 L5.625,21.375 C3.96814575,21.375 2.625,20.0318542 2.625,18.375 L2.625,5.625 C2.625,3.96814575 3.96814575,2.625 5.625,2.625 L18.375,2.625 Z M10.96875,15.09375 L7.03125,15.09375 C6.46170635,15.09375 6,15.5554564 6,16.125 C6,16.6945436 6.46170635,17.15625 7.03125,17.15625 L7.03125,17.15625 L10.96875,17.15625 C11.5382936,17.15625 12,16.6945436 12,16.125 C12,15.5554564 11.5382936,15.09375 10.96875,15.09375 L10.96875,15.09375 Z M16.96875,10.96875 L7.03125,10.96875 C6.46170635,10.96875 6,11.4304564 6,12 C6,12.5695436 6.46170635,13.03125 7.03125,13.03125 L7.03125,13.03125 L16.96875,13.03125 C17.5382936,13.03125 18,12.5695436 18,12 C18,11.4304564 17.5382936,10.96875 16.96875,10.96875 L16.96875,10.96875 Z M16.96875,6.84375 L7.03125,6.84375 C6.46170635,6.84375 6,7.30545635 6,7.875 C6,8.44454365 6.46170635,8.90625 7.03125,8.90625 L7.03125,8.90625 L16.96875,8.90625 C17.5382936,8.90625 18,8.44454365 18,7.875 C18,7.30545635 17.5382936,6.84375 16.96875,6.84375 L16.96875,6.84375 Z"
                                        fill="#4E86E6">
                                    </path>
                                </svg>
                                <div class="search-info">
                                    <h3 class="search-title">
                                        <a itemprop="url" href="<?php $this->permalink() ?>"
                                            target="<?php $this->permalink() ?>">
                                            <?php $this->title() ?>
                                        </a>
                                    </h3>
                                    <p class="search-body">
                                        <?php $this->excerpt(200, '...');?>
                                    </p>
                                    <p class="search-belongInfo">
                                        <span>
                                            <?php $this->category(','); ?>
                                        </span>
                                        <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"
                                            class="search-date">
                                            <?php $this->date(); ?>
                                        </time>
                                    </p>
                                </div>
                                <a itemprop="url" href="<?php $this->permalink() ?>"
                                    target="<?php $this->permalink() ?>" class="search-litpic">
                                    <img style="max-width:6rem;" src="<?php echo getArticleOneImg($this); ?>" />
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endwhile; ?>
                <?php else: ?>
                <error class="search-error">
                    <form method="post">
                        <input name="s" autofocus class="error-input" placeholder="尝试重新搜索" type="text" value="走码观花">
                        <button type="submit" class="submit err-btn">搜索</button>
                    </form>
                    <h2 class="search-error-title">找不到和您查询的“<?php $this->archiveTitle(['search'   => _t('%s')], '', ''); ?>”相符的内容</h2>
                    <!--<img src="<?php $this->options->themeUrl('img/error-404.jpg'); ?>" alt="error-404">-->
                    <div class="search-error-tips">
                        <p>建议：</p>
                        <p>请检查输入字词有无错误。</p>
                        <p>请尝试其他查询词。</p>
                        <p>请改用较常见的字词。</p>
                        <p>更换搜索范围，比如搜索“走码观花”。</p>
                    </div>
                </error>
                <?php endif; ?>

            </ul>
            <?php $this->pageNav('前一页', '后一页'); ?>

        </div>
    </div>
</section>

<?php $this->need('footer.php'); ?>