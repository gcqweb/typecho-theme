<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->footer(); ?>
<!--返回顶部-->
<a class="scroll-top" id="scroll-top">
    返回顶部
</a>

<footer style="text-align: center;background:linear-gradient(to bottom,transparent,#fff5f5cc); ">

    <div class="foot-line">
            <div class="left-line"></div>
            <div class="middle-logo"></div>
            <div class="right-line"></div>
    </div>
    <section style="display: inline-block; padding-top: 1rem;">
        <section style="font-size: 1rem;letter-spacing: 1.5px;color:#7c4f4f;margin: 0 auto;">
            <script src="https://sdk.jinrishici.com/v2/browser/jinrishici.js" charset="utf-8"></script>
            <a class="666" style="font-size: 1.2rem;letter-spacing: 1.5px;color:#7c4f4f;" href="https://www.jinrishici.com/"> <strong>
                    <div id="poem_sentence"></div>
                </strong></a>
            <small>
                <div id="poem_info"></div>
            </small>
            <script type="text/javascript">
                jinrishici.load(function (result) {
                    var sentence = document.querySelector("#poem_sentence")
                    var info = document.querySelector("#poem_info")
                    sentence.innerHTML = result.data.content
                    info.innerHTML = '【' + result.data.origin.dynasty + '】' + result.data.origin.author + '《' + result.data.origin.title + '》';
                    // console.log('古诗词已加载');

                });

            </script>
        </section>
    </section>
    
    <div class="allRight">
        <a  href="<?php $this->options->siteUrl(); ?>/about" target="_blank">&copy; 2022-<?php echo date('Y'); ?> <?php $this->options->title(); ?> 版权所有</a>
        &emsp;&nbsp; 
        <a href="https://beian.miit.gov.cn/" target="_blank">皖ICP备2022008051号-1</a>
    </div>
</footer>
    <script src="<?php $this->options->themeUrl('js/gcqweb_cn.js'); ?>"></script>
<!--阿里多彩图标-->
<!--<script src="//at.alicdn.com/t/c/font_3502332_xmb687zw1a.js"></script>-->
<!--<svg class="icon" aria-hidden="true"><use xlink:href="#xxx"></use></svg>-->
</body>
</html>