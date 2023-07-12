<?php
/**
 * Default theme for Typecho
 *
 * @package Typecho Replica Theme
 * @author www.gcqweb.cn
 * @version 1.2
 * @link http://typecho.org
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');?>
<!--?php $this->need('html/winter/winter.html'); ?-->
<?php 
	$h2 = array(   
			'随便说说',   
			'随时随地分享身边的新鲜事~',   
			'说说你在想什么，做什么',   
			'来微博看我',   
			'嘀咕一下',
			'立刻吐槽~','越努力，越幸运！'
		);    
?>
<?php if ($this->is('index')) : ?>
<?php if($this->_currentPage<2) echo '
<div class="welcome">
    <canvas id="mycanvas"></canvas>
    <div class="helloFriend">
        <div class="helloLeft">
            <span class="helloTextEn">Hello，New Friend！</span>
            <span class="helloTextCn">
                <i class="">你好</i> ，新朋友！
            </span>
            <span class="helloCore">欢迎到访，'.$h2[(array_rand($h2))].
             '</span>
        </div>
        <div class="helloRight">
            <a href="https://www.aliyundrive.com/s/mWSHVMYphdB" target="_blank"> 
            <button class="free" type="button"> 免费使用</button>
            </a>
        </div>
    </div>
</div>' ?>
<?php endif; ?>

<!--
 *                 .-~~~~~~~~~-._       _.-~~~~~~~~~-.
 *             __.'              ~.   .~              `.__
 *           .'//                  \./                  \\`.
 *         .'//                     |                     \\`.
 *       .'// .-~"""""""~~~~-._     |     _,-~~~~"""""""~-. \\`.
 *     .'//.-"                 `-.  |  .-'                 "-.\\`.
 *   .'//______.============-..   \ | /   ..-============.______\\`.
 * .'______________________________\|/______________________________`.
 *
 *-->
    
      

<!--新年快乐-->
<!--<div id="wp"class="wp"><div class="xnkl"><div class="deng-box2"><div class="deng"><div class="xian"></div><div class="deng-a"><div class="deng-b"><div class="deng-t">度</div></div></div><div class="shui shui-a"><div class="shui-c"></div><div class="shui-b"></div></div></div></div><div class="deng-box3"><div class="deng"><div class="xian"></div><div class="deng-a"><div class="deng-b"><div class="deng-t">欢</div></div></div><div class="shui shui-a"><div class="shui-c"></div><div class="shui-b"></div></div></div></div><div class="deng-box1"><div class="deng"><div class="xian"></div><div class="deng-a"><div class="deng-b"><div class="deng-t">春</div></div></div><div class="shui shui-a"><div class="shui-c"></div><div class="shui-b"></div></div></div></div><div class="deng-box"><div class="deng"><div class="xian"></div><div class="deng-a"><div class="deng-b"><div class="deng-t">新</div></div></div><div class="shui shui-a"><div class="shui-c"></div><div class="shui-b"></div></div></div></div></div></div>-->





<div class="container" style="margin-top:2rem">
    <div class="post-cont ">
        <?php while ($this->next()): ?>
        <article class="feed-post ">
            <div class="feed-post_aside">
                <a href="<?php $this->author->permalink(); ?>" target="_blank">
                    <!--用户头像，或QQ头像-->
                    <span class="gcq-block touxiang">
                        <?php $number=$this->author->mail;
                            if(preg_match('|^[1-9]\d{4,11}@qq\.com$|i',$number)){
                            echo '<img src="https://q2.qlogo.cn/headimg_dl? bs='.$number.'&dst_uin='.$number.'&dst_uin='.$number.'&;dst_uin='.$number.'&spec=100&url_enc=0&referer=bu_interface&term_type=PC" width="40px" height="40px">'; 
                            }
                            else{
                                $this->author->gravatar(40); 
                            }
                        ?>
                    </span>
                </a>
            </div>
            <div class="feed-post_main">
                <div class="feed-post_meta">
                    <a class="post-uname" href="<?php $this->author->permalink(); ?>" target="_blank">
                        <?php $this->author(); ?>
                    </a>
                    <!--<i class="layui-icon layui-icon-vercode" style="font-size: 0.75rem; color: #ffc107;"></i>-->
                    <span  style="font-size: 0.75rem; color: var(--主色);-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;">官方</span>

                    <time datetime="<?php $this->dateWord('c'); ?>" class="post-time">
                        <span class="post-time">
                            <?php $this->dateWord('c'); ?>
                        </span></time>
                </div>
                <div class="feed-post_doc">
                    <div class="post-detail">
                        <div>
                            <a href="<?php $this->permalink() ?>" target="<?php $this->permalink() ?>"
                                class="feed-post_title">
                                <?php $this->title() ?>
                            </a>
                        </div>
                        <div class="feed-post_desc">
                            <?php $this->excerpt(180, '...'); ?>
                        </div>
                    </div>
                <?php if (getArticleOneImg($this)): ?>
                    <a href="<?php $this->permalink() ?>" target="<?php $this->permalink() ?>">
                    <!--style="background-image: url('');">-->
                    <img class="feed-post_cover" src="<?php echo getArticleOneImg($this); ?>" alt="<?php $this->title() ?>">
                    </a>
                <!--?php else: ?>-->
                <?php endif; ?>
                </div>
                <div class="feed-post_extra">
                    <!--<div class="feed-post_meta2">-->
                    <!--    <span class="adminId">{if(!$v['member_id'])}-->
                    <!--        {fun adminInfo($v['userid'],'name')}-->
                    <!--        {else}-->
                    <!--        <a class="post-uname" href="/user/active/uid/{$v['member_id']}"-->
                    <!--            target="_blank">{fun memberInfo($v['member_id'],'username')}</a>-->
                    <!--        {/if}</span>-->
                    <a class="feed-post_source" href="<?php $this->permalink() ?>#comments" target="_blank">
                        <?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?>
                    </a>


                    <!--</div>-->

                    <span class="feed-post_source">
                        <svg width="1em" height="1em" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" class="icon"
                            style="width: 16px; min-width: 16px; height: 16px;">
                            <path
                                d="M128,16 C189.855892,16 240,66.144108 240,128 C240,189.855892 189.855892,240 128,240 C66.144108,240 16,189.855892 16,128 C16,66.144108 66.144108,16 128,16 Z M128,35.4672309 C76.8955628,35.4672309 35.4672309,76.8955628 35.4672309,128 C35.4672309,179.104437 76.8955628,220.532769 128,220.532769 C179.104437,220.532769 220.532769,179.104437 220.532769,128 C220.532769,76.8955628 179.104437,35.4672309 128,35.4672309 Z M111.213203,83.9289322 C115.118446,80.0236893 121.450096,80.0236893 125.355339,83.9289322 L125.355339,83.9289322 L148.066757,106.64035 L148.414714,106.993991 C159.781314,118.73525 159.665328,137.468185 148.066757,149.066757 L148.066757,149.066757 L125.355339,171.778175 L125.139949,171.987315 C121.220656,175.682127 115.047442,175.612413 111.213203,171.778175 C107.307961,167.872932 107.307961,161.541282 111.213203,157.636039 L111.213203,157.636039 L133.924621,134.924621 L134.133761,134.709231 C137.828573,130.789939 137.75886,124.616724 133.924621,120.782486 L133.924621,120.782486 L111.213203,98.0710678 L111.004063,97.8556774 C107.309252,93.9363852 107.378965,87.7631707 111.213203,83.9289322 Z"
                                fill="currentColor">
                            </path>
                        </svg>
                        <!--查看全文-->
                                <?php $this->category(','); ?>
                        </span>
                    
                </div>
            </div>
        </article>
        <?php endwhile; ?>
        <?php $this->pageNav('上一页', '下一页'); ?>
        <!--?php $this->need('sidebar.php'); ?>-->
        <!--?php $this->need('WeChatMoments.php'); ?-->
    </div>

</div>
<script>
        var canvas = document.getElementById("mycanvas");
        var ctx = canvas.getContext("2d");

        // 设置canvas的宽高
        var canvas_width = window.innerWidth * 2;
        var canvas_height = canvas.height * 4;
        canvas.width = canvas_width;
        canvas.height = canvas_height;

        // 圆形的最大半径和最小半径
        var maxRadius = 100;
        var minRadius = 50;

        // 圆形的颜色数组
        var colors = ["#ff9900", " #e74c3c", " #f888ee", " #3498db", " #ddaabb", " #27ae60", " #f1c40f", " #8e44ad"];

        // 圆形的数组
        var circles = [];

        // 创建圆形的构造函数
        function Circle(x, y, dx, dy, radius, color) {
            this.x = x;
            this.y = y;
            this.dx = dx;
            this.dy = dy;
            this.radius = radius;
            this.color = color;

            // 绘制圆形
            this.draw = function () {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = this.color;
                ctx.fill();
                // ctx.fillRect(0, 0, canvas.width, canvas.height);
            }

            // 移动圆形
            this.move = function () {
                // 圆形碰到边缘反弹移动
                if (this.x + this.radius >= canvas_width) {
                    this.dx = -Math.abs(this.dx);
                }
                if (this.x - this.radius <= 0) {
                    this.dx = Math.abs(this.dx);
                }
                if (this.y + this.radius >= canvas_height) {
                    this.dy = -Math.abs(this.dy);
                }
                if (this.y - this.radius <= 0) {
                    this.dy = Math.abs(this.dy);
                }

                // 移动圆形
                this.x += this.dx;
                this.y += this.dy;

                // 绘制圆形
                this.draw();
            }
        }

        // 创建随机的圆形
        function createRandomCircle() {
            // 圆形的位置和速度
            var x = Math.random() * (canvas_width - maxRadius * 2) + maxRadius;
            var y = Math.random() * (canvas_height - maxRadius * 2) + maxRadius;
            var dx = (Math.random() - 0.5) * canvas_width/960;//canvas_width, canvas_height
            var dy = (Math.random() - 0.5) * canvas_height/540;

            // 圆形的半径和颜色
            var radius = Math.random() * (maxRadius - minRadius) + minRadius;
            var color = colors[Math.floor(Math.random() * colors.length)];

            // 创建圆形对象
            var circle = new Circle(x, y, dx, dy, radius, color);

            // 将圆形对象添加到数组中
            circles.push(circle);
        }

        // 绘制圆形
        function drawCircles() {
            // 清空canvas
            ctx.clearRect(0, 0, canvas_width, canvas_height);

            // 绘制所有圆形
            for (var i = 0; i < circles.length; i++) {
                circles[i].move();
            }
        }

        // 创建8个圆形
        for (var i = 0; i < 8; i++) {
            createRandomCircle();
        }

        // 创建定时器，每隔10毫秒绘制所有圆形
        setInterval(function () {
            drawCircles();
        }, 10);
    </script>

<?php $this->need('footer.php'); ?>