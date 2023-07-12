<?php

if (!defined('__TYPECHO_ROOT_DIR__'))
    exit;
$this->need('header.php');
?>


<section class="flex1">

    <div class="letter_container">
        <section>
            <div class="letter_title">
                <?php $this->title() ?>
            </div>
            <span class="word-num" id="word_num">
                <?php $this->dateWord('c'); ?>
            </span>
        </section>

        <div class="letter">
            <div id="demo"></div>
            <div class="letter-body">
                <div id="letter-body">

                    <?php $this->content('- 阅读剩余部分 -'); ?>
                    <!--?php $this->excerpt(180, '...'); ?-->

                </div>
                <div class="leeter_foot">
                    <!--<p class="czjl">此致</p>-->
                    <!--<p class="czjl" style="text-indent:0em ;"><br></p>-->
                    <p class="letter_signature"><span>
                            <a href="<?php $this->author->permalink(); ?>" target="_blank">
                                <?php $this->author(); ?>
                            </a></span></p>
                    <p class="letter_time"><span>
                            <time datetime="<?php $this->dateWord('c'); ?>">
                                <?php $this->dateWord('c'); ?>
                            </time></span></p>
                </div>

            </div>
        </div>
    </div>
    <?php $this->need('comments.php'); ?>
</section>

<?php $this->need('footer.php'); ?>
<script>
    ////////////书信页打印分割线//////////
    // 获取视口宽高
    var width = window.innerWidth
    var height = window.innerHeight
    var gcqline = ''
    // 文章字数统计
    // var word_num = document.getElementById('word_num').innerHTML.replace(/[^0-9]/ig, "");
    // console.log("字数:"+parseInt(word_num));

    // 文章行数统计，需引入jQuery
    var rowNum = Math.round($("#letter-body").height() / parseFloat($("#letter-body").css('line-height')));
    console.log("除去署名有" + rowNum + "行");
    if (width > 1200) {
        rowNum = rowNum
    }
    // 根据行数打印线条
    for (var i = 0; i <= rowNum + 2; i++) {
        gcqline = gcqline + ' <div class="line" > ' + '</div > ';
    }
    document.getElementById("demo").innerHTML = gcqline;//+' <p class="page_num" > 520 / 1314' + '</p > ';

</script>