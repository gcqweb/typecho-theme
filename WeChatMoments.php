<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!--朋友圈-->    
<?php while ($this->next()): ?>
<div class="g-zone">


            <div class="zoneBody">
                <!-- 头像 -->
                <div class="zoneHeadPic">
                    <a href="#"  target="_blank">
                        <!--用户头像，或QQ头像--> 
                        <!--?php $comments->gravatar('40', ''); ?-->
                        <img src="https://q1.qlogo.cn/g?b=qq&nk=1339718850&src_uin=www.gcqweb.cn&s=0"  alt="#"  style="width: 40px; min-width: 40px; height: 40px; border-radius: 20%;"/>
                    </a>
                </div>

                <div class="zoneDetail">
                    <div class="zone">
                        <span class="zoneUserName">
                                <!--{fun adminInfo($v['userid'],'name')}-->
                                <!--{else}-->
                            <a class="post-uname" href="<?php $this->author->permalink(); ?>" target="_blank">
                                    <?php $this->author(); ?>
                            </a>
                        </span>

                        <div class="zonePost">
                            <div>
                                <?php $this->excerpt(50, '...'); ?>
                                        <script>
// let img = '<img class="biaoqing" src="assets/owo/paopao/E591B5E591B5_2x.png">';
// img.replace(/<img [^>]*src=['"]([^'"]+)[^>]*>/gi, function (match, capture,offset,input_str) {
//                             return input_str.replace(capture,'$imgUrl')
//                         });




        </script>
                            </div>

                            <ul class="zoneImg">
                               <?php if (imgNum($this->content)-1) : ?><img src="<?php showThumbnail($this,imgNum($this->content)-1);?>"><?php endif; ?>
                                <?php if (imgNum($this->content)-2) : ?><img src="<?php showThumbnail($this,imgNum($this->content)-2);?>"><?php endif; ?>
                                <?php if (imgNum($this->content)-3) : ?><img src="<?php showThumbnail($this,imgNum($this->content)-3);?>"><?php endif; ?>
                                <?php if (imgNum($this->content)-4) : ?><img src="<?php showThumbnail($this,imgNum($this->content)-4);?>"><?php endif; ?>
                                <?php if (imgNum($this->content)-5) : ?><img src="<?php showThumbnail($this,imgNum($this->content)-5);?>"><?php endif; ?>
                                <?php if (imgNum($this->content)-6) : ?><img src="<?php showThumbnail($this,imgNum($this->content)-6);?>"><?php endif; ?>
                                <?php if (imgNum($this->content)-7) : ?><img src="<?php showThumbnail($this,imgNum($this->content)-7);?>"><?php endif; ?>
                                <?php if (imgNum($this->content)-8) : ?><img src="<?php showThumbnail($this,imgNum($this->content)-8);?>"><?php endif; ?>
                                <?php if (imgNum($this->content)-9) : ?><img src="<?php showThumbnail($this,imgNum($this->content)-9);?>"><?php endif; ?>
                                

                            </ul>
                            
                        </div>
                        <div class="zoneExtra">
                            <p class="zoneAddTime">      
                                <time datetime="<?php $this->dateWord('c'); ?>" class="post-time">
                                    <span class="post-time"><?php $this->dateWord('c'); ?></span></time>
                            </p>
                            <!--<span class="iconfont icon-pinglun"></span>-->
                            <div class="post-fun g-right" style="position: relative;  width: 30px; height: 20px; margin: 0 0 0 20px;">
                                <div class="fun-ico g-txt-hide" style="width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 4px;
    background:#ececec ;
    cursor: pointer;"><span style="position: absolute;
    top: -35px;
    font-size: 3rem;
    white-space: nowrap;">··</span></div> 
                                <!--<div class="fun-box">-->
                                <!--    <div class="fun-btn like allow liked">取消</div>-->
                                <!--    <div  class="fun-btn comment allow">评论</div>-->
                                <!--</div>-->
                            </div>
                            <!--<img  src="/static/upload/20221110/pl.png" alt="" style="height:1rem;opacity: 0.2;" />-->
                        </div>

                    </div>


                    <!--<div class="r"></div>-->
                    <div class="zanAndTalk">
                        <!-- 点赞 -->
                        <div class="zoneDetailLike">
                            <span style="margin-right:.5rem" class="iconfont icon-dianzanaixin"></span> 
                             233<span>点赞，点赞，点赞ip</span>
                        </div>

                        <!-- 评论 -->
                        <div class="talkList">

                            <p>
                                <span class="talk-user">评论好友</span>
                                <span> ：</span>

                            </p>
                            
                        </div>
                    </div>
                </div>
            </div>
                 
        </div>
        <?php endwhile; ?> 
        <!--js替换图片地址-->
