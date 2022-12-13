<?php

use Cake\Routing\Router; ?>
<?php echo $this->element('front_header'); ?>
<!-- Header -->
<div class="container mainPgWrap abt_pg">
    <h1 class="pghead text-center text-uppercase"><span class="underline">About us</span></h1>
    <h2 class="mdl_Head mrgBT30">
        <?php echo $about_us['title']; ?><br>
        <span class="underline">of History</span>
    </h2>
    <div class="row abt_Content imgRight">
        <div class="col-xs-7"><div class="abt_Text">
                <div><?php echo $about_us['description_1']; ?></div></div>
        </div>
        <div class="col-xs-5"><div class="abt_Img" data-aos="fade-left" data-aos-duration="800" data-aos-once="true"><?php echo $this->Html->image('about_us/' . $about_us['image_1'],array('alt'=>'About Us')); ?></div></div>
    </div>
    <div class="row abt_Content imgLeft">
        <div class="col-xs-5"><div class="abt_Img" data-aos="fade-right" data-aos-duration="900" data-aos-once="true"><?php echo $this->Html->image('about_us/' . $about_us['image_2'],array('alt'=>'About Us')); ?></div></div>
        <div class="col-xs-7"><div class="abt_Text text-right">
                <div><?php echo $about_us['description_2']; ?></div></div>
        </div>
    </div>
</div>
<!-- Footer -->
<?php echo $this->element('front_footer'); ?>
