<?php

use Cake\Routing\Router; ?>
<?php echo $this->element('front_header'); ?>
<div class="container mainPgWrap">
    <div class="row">
        <h1 class="pghead text-center text-uppercase"><span class="underline">Products</span></h1>
        <div class="listing_wrap">
            <ul class="pro_Listing product_list">
                <?php foreach ($product as $key => $product) { ?>
                <li>
                    <a href="<?php echo Router::url('/', true); ?>product-details/<?php echo $product['id']; ?>">
                        <div class="pro_wrp" style="background-image:url(<?php Router::url('/', true) ?>img/product/main/<?php echo $product['image']; ?>);">
                            <div class="text_cont"><span class="pro_head link_white"><?php echo $product['name']; ?></span></div>
                            <div class="col_link"><a href="<?php echo Router::url('/', true); ?>product-details/<?php echo $product['id']; ?>" class="btn thm_brd_btn ripplelink">Know More</a></div>
                        </div>
                    </a>
                </li>  
                <?php } ?>                             
            </ul>
            <!--<div class="arw_dwn"><a href="javascript:void(0);"><img src="img/images/dwn-arrow.png" alt="Down" /></a></div>-->
        </div>
    </div>
</div>
<?php echo $this->element('front_footer'); ?>