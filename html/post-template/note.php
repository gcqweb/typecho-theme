<?php $this->need('header.php'); ?>

<section class="container" style="margin-top:2rem">
    <div class="share_Software">
        <div class="share_details">
            <h1>
                <?php $this->title() ?>
            </h1>
            <?php $this->content('- 阅读剩余部分 -'); ?>
        </div>
    </div>
        <?php $this->need('comments.php'); ?>
    <div class="note_pager">
        <div class="note_page_label">
            <div class="note_prev">上一篇</div>
            <h6 class="note_pager_title">
                <?php $this->thePrev('%s', '没有了'); ?>
            </h6>
        </div>
        <div class="note_page_label next">
            <div class="note_next">下一篇</div>
            <h6 class="note_pager_title">
                <?php $this->theNext('%s', '没有了'); ?>
            </h6>
        </div>
    </div>
</section>

<?php $this->need('footer.php'); ?>