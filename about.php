<?php
/**
 * about
 *
 * @package custom
 */
$this->need('header.php');
 ?>

<style>
    body {
        background: -webkit-linear-gradient(top, transparent 19px, #e7e7e7 20px), -webkit-linear-gradient(left, transparent 19px, #e7e7e7 20px);
        background-size: 20px 20px;
        background: -webkit-linear-gradient(top, transparent 19px, #e7e7e7 20px), -webkit-linear-gradient(left, transparent 19px, #e7e7e7 20px);
        background-size: 20px 20px;
    }

    .post textarea {
        opacity: 0.6;
    }
</style>
<div class="container">
    <div class="col-md-8 col-12" style="margin:0 auto">
        <article class="post" style="">
            <section class="" style="margin-top:5rem">
                <h3 class="faq-title">孵化于2022年6月1号，希望服务更多个体以及团队</h3>
                <div class="about-main">
                    <span>「走码观花」是个人网站，<b>用于文档与知识库工具</b>，个人开发测试，2022年6月1号正式对外提供服务。</span>
                    <span>诞生伊始，只是提供一个好用的工具用来「搬运」技术文档，让这些知识不只是留在每个人的大脑或电脑里，还可以被方便地记录、分享和交流。
                    </span>
                    <span>不止步于服务自己，致力于为每个人和团队提供服务，让知识能得以记录、沉淀和交流，让人们可以在「走码观花」中平等快乐地创作和交流知识。</span>
                    <span>我们希望每一个人和团队，可以将自己的学习、记录、思考和创作，有机的整合在一起，形成有生命力的独特景观，<b>让再小的个体也可以拥有自己的数字花园</b>。</span>
                </div>
            </section>

            <section class="" style="margin-top:7rem">
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-12">
                        <div class="lefe-title">认识下
                            <span class="love" style="width: 100px; height: 50px;">
                                <span class="love1"><strong>有爱</strong></span>
                                <img class="love-img"
                                    src="https://gw.alipayobjects.com/zos/bmw-prod/8e0650ba-8432-43aa-b7b0-82fd83509619.svg"
                                    width="100" height="72" style="left: 10px; top: -13px;">
                            </span>的我们吧
                        </div>
                        <p class="faq " style="text-indent: 2em;">
                            秉承简单自由有爱的文化。简单的背后是专业，足够专业才能让事情变简单。自由的背后是责任，我们崇尚自由，同时必须要有对产品和用户的责任与担当。
                        </p>
                    </div>
                    <div class="col-12 col-lg-6 col-md-12" style="max-width:100%">
                        <img class="" style="max-width:100%"
                            src="https://gw.alipayobjects.com/mdn/rms_ee84bf/afts/img/A*kv1yQ74S3KMAAAAAAAAAAAAAARQnAQ"
                            alt="team">
                    </div>
                </div>
            </section>
            <?php $this->need('comments.php'); ?>
        </article>
    </div>
</div>
<?php $this->need('html/test.html'); ?>

<script type="text/javascript" src="https://api.map.baidu.com/api?v=1.0&type=webgl&ak=y1QMLdRyiKxmLDTQRchXmDyhtqdWfCEu">
</script>

<!--<map style="max-width:500px;">-->
<!--	?php $this->need('html/baidu_map.html'); ?>-->
<!--</map>-->
<br>
<?php $this->need('html/foot.html'); ?>