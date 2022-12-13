<?php

use Cake\Routing\Router; ?>
<?php echo $this->element('front_header_desktop'); ?>
<!-- Header -->
<div class="page innerPg_pd black_bg pg_hgt about_pgWrap">
    <div class="container container-full">
        <div class="head_Sz innerPgHead pg_Heading"><span class="brd brd_ylw">ABOUT US</span></div>
        <h3><?php echo $about_us['title']; ?> of History</h3>
        <div class="abt_text textLn_hgt"><p><?php echo $about_us['description_1']; ?></p>
            <p><?php echo $about_us['description_2']; ?></p>
        </div>
        <div class="desk_brands_Outer">
            <div class="head_Sz innerPgHead text-center"><span class="brd brd_ylw">Our Brands</span></div>
            <ul class="list-unstyled brands_list_sec">
                <?php if (!empty($Brands)) { ?>
                    <?php foreach ($Brands as $key => $value_brand) { ?>      
                        <li><div class="brd_sec"><?php echo $this->Html->image('brand/' . $value_brand['image_desktop'], array('alt' => 'Brand')); ?></div></li>
                        <?php } ?>    
                    <?php } ?>                   
            </ul>
        </div>
    </div>
</div>
<!-- /page -->
<!-- Footer -->
<?php echo $this->element('front_footer_desktop'); ?>

