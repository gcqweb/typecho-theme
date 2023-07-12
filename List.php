<?php
/**
 * List
 *
 * @package custom
 */

 if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
 ?>
<style>
    .content{
        text-align: center; 
        margin:5rem auto;
        user-select: none;
    }
    .content p:hover {
    background: #fff;
    border-radius: 4px;
    }
    .content p{
        font-size: 20px;
        
    }
    .content p a{
        color: blue;
    }
    .content p:last-child{
   margin-top: 2rem;
    }
    .content p:first-child{
   font-size: 36px;
    }
    
</style>

<section class="container content">
    <?php $this->content('- 阅读剩余部分 -'); ?>
</section>

 <?php $this->need('footer.php');?>
  