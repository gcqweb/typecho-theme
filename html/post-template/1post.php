<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->need('header.php'); ?>
<!--banner区域-->
<!--<div class="not_banner"></div>-->
<div class="note_banner">
    <img id="banner" name="randimg" src="https://www.gcqweb.cn/usr/themes/default/img/postopz.png" style="/*display:none*/" alt="">
</div>
<script src="<?php $this->options->themeUrl('js/color-thief.js'); ?>"></script>

<script>


    // 随机图片
	var pic = new Array;
pic[0] ="<?php $this->options->themeUrl('img/postop/001.jpg'); ?>";
pic[1] ="<?php $this->options->themeUrl('img/postop/002.jpg'); ?>";
pic[2] ="<?php $this->options->themeUrl('img/postop/003.jpg'); ?>";
pic[3] ="<?php $this->options->themeUrl('img/postop/004.jpg'); ?>";
pic[4] ="<?php $this->options->themeUrl('img/postop/005.jpg'); ?>";
pic[5] ="<?php $this->options->themeUrl('img/postop/006.jpg'); ?>";
pic[6] ="<?php $this->options->themeUrl('img/postop/007.jpg'); ?>";
pic[7] ="<?php $this->options->themeUrl('img/postop/008.jpg'); ?>";
pic[8] ="<?php $this->options->themeUrl('img/postop/009.jpg'); ?>";
pic[9] ="<?php $this->options->themeUrl('img/postop/010.jpg'); ?>";
pic[10] ="<?php $this->options->themeUrl('img/postop/011.jpg'); ?>";
pic[11] ="<?php $this->options->themeUrl('img/postop/012.jpg'); ?>";
pic[12] ="<?php $this->options->themeUrl('img/postop/013.jpg'); ?>";
pic[13] ="<?php $this->options->themeUrl('img/postop/014.jpg'); ?>";
pic[14] ="<?php $this->options->themeUrl('img/postop/015.jpg'); ?>";
pic[15] ="<?php $this->options->themeUrl('img/postop/016.jpg'); ?>";
pic[16] ="<?php $this->options->themeUrl('img/postop/017.jpg'); ?>";

	
	        parseInt(Math.random() * (pic.length), 10);
	        var choose = Math.floor(Math.random() * (pic.length));
	        // document.write('<img src="' + pic[choose] + ' ">');
	        document.randimg.src = pic[choose];
	        console.log(document.randimg.src);
	    
	        
	        
	    
	    
	    
	        console.log('主色已更改');
	        
	    window.onload = function () {
	
	        console.log('主色已更改66666');
	        // 获取文章头部图片主色，需要先引入color-thief.js
	        var alfa = '0.1';
	        var alpha='0.5';
	        function getColors() {
	            let img = $('#banner')[0];
	            let colorThief = new ColorThief();
	            let rgbs = colorThief.getPalette(img, 4)
	            return rgbs
	        }
	
	        console.log(getColors());
	
	        // document.body.style.color= 'rgb(' + getColors()[0][0] + ',' + getColors()[0][1] + ',' + getColors()[0][2] +')';
	
	        // 设置主色css变量
	        postcolor='rgb(' + getColors()[0][0] + ',' + getColors()[0][1] + ',' + getColors()[0][2] + ',' + alpha + ')';
	        postbg = 'rgb(' + getColors()[1][0] + ',' + getColors()[1][1] + ',' + getColors()[1][2] + ',' + alfa + ')';
	        postcolor2='rgb(' + getColors()[2][0] + ',' + getColors()[2][1] + ',' + getColors()[2][2] + ',' + alpha + ')';
	        postcolor3='rgb(' + getColors()[3][0] + ',' + getColors()[3][1] + ',' + getColors()[3][2] + ',' + alpha + ')';
	        // 公式转换rgba->rgb, (1-透明度)*255+透明度*r/g/b/ 
	        postbgafter = 'rgb(' + ((1 - alfa) * 255 + alfa * getColors()[1][0]) + ',' + ((1 - alfa) * 255 + alfa * getColors()[1][1]) + ',' + ((1 - alfa) * 255 + alfa * getColors()[1][2]) + ')';
	
	        getComputedStyle(document.documentElement).getPropertyValue('--postbg')
	        // 将变量赋值给body
	        document.documentElement.style.setProperty('--postbg', postbg);
	        document.documentElement.style.setProperty('--postcolor', postcolor);
	        document.documentElement.style.setProperty('--postcolor2', postcolor2);
	        document.documentElement.style.setProperty('--postcolor3', postcolor3);
	        $('<style>.note_banner:after{background:linear-gradient(to top,' + postbgafter + ' 0, rgba(255, 255, 255, 0) 100%)}</style>').appendTo('head');
	        console.log(postbgafter + 'after');
	
	    }
	
	console.log('主色已更改');
	
	    //   十六进制颜色转换RGB
	    var colorHex = function (color) {
	        var that = color;
	        //十六进制颜色值的正则表达式
	        var reg = /^#([0-9a-fA-f]{3}|[0-9a-fA-f]{6})$/;
	        // 如果是rgb颜色表示
	        if (/^(rgb|RGB)/.test(that)) {
	            var aColor = that.replace(/(?:\(|\)|rgb|RGB)*/g, "").split(",");
	            var strHex = "#";
	            for (var i = 0; i < aColor.length; i++) {
	                var hex = Number(aColor[i]).toString(16);
	                if (hex.length < 2) {
	                    hex = '0' + hex;
	                }
	                strHex += hex;
	            }
	            if (strHex.length !== 7) {
	                strHex = that;
	            }
	            return strHex;
	        } else if (reg.test(that)) {
	            var aNum = that.replace(/#/, "").split("");
	            if (aNum.length === 6) {
	                return that;
	            } else if (aNum.length === 3) {
	                var numHex = "#";
	                for (var i = 0; i < aNum.length; i += 1) {
	                    numHex += (aNum[i] + aNum[i]);
	                }
	                return numHex;
	            }
	        }
	        return that;
	    };
	    
	   // 删除文章
	function p_del() {
    var msg = "您真的确定要删除吗？";
    if (confirm(msg)==true){
        return true;
    }else{
        return false;
    }
};

</script>

<article class="note_container" itemscope itemtype="http://schema.org/BlogPosting">
    <h4 class="g_note_title fadeIn">
        <?php $this->title() ?>
    </h4>
    <div class="g_note_info">
        <span class="g_note_author" itemprop="author" itemscope itemtype="http://schema.org/Person">
			<?php _e('作者: '); ?>
			<a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author">
				<?php $this->author(); ?>
			</a>
		</span>

        <span class="g_note_misc">
			<span>
				<?php $this->category(','); ?><?php echo art_count($this->cid); ?>
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

    </div>

    <div class="weak"></div>
    <div class="g_note" itemprop="articleBody" id="lightgallery">
        <?php $this->content('- 阅读剩余部分 -'); ?>
    </div>

</article>



<div class="note_container" style="padding:0 1.2rem">
    <p itemprop="keywords" class="tags">
        <?php _e('标签: '); ?>
        <?php $this->tags(', ', true, 'none'); ?>
    </p>
		<!--编辑-->
    <span class="edit" >
        
        <?php if($this->user->hasLogin()):?>
            <a  style="width: 80px;
    height: 32px;
    float: right;
    border: 1px solid #ddd;
    border-radius: 10px;
    color: #969696;
    font-size: 13px;
    text-align: center;
    line-height: 30px;" href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" target="_blank">编辑</a>
    
    <?php Typecho_Widget::widget('Widget_Security')->to($security); ?>
<a style="width: 80px;
    height: 32px;
    float: right;
    border: 1px solid #ddd;
    border-radius: 10px;
    color: #969696;
    font-size: 13px;
    text-align: center;
    line-height: 30px;" href="<?php $security->index('/action/contents-post-edit?do=delete&cid='.$this->cid); ?>" onclick="javascript:return p_del()">删除文章</a>



        <?php endif;?>
    </span>
    <!--面包屑-->
    <div class="crumbs_patch">
        <a href="<?php $this->options->siteUrl(); ?>">首页</a> &raquo;</li>
        <?php if ($this->is('index')): ?>
        <?php elseif ($this->is('post')): ?>
        <!-- 页面为文章单页时 -->
        <?php $this->category(); ?> &raquo;
        <?php $this->title() ?>
        <?php else: ?>
        <!-- 页面为其他页时 -->
        <?php $this->archiveTitle(' &raquo; ','',''); ?>
        <?php endif; ?>
    </div>

    <ul class="post-near ">

        <li>上一篇:
            <?php $this->thePrev('%s', '没有了'); ?>
        </li>
        <li>下一篇:
            <?php $this->theNext('%s', '没有了'); ?>
        </li>
    </ul>

    <?php $this->need('comments.php'); ?>
</div>

<!--end #main-->


<?php $this->need('footer.php'); ?>

