<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的留言添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是留言作者的添加 .comment-by-user 样式
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //留言层数大于0为子级，否则是父级
?>

<!--/* 自定义留言列表部分 */-->
<li class="talk-sticky-notes">
    <div id="<?php $comments->theId(); ?>" style="display: flex;flex-direction: column;justify-content: space-between;">

        <div class="talk-body" style="background: -webkit-gradient(linear,left top,left bottom, from(#666), color-stop(3%, rgba(255, 255, 255, 0)) );
    background-size: 100% 27px;">
            <?php $comments->content(); ?>
        </div>
        <div class="talk-info flex" style=" flex-direction:column;align-items: flex-end;margin-top:1rem;">
            <div>
                <?php $comments->author(); ?>
                <?php $comments->reply(); ?>
            </div>
            <div class="talk-time">
                <?php $comments->dateWord('Y-m-d H:i'); ?>

            </div>
        </div>
    </div>

</li>
<!--/*子留言*/-->
<?php if ($comments->children) { ?>
<div class="talk-child">
    <?php $comments->threadedComments($options); ?>
</div>
<?php } ?>

<?php } ?>

<!--<div class="talkTitle">-->
<!--	<?php $this->commentsNum(_t('留言板'), _t('有一条留言'), _t('留言（%d）')); ?>-->
<!--</div>-->
<!-- 留言头部提示信息 -->
<!--<div class="hr"></div>-->
<?php $this->comments()->to($comments); ?>
<?php if ($this->allow('comment')) : ?>
<!-- 留言表单form放的地方-->
<div id="<?php $this->respondId(); ?>" class="talkid">
    <!-- 留言表单 -->
    <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
        <div class="talkAdd">
            <textarea
                placeholder="<?php if($this->user->hasLogin()): ?><?php _e('你好: '); ?><?php $this->user->screenName(); ?><?php else: ?><?php endif; ?>"
                name="text" id="textarea" class="textarea" required><?php $this->remember('text'); ?></textarea>
        </div>

        <?php if(!$this->user->hasLogin()): ?>
        <div class="talk-userinfo">
            <div class="" style="width:35%;margin-right:1rem">
                <!--昵称-->
                <label for="author" class="required"></label>
                <input placeholder="*昵称" type="text" name="author" id="author" class="text"
                    value="<?php $this->remember('author'); ?>" required />
            </div>
            <div class="" style="flex: 1;">
                <label for="mail" <?php _e(''); ?></label>
                <input placeholder="*邮箱" type="email" name="mail" id="mail" class="text"
                    value="<?php $this->remember('mail'); ?>" <?php if($this->options->commentsRequireMail): ?>
                <?php endif; ?>
                required />
            </div>
        </div>
        <?php else: ?>
        <?php endif; ?>
        <button type="submit" class="submit button">
            <?php _e('立刻说'); ?>
        </button>
        <span>
            <!-- 取消回复 -->
            <?php $comments->cancelReply(); ?>
        </span>
    </form>
</div>
<?php else : ?>
<h3>
    <?php _e('留言板已关闭'); ?>
</h3>
<?php endif; ?>

<!-- 回复列表 -->

<?php if ($comments->have()) : ?>
<!-- 留言的内容 -->
<?php $comments->listComments(); ?>
<!-- 留言page -->
<?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div>
</div>
<?php endif; ?>

<script>
    // const elements = document.querySelectorAll('.talk-sticky-notes');
    // elements.forEach(element => {
    //       let r, g, b;
    //       do {
    //         r = Math.floor(Math.random() * 256);
    //         g = Math.floor(Math.random() * 256);
    //         b = Math.floor(Math.random() * 256);
    //       } while (r < 100 && g < 100 && b < 100); // 只保留亮色
    //       element.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;
    // });
    
function getRandomLightColor() {
  let hue = Math.floor(Math.random() * 360); // 随机色相
  let saturation = Math.floor(Math.random() * 30) + 70; // 饱和度在50%到100%之间
  let lightness = Math.floor(Math.random() * 15) + 85; // 亮度在60%到100%之间
  return `hsl(${hue}, ${saturation}%, ${lightness}%)`;
}

const sticky_notes_rgb = document.querySelectorAll('.talk-sticky-notes'); // 获取所有 class 为.talk-sticky-notes 的元素
sticky_notes_rgb.forEach(notes_rgb => {
    const color = getRandomLightColor(); // 随机生成颜色
    notes_rgb.style.backgroundColor = color; // 设置背景色
    notes_rgb.style.border = `1px ${color} solid`; // 设置边框样式
    
    const noteColor = notes_rgb.style.backgroundColor;
    const noteColorRGB = noteColor.match(/\d+/g);
    const noteColorBrightness = (noteColorRGB[0] * 299 + noteColorRGB[1] * 587 + noteColorRGB[2] * 114) / 1000;
    notes_rgb.style.color = noteColorBrightness > 128 ? 'black' : 'white'; // 用三目运算符代替 if-else 语句
    
});
</script>