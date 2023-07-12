<?php function threadedComments($comments, $options)
{
	$commentClass = '';
	if ($comments->authorId) {
		if ($comments->authorId == $comments->ownerId) {
			$commentClass .= ' comment-by-author'; //如果是文章作者的评论添加 .comment-by-author 样式
		} else {
			$commentClass .= ' comment-by-user'; //如果是评论作者的添加 .comment-by-user 样式
		}
	}
	$commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent'; //评论层数大于0为子级，否则是父级
	?>

	<!--/* 自定义评论列表部分 */-->
	<li class="comment-module comment-module2">
		<div id="<?php $comments->theId(); ?>">
			<div class="comment-tab">
				<div class="comment-user">
					<a href="#" class="comment-userpic"
						style="width: 32px; min-width: 32px; height: 32px; border-radius: 50%;">

						<!--?php $comments->gravatar(); ?-->
						<span itemprop="image">
							<?php $number = $comments->mail;
							if (preg_match('|^[1-9]\d{4,11}@qq\.com$|i', $number)) {
								echo '<img src="https://q2.qlogo.cn/headimg_dl? bs=' . $number . '&dst_uin=' . $number . '&dst_uin=' . $number . '&;dst_uin=' . $number . '&spec=100&url_enc=0&referer=bu_interface&term_type=PC" width="32px" height="32px" style="border-radius: 50%;float: left;margin-top: 0px;margin-right: 10px;margin-bottom:-2px">';
							} else {
								echo '<img src="https://bing.ioliu.cn/v1/rand" width="46px" height="46px" style="border-radius: 50%;float: left;margin-top: 0px;margin-right: 10px;margin-bottom:-2px">';
							}
							?>
						</span>
					</a>
				</div>
				<div class="comment-main">
					<div class="comment-info">
						<div class="comment-head">
							<div class="comment-user-name">
								<?php $comments->author();
								echo get_comment_at($comments->coid) ?>
							</div>
							<div class="comment-time">
								<?php $comments->dateWord('Y-m-d H:i'); ?>
							</div>
						</div>
						<div class="comment-region">
							<div class="comment-body">
								<div class="child-com" style="display:none">
									<?php $comments->author(); ?>：
									<?php $comments->content(); ?>
								</div>
								<div class="comment-content">
									<?php $comments->content(); ?>
								</div>
							</div>
							<div class="comment-reply">
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
<comm class="comm">
	<div style="margin-top:5rem">
		<?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('评论（%d）')); ?>
	</div>
	<!-- 评论头部提示信息 -->
	<div class="hr"></div>
	<?php $this->comments()->to($comments); ?>
	<?php if ($this->allow('comment')): ?>
		<!-- 评论表单form放的地方-->
		<div id="<?php $this->respondId(); ?>">
			<!-- 评论表单 -->
			<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
				<div class="talk-input">

					<textarea
						placeholder="<?php if ($this->user->hasLogin()):
							_e('你好: ');
							$this->user->screenName(); else: ?>说点什么呢..<?php endif; ?>"
						name="text" id="comment" class="textarea" required><?php $this->remember('text'); ?></textarea>
				</div>

				<?php if (!$this->user->hasLogin()): ?>
					<div class="talk-userinfo">
						<!--<cominfo>-->
						<div class="" style="width:35%;margin-right:1rem">
							<!--昵称-->
							<label for="author" class="required"></label>
							<input placeholder="*昵称" type="text" name="author" id="author" class="text"
								value="<?php $this->remember('author'); ?>" required />
						</div>
						<div class="" style="flex: 1;">
							<label for="mail"></label>
							<input placeholder="*邮箱" type="email" name="mail" id="mail" class="text"
								value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?><?php endif; ?> required />
						</div>
						<!--</cominfo>-->
					</div>
				<?php endif; ?>
				<button type="submit" id="submit" class="submit button"> 发表 </button>

				<button type="button" class="button" id="get-poem-btn">随机诗句</button>
				<span>
					<!-- 取消回复 -->
					<?php $comments->cancelReply(); ?>
				</span>
			</form>
		</div>
	<?php else: ?>
		<h3>评论已关闭</h3>
	<?php endif; ?>

	<!-- 回复列表 -->

	<?php if ($comments->have()): ?>
		<!-- 评论的内容 -->
		<?php $comments->listComments(); ?>
		<!-- 评论page -->
		<?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
		</div>
		</div>
	<?php endif; ?>
</comm>
<script>
	const inputBox = document.getElementById("comment");
	const getPoemBtn = document.getElementById("get-poem-btn");
	// 绑定按钮点击事件
	getPoemBtn.addEventListener("click", () => {
		// 调用 jinrishici.load() 函数获取诗句
		jinrishici.load(result => {
			// 将诗句赋值到输入框中
			inputBox.value += `${result.data.content}${inputBox.value.length > 0 ? "\n" : ""}`;
		});
	});

</script>