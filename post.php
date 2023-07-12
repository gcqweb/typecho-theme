<?php if (!defined('__TYPECHO_ROOT_DIR__'))
    exit; ?>

<!--自定义模板位置和名称-->
<?php if ($this->category == 'app'): ?>
    <?php $this->need('html/post-template/app.php'); ?>
<?php elseif ($this->category == 'letter'): ?>
    <?php $this->need('html/post-template/letter.php'); ?>
<?php elseif ($this->category == 'lrc'): ?>
    <?php $this->need('html/post-template/lrc.php'); ?>
<?php elseif ($this->category == 'note'): ?>
    <?php $this->need('html/post-template/note.php'); ?>
<?php else: ?>

    <?php $this->need('header.php');
    header('Access-Control-Allow-Origin: *'); ?>
    <!--banner区域-->
    <div class="note_banner">
        <img id="banner" name="randimg" src="https://www.gcqweb.cn/usr/themes/default/img/postop-def.jpg" alt="banner">
        <!--<div id="banner" class="banner" name="randimg"></div>-->
    </div>

    <article class="note_container  flex1" itemscope itemtype="http://schema.org/BlogPosting">
        <h4 class="g_note_title fadeIn huxi-text">
            <?php $this->title() ?>
        </h4>
        <aside class="g_note_info">
            <span class="g_note_author" itemprop="author" itemscope itemtype="http://schema.org/Person">

                <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author">
                    <?php _e('作者:');
                    $this->author(); ?>
                </a>
            </span>

            <span class="g_note_misc">
                <span>
                    <?php $this->category(','); ?>
                    <?php echo art_count($this->cid); ?>
                </span>
                <span itemprop="interactionCount">
                    <a href="<?php $this->permalink() ?>#comments">
                        <?php $this->commentsNum('', '1评论', '评论%d'); ?>
                    </a>
                </span>
            </span>

            <span class="g_note_addtime ">
                <?php _e('时间: '); ?>
                <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished">
                    <?php $this->date(); ?>
                </time>
            </span>

        </aside>

        <div class="weak"></div>
        <div class="g_note" itemprop="articleBody" id="lightgallery">
            <?php $this->content('- 阅读剩余部分 -'); ?>
        </div>

    </article>



    <div class="note_container" style="padding:0 1.2rem;margin-top:3rem;width:100%">
        <!--<p itemprop="keywords" class="tags">-->
        <!--    <?php _e('标签: '); ?>-->
        <!--    <?php $this->tags(', ', true, 'none'); ?>-->
        <!--</p>-->
        <!--编辑-->
        <span class="edit" style="display: flex;margin: 10px auto;justify-content: space-evenly;">
            <!--编辑文章-->
            <?php if ($this->user->hasLogin()): ?>
                <a class="edit-post" href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid; ?>"
                    target="_blank">编辑</a>
                <?php Typecho_Widget::widget('Widget_Security')->to($security); ?>
                <!--删除文章-->
                <a class="edit-post" href="<?php $security->index('/action/contents-post-edit?do=delete&cid=' . $this->cid); ?>"
                    onclick="javascript:return p_del()">删除文章</a>
            <?php endif; ?>
        </span>

        <!--面包屑-->
        <!--<div class="crumbs_patch">-->
        <!--    <a href="<?php $this->options->siteUrl(); ?>">首页</a> &raquo;</li>-->
        <!--    <?php if ($this->is('index')): ?>-->
            <!--    <?php elseif ($this->is('post')): ?>-->
            <!-- 页面为文章单页时 -->
            <!--    <?php $this->category(); ?> &raquo;-->
            <!--    <?php $this->title() ?>-->
            <!--    <?php else: ?>-->
            <!-- 页面为其他页时 -->
            <!--    <?php $this->archiveTitle(' &raquo; ', '', ''); ?>-->
            <!--    <?php endif; ?>-->
        <!--</div>-->

        <ul class="post-near ">

            <li>上一篇:
                <?php $this->thePrev('%s', '没有了'); ?>
            </li>
            <li>下一篇:
                <?php $this->theNext('%s', '没有了'); ?>
            </li>
        </ul>
        <!--以前今天发的文-->
        <!--<?php _getHistoryToday(time()) ?>-->
        <?php $this->need('comments.php'); ?>
    </div>

    <!--end #main-->

    <script src="<?php $this->options->themeUrl('js/colorThief.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/postBg.js'); ?>"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">
    <!--<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>-->
    <!--<link rel="stylesheet" href="<?php $this->options->themeUrl('/style/highlight/styles/vs.min.css'); ?>">-->
    <!--#atom-one-light.min.css-->
    <script>
            // 代码高亮
            // hljs.configure({theme: 'atom-one-light'});
            // hljs.highlightAll();
            // document.querySelectorAll('pre').forEach(el => {
            //   // then highlight each
            //   hljs.highlightElement(el);
            // });
    </script>
    <script>
        // 网页banner图片，命名0-51 
        const pic1 = Array.from({ length: 36 }, (_, i) => `<?php $this->options->themeUrl('img/postop/ch (${i + 1}).jpg'); ?>`);
        const pic2 = Array.from({ length: 9 }, (_, i) => `<?php $this->options->themeUrl('img/postop/00${i + 1}.jpg'); ?>`);
        const pic3 = Array.from({ length: 8 }, (_, i) => `<?php $this->options->themeUrl('img/postop/01${i}.jpg'); ?>`);
        const png = Array.from({ length: 1 }, (_, i) => `<?php $this->options->themeUrl('img/postop/my-drew (${i + 1}).png'); ?>`);
        const mydrew = Array.from({ length: 37 }, (_, i) => `<?php $this->options->themeUrl('img/postop/my-drew (${i + 1}).jpeg'); ?>`);
        const pic = [...pic1, ...pic2, ...pic3, ...png, ...mydrew]
        // console.log(typeof pic,'pic')
        const choose = Math.floor(Math.random() * pic.length);
        const bannerBg = document.querySelector('.note_banner');
        bannerBg.style.backgroundImage = `url('${pic[choose]}')`;
        bannerBg.style.background = `linear-gradient(rgba(255, 255, 255, 0) 0px, var(--postbgafter) 30vmin, rgb(255, 255, 255) 100%), url('${pic[choose]}') center / 100% no-repeat`;
        // const body = document.querySelector('body');
        // 设置背景颜色为 var(--bg)
        // body.style.backgroundColor = 'var(--bg)';
        document.body.style.background = 'var(--postbg, #f8f9f9)';
        // console.log(bannerBg);
        document.randimg.src = pic[choose];
        // console.log(document.randimg.src);

        // 删除文章
        const p_del = () => confirm("您真的确定要删除吗？");


        //文章根据视口大小，添加css
        const width = window.innerWidth
        const height = window.innerHeight
        if (width < 700) {
            // 获取所有class为g_note的标签
            const gNoteTags = document.querySelectorAll('.g_note');
            // 遍历所有g_note标签
            gNoteTags.forEach(tag => {
                // 获取该标签下所有子元素
                const children = tag.children;
                // 遍历所有子元素
                for (let i = 0; i < children.length; i++) {
                    // 添加Margin
                    children[i].style.margin = '0 1.2rem';
                    // 如果该子元素是p标签，且包含图片
                    // if (children[i].tagName === 'P' && children[i].querySelector('img')) {
                    if (children[i].querySelector('img')) {
                        // 添加Margin
                        children[i].style.margin = '0';
                    }
                }
            });
        }
    </script>
    <?php $this->need('footer.php'); ?>
<?php endif; ?>