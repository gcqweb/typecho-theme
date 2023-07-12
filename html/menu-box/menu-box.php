<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
<!--<link rel="stylesheet" href="//at.alicdn.com/t/c/font_4117996_oflrgbtyroh.css?spm=a313x.7781069.1998910419.53&file=font_4117996_oflrgbtyroh.css"/>-->

<div class="menu-box">
    <!-- 图标按钮 -->
    <button class="menu-button">
        <div class="line-box">
            <div class="menu-line"></div>
            <div class="menu-line"></div>
            <div class="menu-line"></div>
        </div>
    </button>
    <!-- 菜单列表 -->
    <ul class="menu-list">
        <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <!--文章分类-->
        <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
        <?php while($category->next()): ?>
        <?php if ($categorys->levels === 0) : ?>
        <?php $children = $categorys->getAllChildren($categorys->mid); ?>
        <li>
            <a href="<?php $category->permalink(); ?>" style="word-break:break-all;">
            <!--<i class=""></i>-->
            <svg class="icon" aria-hidden="true">
                <use xlink:href=""></use>
            </svg>
            <span>
                    <?php $category->name(); ?>
            </span>
            </a>
        </li>
        <?php endif; ?>
        <?php endwhile; ?>
        <!--页面-->
        <li>
            <a href="<?php $this->options->themeUrl('html/drew/index.html');?>" target="_blank">
                <!--<i class=""></i>-->
                <svg class="icon" aria-hidden="true">
                    <use xlink:href=""></use>
                </svg>
                <span>画板（压感）</span>
            </a>
        </li>
        <?php while($pages->next()): ?>
        <li>
            <a<?php if($this->is('page', $pages->slug)): ?>
                <?php endif; ?> href="<?php $pages->permalink(); ?>" >
            <!--<i class=""></i>-->
            <svg class="icon" aria-hidden="true">
                <use xlink:href=""></use>
            </svg>
            <span>
                    <?php $pages->title(); ?>
            </span>
            </a>
        </li>
        <?php endwhile; ?>
        <li>
            <!--<i class=""></i>-->
            <svg class="icon" aria-hidden="true">
                <use xlink:href=""></use>
            </svg>
            <span>
                <?php if ($this->user->hasLogin()): ?>
                <a class="hovera" href="<?php $this->options->adminUrl(); ?>">
                    <?php $this->user->screenName(); ?>
                </a>
                <a class="ahover" href="<?php $this->options->logoutUrl(); ?>">注销</a>
                <?php else: ?>
                <a href="<?php $this->options->adminUrl('login.php'); ?>">登录/注册</a>
                <?php endif; ?>
            </span>
        </li>

    </ul>
</div>
<script src="//at.alicdn.com/t/c/font_4117996_6awina8pfco.js"></script>
<script>
    // // 获取所有li元素  菜单添加图标
    // const classNames = [
    //     'icon-exe-article-primary',
    //     'icon-boke',
    //     'icon-yingyong1',
    //     'icon-youxiang1',
    //     'icon-shiciguanli',
    //     'icon-minganci',
    //     'icon-huihua',
    //     'icon-huiyuan',
    //     'icon-pinglun',
    //     'icon-guanyu-banben',
    //     'icon-huiyuanguanli'
    //     ];
    // const items = document.querySelector('.menu-list').querySelectorAll('li');
    // items.forEach((item, index) => {
    //     const className = classNames[index];
    //     if (className) {
    //         item.querySelector('i').classList.add(className, 'iconfont');
    //     }
    // });

// 添加彩色svg图标
    const hrefs = [
        'icon-exe-article-primary',
        'icon-boke',
        'icon-yingyong1',
        'icon-at',
        'icon-shiciguanli',
        'icon-minganci',
        'icon-huihua',
        'icon-huiyuan',
        'icon-pinglun',
        'icon-guanyu-banben',
        'icon-user'
    ];
    const items = document.querySelector('.menu-list').querySelectorAll('li');
    items.forEach((item, index) => {
        const href = hrefs[index];
        if (href) { item.querySelector('use').setAttribute('xlink:href', `#${href}`); }
    });


    const menuBtn = document.querySelector('.menu-button');
    const menuBox = document.querySelector('.menu-box');
    //为菜单按钮绑定点击事件，添加激活样式
    menuBtn.addEventListener('click', () => {
        menuBox.classList.toggle('active');
    });
    // 点击body关闭菜单
    document.addEventListener('click', (event) => {
        if (event.target !== menuBtn && !menuBox.contains(event.target)) {
            menuBox.classList.remove('active');
        }
    });

</script>