<?php if ($this->is('category', 'list')): ?>


<?php $this->need('header.php');?>



  <div class="list">
    <div class="list-top">
      <div class="list-title">知识库</div>
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
  

         
  <?php $this->need('footer.php'); ?> 
  
<?php endif; ?>