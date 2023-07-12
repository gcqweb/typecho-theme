<?php if ($this->is('category', 'lrc')): ?>


<?php $this->need('header.php');?>


<section class="note_core">
    <!--<div class="banner_inner"></div>-->
    <!--<div class="banner_dec1"></div>-->
    <!--<div class="banner_dec2"></div>-->
    <!--<div class="banner_dec3"></div>-->
    <!--<div class="banner_dec4"></div>-->
    <div class="list">
        <div class="list-top">
          <div class="list-title">
              <?php $this->archiveTitle(['category' => _t('%s')], '', ''); ?>
          </div>
        </div>
        
        <div class="Tree">
            <?php while ($this->next()): ?>
              <a class="Tree-content" href="<?php $this->permalink() ?>" target="<?php $this->permalink() ?>">
                <i></i>
                <div class="Tree-note">
                  <span class="Tree-title"><?php $this->title() ?></span>
                  <span class="Tree-line"></span>
                  <span class="list-info">
                    <span class="list-date">
                        <?php $this->dateWord('c'); ?>
                    </span>
                  </span>
                </div>
              </a>
            <?php endwhile; ?>   
        </div>

    <?php $this->pageNav('上一页', '下一页', '2', '……'); ?>
    </div>

</section>  
  
         
  <?php $this->need('footer.php'); ?> 
  
<?php endif; ?>