<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
?>



    <!--/* 自定义评论列表部分 */-->
    <div id="<?php $comments->theId(); ?>">
        <li class="comment-module comment-module2">
            <div class="comment-tab">
                <div class="comment-user">
                    <a href="#" class="comment-userpic"
                        style="width: 32px; min-width: 32px; height: 32px; border-radius: 50%;">
                        <?php $comments->gravatar('32', ''); ?>
                    </a>
                </div>
                <div class="comment-main">
                    <div class="comment-info">
                        <div class="comment-head">
                            <div class="comment-user-name">
                                <?php $comments->author(); ?>
                            </div>
                            <div class="comment-time">
                                <?php $comments->dateWord('Y-m-d H:i'); ?>
                            </div>
                        </div>
                        <div class="comment-region">
                            <div class="comment-body">
                                <?php $comments->content(); ?>
                            </div>
                            <div>
                                <?php $comments->reply(); ?>
                            </div>
                            <!--</a>-->
                        </div>
                    </div>
                </div>
            </div>
</li>
</div>        

  <!--/*子评论*/-->
<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>

<?php } ?>

<?php } ?>

 

    <?php $this->comments()->to($comments); ?>
    <!-- 评论头部提示信息 -->
    <div class="hr"></div>
    <span>
        <?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('评论（%d）')); ?>
    </span>


    <!-- 评论的内容 -->

    <?php if ($this->allow('comment')) : ?>
    
    <!-- 评论表单form放的地方-->
    <div id="<?php $this->respondId(); ?>"></div>

        <div>
            <!-- 取消回复 -->
            <?php $comments->cancelReply(); ?>
        </div>

        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">

            <div class="talk-input">
                <textarea
                    placeholder="<?php if($this->user->hasLogin()): ?><?php _e('你好: '); ?><?php $this->user->screenName(); ?><?php else: ?><?php endif; ?>"id="textarea" class="textarea"
                    required><?php $this->remember('text'); ?></textarea>
            </div>

            <div>
                <?php if(!$this->user->hasLogin()): ?>
                <div class="talk-userinfo">
                    <div>
                       
                        <input placeholder="*昵称" type="text" name="author" id="author" class="text"
                            value="<?php $this->remember('author'); ?>" required />
                    </div>
                    <div>
                        <label for="mail" <?php if ($this->options->commentsRequireMail): ?> class="krequired"
                            <?php endif; ?>>
                            <?php _e(''); ?>
                        </label>
                        <input placeholder="*邮箱" type="email" name="mail" id="mail" class="text"
                            value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?>
                        <?php endif; ?> />
                    </div>
                </div>
                <?php else: ?>
哈哈哈哈
            </div>
            <?php endif; ?>
            <button class="button" type="submit" class="submit"><?php _e('发表'); ?></button>
        </form>
    
    <?php else : ?>

    <h3>
        <?php _e('评论已关闭'); ?>
    </h3>
    <?php endif; ?>

    <!-- 回复列表 -->

    <?php if ($comments->have()) : ?>

    <?php $comments->listComments(); ?>
    <!-- 评论page -->
    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

    <?php endif; ?>




<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
?>

<!-- 自定义列表 -->
<li class="comment-module comment-module2">
    <div id="<?php $comments->theId(); ?>">
        <div class="comment-tab">
            <div class="comment-user">
                <a href="#" class="comment-userpic"
                    style="width: 32px; min-width: 32px; height: 32px; border-radius: 50%;">
                    <?php $comments->gravatar('32', ''); ?>
                </a>
            </div>
            <div class="comment-main">
                <div class="comment-info">
                    <div class="comment-head">
                        <div class="comment-user-name">
                            <?php $comments->author(); ?>
                        </div>
                        <div class="comment-time">
                            <?php $comments->dateWord('Y-m-d H:i'); ?>
                        </div>
                    </div>
                    <div class="comment-region">
                        <div class="comment-body">
                            <?php $comments->content(); ?>
                        </div>
                        <div>
                            <?php $comments->reply(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>





<?php if ($comments->children) { ?>
    <div class="comment-child">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
<!--</li>-->
<?php } ?>



<!-- 评论头部提示信息 -->
<div class="hr"></div>
<span>
    <?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('评论（%d）')); ?>
</span>

<?php $this->comments()->to($comments); ?>
<!--判断是否允许评论-->
<?php if ($this->allow('comment')) : ?>
<!-- 评论表单form放的地方-->
<div id="<?php $this->respondId(); ?>" class="cancelReply">
        
        <?php $comments->cancelReply(); ?>
 
</div>

<!-- 评论表单 -->
<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
    <div class="talk-input">
        <label for="textarea" class="required"></label><!--内容-->
        <textarea placeholder="<?php if($this->user->hasLogin()): ?><?php _e('你好: '); ?><?php $this->user->screenName(); ?><?php else: ?><?php endif; ?>" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
    </div>
    
        <?php if(!$this->user->hasLogin()): ?>
        <div class="talk-userinfo">
            <div>
                <label for="author" class="required"></label><!--昵称-->
                <input placeholder="*昵称" type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" required />
            </div>
            <div>
                <label for="mail" <?php if ($this->options->commentsRequireMail): ?> class="krequired" <?php endif; ?>><?php _e(''); ?></label>
                <input placeholder="*邮箱" type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?>
                <?php endif; ?> />
            </div>
        </div>
        <?php else: ?>
        <?php endif; ?>
    <button type="submit" class="submit button">
        <?php _e('发表'); ?>
    </button>
    <!-- 取消回复 -->

</form>


<?php else : ?>
<h3><?php _e('评论已关闭'); ?></h3>
<?php endif; ?>



<?php if ($comments->have()) : ?>
<?php $comments->listComments(); ?>
<!-- 评论page -->
<?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
<?php endif; ?>