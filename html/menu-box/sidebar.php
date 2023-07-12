
    <div id="sidebar">
        <!-- 侧边栏内容 -->
        <div class="flex">
            <!--<img class="cool" src="#" alt="">-->
            <div class=" flex">
                <a href="#">走码观花</a>
                <span>越努力越幸运</span>
            </div>
        </div>
        <menu class="">
            <ul>
                <!--分类菜单-->
                <li class="">
                    <ul>
                        <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
                        <?php while ($categorys->next()) : ?>
                        <?php if ($categorys->levels === 0) : ?>
                        <?php $children = $categorys->getAllChildren($categorys->mid); ?>
                        <li><a href="<?php $categorys->permalink(); ?>" style="word-break:break-all;">
                                <?php $categorys->name(); ?>
                            </a></li>
                        <?php endif; ?>
                        <?php endwhile; ?>
                    </ul>
                </li>
                <li class="">
                    <ul>
                        <?php while ($pages->next()): ?>
                        <li>
                            <a<?php if ($this->is('page', $pages->slug)): ?> class="current"
                                <?php endif; ?>
                                href="
                                <?php $pages->permalink(); ?>">
                                <?php $pages->title(); ?></a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </li>
            </ul>
        </menu>
        <!--</div>-->
        <?php if ($this->user->hasLogin()): ?>
        <a class="hovera" href="<?php $this->options->adminUrl(); ?>">
            <?php $this->user->screenName(); ?>
        </a>
        <a class="ahover" href="<?php $this->options->logoutUrl(); ?>">注销</a>
        <?php else: ?>
        <a href="<?php $this->options->adminUrl('login.php'); ?>">登录/注册</a>
        <?php endif; ?>

    </div>