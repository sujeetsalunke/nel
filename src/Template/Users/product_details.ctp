<?php

use Cake\Routing\Router; ?>
<?php echo $this->element('front_header'); ?>
<div class="container mainPgWrap">
    <h1 class="pghead text-center text-uppercase"><span class="underline">Product</span></h1>
    <div class="proj_Detals_wrp">
        <h2 class="mdl_Head topHead mrgBT30">

            <span class="underline"><?php echo $product['name']; ?></span>
        </h2>
        <div class="row">
            <div class="projDtl_Image text-center">
                <img src="<?php echo Router::url('/', true); ?>img/product/main/<?php echo $product['image']; ?>" alt="Project" />
            </div>
        </div>
        <div class="top_textContent">
           <div style="margin-bottom:15px;">  <?php echo $product['description']; ?></div>
		   <a href="<?php echo Router::url('/', true); ?>gallery/0/<?php echo $product['material_id']; ?>" class="btn thm_brd_btn ripplelink">View Gallery</a>
        </div>
    </div>
</div>
<div class="proj_offrOuter">
    <div class="container">
        <h2 class="mdl_Head blk_hd">
            <span class="underline">Our Offerings</span>
        </h2>
        <ul class="list-unstyled offer_Listing">
            <?php if (!empty($product_details) && isset($product_details)) { ?>


                <?php foreach ($product_details as $key => $value_details) { ?>


            <li>
                <div class="projOffer_sec">
                    <div class="prjOffer_Head"><span class="bg"><?php echo $value_details['name']; ?></span></div>
                    <div class="proj_infoWrp">
                        <div class="textCont" id="ct_des_width<?php echo $value_details['id'] ?>"> <?php echo $value_details['cft_description']; ?></div>
                        <div class="prjOfr_Image" id="hide_cft_img_1<?php echo $value_details['id'] ?>"><img src="<?php echo Router::url('/', true); ?>img/product/details/cft/<?php echo $value_details['cft_img_1']; ?>" alt="Project" /></div>
                    </div>
                    <div class="collapsable" id="info<?php echo $value_details['id'] ?>">
                        <div class="inner_cont text-center">
                            <?php if (!empty($value_details['cft_img_2'])) { ?>
                            <img src="<?php echo Router::url('/', true); ?>img/product/details/cft/<?php echo $value_details['cft_img_2']; ?>" alt="Project" />
                             <?php } ?>
                            <?php if (!empty($value_details['sizes'])) { ?>
                            <div class="color_patch_wrp">
                                <img src="<?php echo Router::url('/', true); ?>img/product/details/sizes/<?php echo $value_details['sizes'] ?>" />
                            </div>
                                    <?php } ?>
                            <?php if (!empty($value_details['varient'])) { ?>
                            <div class="color_patch_wrp">
                                <img src="<?php echo Router::url('/', true); ?>img/product/details/varient/<?php echo $value_details['varient'] ?>" />
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
                                    <?php /* ?>
                                    <ul class="color_patch_wrp">                                      
                                        <li><div class="clr_ptch"><div class="clr_img"><img src="<?php echo Router::url('/', true); ?>img/product/details/csn/<?php echo $value_details['color_image'] ?>" /></div> <div class="clr_name"></div></div></li>                                           
                                    </ul>
                                  <?php */ ?>
                        </div>
                        <?php /* ?><div class="linkGallery text-right"><a href="<?php echo Router::url('/', true); ?>gallery/0/<?php echo $product['material_id']; ?>" class="btnBlck_brd btn ripplelink">View Gallery</a></div><?php */ ?>
                    </div>
                    <div class="exp_collaps">
                        <a class="exp_coll" id="mobile_text_id<?php echo $value_details['id'] ?>" target="<?php echo $value_details['id'] ?>" href="javascript:void(0);" >EXPAND &gt;</a>
                    </div>
                </div>
            </li>
                <?php } ?>
            <?php } ?>
        </ul>
        <div class="showMoreP text-center"><a href="<?php echo Router::url('/', true); ?>products" class="btnBlck btn ripplelink">View More Products</a></div>
    </div>
</div>
<?php echo $this->element('front_footer'); ?>