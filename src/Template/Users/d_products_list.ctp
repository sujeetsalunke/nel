<?php

use Cake\Routing\Router; ?>
<?php echo $this->element('front_header_desktop'); ?>
<!-- Header -->
<div class="page innerPg_pd black_bg pg_hgt">
    <div class="container container-full">
        <div class="head_Sz innerPgHead pg_Heading">
            <span class="brd brd_ylw">Products</span>
        </div>
        <div class="produt_Lst_wrap">
            <div class="row listing_2Col">
                <?php if (!empty($product)) { ?>
                    <?php foreach ($product as $key => $product) { ?>
                <div class="col-sm-6">
                    <div class="prod_list_Sec">
                        <div class="img_wrp">
                            <a href="<?php echo Router::url('/', true); ?>d-product-details/<?php echo $product['id']; ?>"> <?php echo $this->Html->image('product/main/' . $product['image'], array('alt' => 'Product')); ?> </a>                                   
                        </div>
                        <div class="text_tbl">
                            <div class="text_cont">
                                <div class="prd_Name hd_wth_brd"><a style="color: #fff !important;text-decoration: none !important;" href="<?php echo Router::url('/', true); ?>d-product-details/<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></div>
                            </div>
                            <div class="btn_link">
                                <a href="<?php echo Router::url('/', true); ?>d-product-details/<?php echo $product['id']; ?>" class="btn thm_brd_btn ripplelink">Know More</a>
                            </div>
                        </div>
                    </div>
                </div>   
                    <?php } ?>       
                <?php } else { ?>
                <div class="col-sm-6">
                    <div class="prod_list_Sec">                           
                        <div class="text_tbl">
                            <div class="text_cont">
                                <div class="prd_Name hd_wth_brd">Product Not Available</div>
                            </div>                          
                        </div>
                    </div>
                </div>  
                <?php } ?>
            </div>
            <a class="acroll_down" href="javascript:void(0)"><img src="<?php Router::url('/', true) ?>img/images/desktop/scroll-arrow.png" alt="scroll" /></a>
        </div>
    </div>
</div>
<!-- /page -->
<!-- Footer -->
<?php echo $this->element('front_footer_desktop'); ?>

