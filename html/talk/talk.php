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
<li class="comment-module comment-module2">
	<div id="<?php $comments->theId(); ?>">
		<div class="comment-tab">
			<div class="comment-user">
				<a href="#"
				   class="comment-userpic"
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
<!--/*子评论*/-->
<?php if ($comments->children) { ?>
<div class="comment-child">
	<?php $comments->threadedComments($options); ?>
</div>
<?php } ?>

<?php } ?>

<div style="margin-top:5rem">
	<?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('评论（%d）')); ?>
</div>
<!-- 评论头部提示信息 -->
<div class="hr"></div>
<?php $this->comments()->to($comments); ?>
<?php if ($this->allow('comment')) : ?>
<!-- 评论表单form放的地方-->
<div id="<?php $this->respondId(); ?>">

	<!-- 评论表单 -->
	<form method="post"
		  action="<?php $this->commentUrl() ?>"
		  id="comment-form"
		  role="form">
		<div class="talk-input">

			<textarea placeholder="<?php if($this->user->hasLogin()): ?><?php _e('你好: '); ?><?php $this->user->screenName(); ?><?php else: ?><?php endif; ?>"
					  name="text"
					  id="textarea"
					  class="textarea"
					  required><?php $this->remember('text'); ?></textarea>
		</div>

		<?php if(!$this->user->hasLogin()): ?>
		<div class="talk-userinfo">
			<!--<cominfo>-->
			<div class="" style="width:35%;margin-right:1rem">
				<!--昵称-->
				<label for="author" class="required"></label>
				<input placeholder="*昵称"
					   type="text"
					   name="author"
					   id="author"
					   class="text"
					   value="<?php $this->remember('author'); ?>"
					   required />
			</div>
			<div class="" style="flex: 1;">
				<label for="mail" <?php _e(''); ?></label>
				<input placeholder="*邮箱"
					   type="email"
					   name="mail"
					   id="mail"
					   class="text"
					   value="<?php $this->remember('mail'); ?>"
					   <?php if($this->options->commentsRequireMail): ?><?php endif; ?> 
				        required />
			</div>
			<!--</cominfo>-->
		</div>
		<?php else: ?>
		<?php endif; ?>
		<button type="submit"
				class="submit button">
			<?php _e('发表'); ?>
		</button>
		<span>
			<!-- 取消回复 -->
			<?php $comments->cancelReply(); ?>
		</span>
	</form>
</div>
<?php else : ?>
<h3>
	<?php _e('评论已关闭'); ?>
</h3>
<?php endif; ?>

<!-- 回复列表 -->

<?php if ($comments->have()) : ?>
<!-- 评论的内容 -->
<?php $comments->listComments(); ?>
<!-- 评论page -->
<?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div>
</div>
<?php endif; ?>
