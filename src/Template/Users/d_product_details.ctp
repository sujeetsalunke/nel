<?php

use Cake\Routing\Router; ?>
<?php echo $this->element('front_header_desktop'); ?>
<!-- Header -->
<div class="page innerPg_pd detailsPg_pd pg_hgt">
    <div class="black_bg prod_detailTop">
        <div class="container container-full">
            <div class="head_Sz innerPgHead pg_Heading">
                <span class="brd brd_ylw">Product</span>
            </div>
            <div class="detail_sec_head"><?php echo $product['name']; ?></div>
            <div class="row pro_details_top">
                <div class="col-sm-6 col-md-6 col-lg-5">
                    <div class="detail_img">
                        <img src="<?php echo Router::url('/', true); ?>img/product/main/<?php echo $product['image']; ?>" alt="Product" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-7">
                    <div class="detail_text_sec">
                     <div style="margin-bottom:15px;">   <?php echo $product['description']; ?></div>
					 <a href="<?php echo Router::url('/', true); ?>d-gallery/0/<?php echo $product['material_id']; ?>" class="btn thm_brd_btn ripplelink">View Gallery</a>
                    </div>                        
                </div>
            </div>
        </div>
    </div>
    <div class="proj_offrOuter_desk">
        <div class="container container-full">
            <div class="head_Sz mdl_Sz innerPgHead pg_Heading">
                <span class="brd">Our Offerings</span>
            </div>
            <ul class="list-unstyled offer_Listing offer_deskWrp">
                <?php if (!empty($product_details) && isset($product_details)) { ?>
                    <?php foreach ($product_details as $key => $value_details) { ?>
                <li>
                    <div class="projOffer_sec">
                        <div class="prjOffer_Head">
                            <span class="bg"><?php echo $value_details['name']; ?></span>
                        </div>
                        <div class="proj_infoWrp">
                            <div class="textCont" id="ct_des_width<?php echo $value_details['id'] ?>"> 
                                <p><?php echo $value_details['cft_description']; ?></p>
                            </div>
                            <div class="prjOfr_Image" id="hide_cft_img_1<?php echo $value_details['id'] ?>">
                                <img src="<?php echo Router::url('/', true); ?>img/product/details/cft/<?php echo $value_details['cft_img_1']; ?>" alt="Product" />
                            </div>
                        </div>
                        <div class="collapsable" id="info<?php echo $value_details['id'] ?>">
                            <div class="inner_cont text-center">
                                <?php if(!empty($value_details['cft_img_2'])){ ?>
                                <div class="text-center">
                                    <img src="<?php echo Router::url('/', true); ?>img/product/details/cft/<?php echo $value_details['cft_img_2']; ?>" alt="Product" />
                                </div>
                                <?php } ?>
                                <?php if(!empty($value_details['sizes'])){ ?>
                                <div class="text-center">
                                    <img src="<?php echo Router::url('/', true); ?>img/product/details/sizes/<?php echo $value_details['sizes']; ?>" alt="Product" />
                                </div>
                                <?php } ?>
                                <?php if(!empty($value_details['varient'])){ ?>
                                <div class="text-center">
                                    <img src="<?php echo Router::url('/', true); ?>img/product/details/varient/<?php echo $value_details['varient']; ?>" alt="Product" />
                                </div>
                                <?php } ?>
                                        <?php if (!empty($value_details['color_image'])) { ?>
                                <div class="color_patch_wrp">
                                    <img src="<?php echo Router::url('/', true); ?>img/product/details/csn/<?php echo $value_details['color_image'] ?>" />
                                </div>
                                        <?php } ?>
                                 <?php if (!empty($value_details['install_text'])) { ?>
                                <div class="collaps_text_cont text-left"><?php echo $value_details['install_text'] ?></div>        
                                 <?php } ?>
                                  <?php if (!empty($value_details['install_img'])) { ?>
                                <div class="collaps_img_scnd"><img src="<?php echo Router::url('/', true); ?>img/product/details/csn/<?php echo $value_details['install_img'] ?>" alt="Product"></div>
                                    <?php } ?>
                                        <?php /* ?>  <ul class="color_patch_wrp">                                            
                                          <li>
                                          <div class="clr_ptch">
                                          <div class="clr_img">
                                          <img src="<?php echo Router::url('/', true); ?>img/product/details/csn/<?php echo $value_details['color_image'] ?>" />
                                          </div>
                                          <div class="clr_name"></div>
                                          </div>
                                          </li>
                                          </ul> <?php */ ?>

                            </div>
                            <?php /* ?><div class="linkGallery text-right"><a href="<?php echo Router::url('/', true); ?>d-gallery/0/<?php echo $product['material_id']; ?>" class="btnBlck_brd btn ripplelink">View Gallery</a></div><?php */ ?>
                        </div>
                        <div class="exp_collaps">
                            <a class="exp_coll" id="text_id<?php echo $value_details['id'] ?>" target="<?php echo $value_details['id'] ?>" href="javascript:void(0);" >EXPAND <span class="exp_col">-</span></a>
                        </div>
                    </div>
                </li>
                    <?php } ?>
                <?php } ?>
            </ul>
            <div class="showMoreP text-center">
                <a href="<?php echo Router::url('/', true); ?>d-products" class="btnBlck btn ripplelink">View More Products</a>
            </div>
        </div>
    </div>
</div>
<!-- /page -->
<!-- Footer -->
<?php echo $this->element('front_footer_desktop'); ?>
