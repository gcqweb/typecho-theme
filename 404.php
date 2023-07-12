<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="main-wrapper">
        <div class="error-tips">
            <h3>糟糕，页面迷路了</h3>
            <div class="errorContent">
                <p>你访问的页面可能已失效或被删除 </p>
                <span class="error-search">
                    <svg width="1em" height="1em" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"
                        class="error-icon">
                        <path
                            d="M114 20c51.362 0 93 41.638 93 93 0 21.782-7.489 41.816-20.032 57.666l45.82 46.277c4.275 4.317 4.24 11.282-.077 15.556-4.317 4.275-11.281 4.24-15.556-.077l-45.774-46.23C155.576 198.602 135.652 206 114 206c-51.362 0-93-41.638-93-93s41.638-93 93-93Zm0 20c-40.317 0-73 32.683-73 73s32.683 73 73 73 73-32.683 73-73-32.683-73-73-73Z"
                            fill="currentColor" fill-rule="nonzero"></path>
                    </svg>
                    <form method="post">
                        <input name="s" autofocus class="error-input" placeholder="搜索更多信息" type="text" value="">
                        <button type="submit" class="submit err-btn">搜索</button>
                    </form>
                </span>
            </div>
        </div>
</div>
<!-- end #content-->
<?php $this->need('footer.php'); ?>