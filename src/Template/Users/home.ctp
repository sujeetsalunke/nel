<?php

use Cake\Routing\Router; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>New Era Livingdeco</title>
        <?php echo $this->element('front_css'); ?>
    </head>
    <body id="top_Scroll">
        <div class="page" id="fullpage">
            <section id="section0" class="head_wrp section">
                <header class="main_head">
                    <div class="hamburger hamburger--spin cust-position ripplelink">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                    <!-- /hamburger -->
                    <a href="<?php echo Router::url('/mobile', true); ?>" class="logo">New Era</a>
                    <div class="search_wrap">
                        <a href="javascript:void(0)" class="search search0"></a>
                        <?php echo $this->Form->create('Products', array('url' => array('controller' => 'users', 'action' => 'products'), 'id' => 'add_page')); ?>
                        <div class="search_form_wrp search_form_wrp_sec_0">
                            <div class="search_form">
                                <input class="form-control brd_bottom" name="search" id="search_text" placeholder="Search" type="text">
                                <a id="search_text_submit" href="javascript:;" class="btn thm_brd_btn btn_gray ripplelink">Go</a>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?> 
                    </div>
                </header>
                <!-- /header -->
                <div class="o-barba js-barba thm_style" id="js-barba-wrapper">
                    <div class="js-barba-container o-barba_container" data-template="home">
                        <div class="o-scroll" data-module="SmoothScrolling" data-scrollbar>
                            <header class="c-header-home -full" data-module="SliderHome" id="js-header">
                                <?php
                                $i = 1;
                                if (!empty($slider)) {
                                    foreach ($slider as $key => $value_slider) {
                                        ?>
                                <article class="c-header-home_section <?php if (!empty($i) && $i == 1) { ?> is-current <?php } else { ?> is-next <?php } ?> js-slider-home-slide" data-slide="<?php echo $i; ?>">                                  
                                    <div class="c-header-home_background-parallax o-background js-parallax" data-speed="-1" data-position="top" data-target="#js-header">
                                        <div class="c-header-home_background-load-wrap o-background">
                                            <div class="c-header-home_background-load o-background">
                                                <div class="c-header-home_background-wrap o-background">
                                                    <div class="c-header-home_background o-background">
                                                        <div class="c-header-home_image-wrap o-background">
                                                            <div class="c-header-home_image o-background" style="background-image: url('<?php Router::url('/', true) ?>img/slider/<?php echo $value_slider['image']; ?>')"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="c-header-home_text-load">
                                        <div class="c-header-home_text">
                                            <div class="c-header-home_container o-container js-parallax" data-speed="2" data-position="top" data-target="#js-header">
                                                <h1 class="c-header-home_heading -full"><?php echo ucfirst($value_slider['name']); ?></h1>
                                                <!--  <a class="c-header-home_subheading -load o-hsub -link" href="">
                                                      <span class="o-hsub_label">Discover how</span>
                                                  </a> -->
                                                <span class="c-header-home_subheading -load o-hsub">
                                                </span>
                                            </div>
                                        </div>
                                    </div>                                 
                                </article>        
                                        <?php
                                        $i++;
                                    }
                                }
                                ?>
                                <div class="c-header-home_footer">
                                    <div class="o-container">
                                        <div class="c-header-home_controls o-button-group">
                                            <div class="js-parallax" data-speed="1" data-position="top" data-target="#js-header">
                                                <button class="o-button -white -square -left js-slider-home-button js-slider-home-prev" type="button">
                                                    <span class="o-button_label">
                                                    </span>
                                                </button>
                                                <button class="o-button -white -square js-slider-home-button js-slider-home-next" type="button">
                                                    <span class="o-button_label">
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="c-header-home_buttons o-button-group">
                                            <div class="js-parallax" data-speed="0.5" data-position="top" data-target="#js-header">
                                                <a class="c-header-home_button o-button -white -left" data-route-option="keep-header" href="#section2">
                                                    <span class="o-button_label">Products</span>
                                                </a>
                                                <a class="c-header-home_button o-button -white" data-route-option="keep-header" href="#section3">
                                                    <span class="o-button_label">Projects</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <div class="c-home">	
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /head_wrp -->
            <section id="section1" class="wrapper ham_menu sec_bg_black section">
                <div class="container abt_Sec_wrp fix_head">
                    <div class="section_head">
                        <!-- hamburger-->
                        <div class="hamburger hamburger--spin cust-position ripplelink" data-aos="fade-in" data-aos-delay="350">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                        <!-- /hamburger -->
                        <a href="#" class="logo" data-aos="fade-in" data-aos-delay="350">New Era</a>

                        <div class="search_wrap" data-aos="fade-in" data-aos-delay="350">
                            <a href="javascript:void(0)" class="search search1"></a>
                            <?php echo $this->Form->create('Products', array('url' => array('controller' => 'users', 'action' => 'products'), 'id' => 'add_page1')); ?>
                            <div class="search_form_wrp search_form_wrp_sec_1">
                                <div class="search_form">
                                    <input class="form-control brd_bottom" id="search_text1" name="search" placeholder="Search" type="text">
                                    <a href="javascript:;" id="search_text_submit1" class="btn thm_brd_btn btn_gray ripplelink">Go</a>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?> 
                        </div>

                    </div>
                    <div class="sm_container">
                        <div class="header_Circle" data-aos="fade-up" data-aos-duration="900">
                            <div class="title">About us</div>
                        </div>
                        <!-- /header_Circle -->
                        <div class="abt_sec text-center" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="450">
                            <h3><?php if (!empty($CmsPages['display_name'])) { ?><?php echo ucfirst($CmsPages['display_name']); ?><?php } ?></h3>
                            <?php if (!empty($CmsPages['description'])) { ?><?php echo $CmsPages['description']; ?><?php } ?>
                            <a onclick="myHref('<?php echo Router::url('/', true); ?>about-us');" href="javascript:;" href="<?php echo Router::url('/', true); ?>about-us" class="btn thm_brd_btn ripplelink">Know More</a></div>
                        <!-- /abt_sec  -->
                    </div>
                    <!-- /sm_container  -->
                </div>
                <!-- /container -->
            </section>
            <section id="section2" class="wrapper ham_menu sec_bg_black prd_wrp section">
                <div class="container fix_head">
                    <div class="section_head">
                        <!-- hamburger-->
                        <div class="hamburger hamburger--spin cust-position ripplelink" data-aos="fade-in" data-aos-delay="350">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                        <!-- /hamburger -->
                        <a href="#" class="logo" data-aos="fade-in" data-aos-delay="350">New Era</a>
                        <div class="search_wrap" data-aos="fade-in" data-aos-delay="350">
                            <a href="javascript:void(0)" class="search search3"></a>
                            <?php echo $this->Form->create('Products', array('url' => array('controller' => 'users', 'action' => 'products'), 'id' => 'add_page3')); ?>                           
                            <div class="search_form_wrp search_form_wrp_sec_3">
                                <div class="search_form">
                                    <input class="form-control brd_bottom" id="search_text3" name="search" placeholder="Search" type="text">
                                    <a href="javascript:;" id="search_text_submit3" class="btn thm_brd_btn btn_gray ripplelink">Go</a>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?> 
                        </div>
                    </div>
                    <div class="product_sec" data-aos="fade-up" data-aos-duration="700">
                        <div class="header_Circle">
                            <div class="title">Products</div>
                        </div>
                        <!-- /header_Circle -->
                        <div class="owl-carousel owl-theme product_Slider sld_arrw">
                            <?php if (!empty($Products)) { ?>
                                <?php foreach ($Products as $key => $value_product) { ?>
                            <div class="item">
                                <div class="prod_Content">
                                    <a onclick="myHref('<?php echo Router::url('/', true); ?>product-details/<?php echo $value_product['id']; ?>');" href="javascript:;"><div class="prod_img" data-aos="fade-up" data-aos-duration="700" style="background-image:url(<?php Router::url('/', true) ?>img/product/main/<?php echo $value_product['image']; ?>)"></div></a>
                                    <div class="prod_text" data-aos="fade-up" data-aos-duration="700" data-aos-delay="450">
                                        <h1 class="heading_under"><span class="text"><a onclick="myHref('<?php echo Router::url('/', true); ?>product-details/<?php echo $value_product['id']; ?>');" href="javascript:;" class="link_white"><?php echo ucfirst($value_product['name']); ?></a></span></h1>
                                        <div class="desc"> 
                                            <!--    <?php
                                                    if (strlen($value_product['description']) >= 50):
                                                        echo substr($value_product['description'], 0, 51) . ' ...';
                                                    else:
                                                        echo $value_product['description'];
                                                    endif;
                                                    ?> -->
                                        </div>
                                        <a onclick="myHref('<?php echo Router::url('/', true); ?>product-details/<?php echo $value_product['id']; ?>');" href="javascript:;" class="btn txt_lg thm_brd_btn ripplelink">Know More</a> </div>
                                </div>
                            </div>
                                <?php } ?>   
                            <?php } ?>  
                        </div>
                        <!-- /product_Slider -->
                        <div id="info" class="sld_counter"> 
                            <span id="span1" class="current_sld"></span>
                            <span id="span2"></span> 
                        </div>
                        <div id="info1"></div> 
                    </div>
                    <!-- /product_sec -->
                </div>
            </section>
             <section id="section3" class="wrapper ham_menu clnt_proj_wrap section">
                <div class="container fix_head">
                    <div class="section_head chg_clr">
                        <!-- hamburger-->
                        <div class="hamburger hamburger--spin cust-position ripplelink" data-aos="fade-in" data-aos-delay="350">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                        <!-- /hamburger -->
                        <a href="#" class="logo" data-aos="fade-in" data-aos-delay="350">New Era</a>
                        <div class="search_wrap" data-aos="fade-in" data-aos-delay="350">
                            <a href="javascript:void(0)" class="search search5"></a>
                            <?php echo $this->Form->create('Products', array('url' => array('controller' => 'users', 'action' => 'products'), 'id' => 'add_page5')); ?>                                                                                  
                            <div class="search_form_wrp search_form_wrp_sec_5">
                                <div class="search_form">
                                    <input class="form-control brd_bottom" id="search_text5" name="search" placeholder="Search" type="text">
                                    <a href="javascript:;" id="search_text_submit5" class="btn thm_brd_btn btn_gray ripplelink">Go</a>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?> 
                        </div>
                    </div>
                    <div class="proj_sec">
                        <h1 class="heading_line" data-aos="fade-up" data-aos-duration="700">Projects</h1>
                        <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="450">
                            <div class="owl-carousel owl-theme project_Slider sld_arrw arw_black">
                                <?php if (!empty($Projects)) { ?>
                                    <?php foreach ($Projects as $key => $value_project) { ?>
                                <div class="item">
                                    <div class="project_cont">
                                        <div class="proj_img"><a onclick="myHref('<?php echo Router::url('/', true); ?>gallery/<?php echo $value_project['id']; ?>/0');" href="javascript:;"><?php echo $this->Html->image('project/main/' . $value_project['image'], array('style' => 'object-position: center; height: 121px; width: 121px;','alt' => 'Project')); ?></a></div>                                
                                        <a onclick="myHref('<?php echo Router::url('/', true); ?>gallery/<?php echo $value_project['id']; ?>/0');" href="javascript:;"><h4 class="proj_head text-center"><?php echo $value_project['address']; ?></h4></a>
                                        <div class="share_read"> 
                                            <div class="dropdown"><a href="#" data-toggle="dropdown" class="share_icon dropdown-toggle"><?php echo $this->Html->image('images/share_icon.png', array('alt' => 'share')); ?></a>
                                                <div class="dropdown-menu share_opt_drop">
                                                    <ul class="list-unstyled social_share">
                                                        <li><a class="scl_item scl_fb" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Router::url('/', true); ?>details/<?php echo $value_project['id']; ?>"><?php echo $this->Html->image('images/social_fb.png', array('alt' => 'Facebook')); ?></a></li>
                                                        <li><a class="scl_item scl_twt" target="_blank" href="https://twitter.com/home?status=<?php echo Router::url('/', true); ?>details/<?php echo $value_project['id']; ?>&text= <?php echo $value_project['name']; ?>"><?php echo $this->Html->image('images/social_twitter.png', array('alt' => 'Twitter')); ?></a></li>
                                                    </ul>
                                                </div>
                                            </div> 
                                            <a onclick="myHref('<?php echo Router::url('/', true); ?>gallery/<?php echo $value_project['id']; ?>/0');" href="javascript:;" class="read_more ripplelink">See More</a>
                                        </div>
                                        <!-- /share_read -->
                                    </div>
                                    <!-- /project_cont -->
                                </div>
                                    <?php } ?>     
                                <?php } ?>     
                            </div>
                            <div class="all_links text-center"><a onclick="myHref('<?php echo Router::url('/', true); ?>gallery/0/0');" href="javascript:;" class="btn thm_brd_btn btn_black ripplelink">View All</a></div>
                        </div> <!-- /div -->
                    </div>
                    <!-- /proj_sec -->
                </div>
                <!-- /container -->
            </section>
            <!-- /wrapper -->
            <section id="section4" class="wrapper ham_menu sec_bg_black brand_outer section topAlign-content">
                <div class="container brand_wrp fix_head">
                    <div class="section_head">
                        <!-- hamburger-->
                        <div class="hamburger hamburger--spin cust-position ripplelink" data-aos="fade-in" data-aos-delay="350">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                        <!-- /hamburger -->
                        <a href="#" class="logo" data-aos="fade-in" data-aos-delay="350">New Era</a>
                        <div class="search_wrap" data-aos="fade-in" data-aos-delay="350">
                            <a href="javascript:void(0)" class="search search2"></a>
                            <?php echo $this->Form->create('Products', array('url' => array('controller' => 'users', 'action' => 'products'), 'id' => 'add_page2')); ?>
                            <div class="search_form_wrp search_form_wrp_sec_2">
                                <div class="search_form">
                                    <input class="form-control brd_bottom" id="search_text2" name="search" placeholder="Search" type="text">
                                    <a href="javascript:;" id="search_text_submit2" class="btn thm_brd_btn btn_gray ripplelink">Go</a>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?> 
                        </div>
                    </div>
                    <div class="brand_Sec">
                        <div class="header_Circle" data-aos="fade-up" data-aos-duration="700">
                            <div class="title">Our Brands</div>
                        </div>
                        <!-- /header_Circle -->
                        <div class="brands_Images brnd_3col" data-aos="fade-up" data-aos-duration="700" data-aos-delay="450">

                            <div class="brnd_clnt_outer">
                                <div class="owl-carousel owl-theme brand_client_slider sld_arrw">
                                    <?php if (!empty($Brands)) { ?>
                                        <?php foreach ($Brands as $key => $value_brand) { ?>                                     
                                    <div class="item">
                                        <div class="brand_img_wrp text-center"> <a href="#"><?php echo $this->Html->image('brand/' . $value_brand['image'], array('alt' => 'Brand')); ?></a></div>
                                    </div>
                                        <?php } ?>    
                                    <?php } ?>    
                                </div>
                            </div>
                        </div> <!-- /brands_Images -->
                    </div>
                    <!-- /brand_Sec -->
                </div><!-- /container -->
            </section><!-- /wrapper -->           
            <!-- /wrapper -->
            <section id="section5" class="wrapper ham_menu sec_bg_black clients_outer topAlign-content section">
                <div class="container brand_wrp fix_head">

                    <div class="section_head">
                        <!-- hamburger-->
                        <div class="hamburger hamburger--spin cust-position ripplelink" data-aos="fade-in" data-aos-delay="350">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                        <!-- /hamburger -->
                        <a href="#" class="logo" data-aos="fade-in" data-aos-delay="350">New Era</a>
                        <div class="search_wrap" data-aos="fade-in" data-aos-delay="350">
                            <a href="javascript:void(0)" class="search search4"></a>
                            <?php echo $this->Form->create('Products', array('url' => array('controller' => 'users', 'action' => 'products'), 'id' => 'add_page4')); ?>                                                      
                            <div class="search_form_wrp search_form_wrp_sec_4">
                                <div class="search_form">
                                    <input class="form-control brd_bottom" id="search_text4" name="search" placeholder="Search" type="text">
                                    <a href="javascript:;" id="search_text_submit4" class="btn thm_brd_btn btn_gray ripplelink">Go</a>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?> 
                        </div>
                    </div>
                    <div class="brand_Sec">
                        <div class="header_Circle" data-aos="fade-up" data-aos-duration="700">
                            <div class="title">Our Clients</div>
                        </div>
                        <!-- /header_Circle -->
                        <div class="brands_Images" data-aos="fade-up" data-aos-duration="700" data-aos-delay="450">
                            <div class="brnd_clnt_outer">
                                <div class="owl-carousel owl-theme brand_client_slider sld_arrw">
                                    <?php if (!empty($Clients)) { ?>
                                        <?php foreach ($Clients as $key => $value_client) { ?>
                                    <div class="item">
                                        <div class="brand_img_wrp"> <a onclick="myHref('<?php Router::url('/', true); ?>products');" href="javascript:;"><?php echo $this->Html->image('client/' . $value_client['mobile_image'], array('alt' => 'Client')); ?></a></div>
                                    </div> 
                                        <?php } ?>      
                                    <?php } ?>    
                                </div>
                            </div>              
                        </div> <!-- /brands_Images -->
                    </div>
                    <!-- /brand_Sec -->
                </div><!-- /container -->
            </section><!-- /wrapper -->          
            <!-- /wrapper -->
            <section id="section6" class="wrapper section ham_menu fp-auto-height" data-percentage="100" data-centered="true">
                <div class="container fix_head">
                    <div id="contactLink" class="section_head chg_clr">
                        <!-- hamburger-->
                        <div class="hamburger hamburger--spin cust-position ripplelink" data-aos="fade-in" data-aos-delay="350">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                        <!-- /hamburger -->
                        <a href="#" class="logo" data-aos="fade-in" data-aos-delay="350">New Era</a>
                        <div class="search_wrap" data-aos="fade-in" data-aos-delay="350">
                            <a href="javascript:void(0)" class="search search6"></a>
                            <?php echo $this->Form->create('Products', array('url' => array('controller' => 'users', 'action' => 'products'), 'id' => 'add_page6')); ?>                                                                                                             
                            <div class="search_form_wrp search_form_wrp_sec_6">
                                <div class="search_form">
                                    <input class="form-control brd_bottom" id="search_text6" name="search" placeholder="Search" type="text">
                                    <a href="javascript:;" id="search_text_submit6" class="btn thm_brd_btn btn_gray ripplelink">Go</a>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?> 
                        </div>
                    </div>
                    <div class="contact_wrp bottom_wrp" data-aos="fade-up" data-aos-duration="700">
                        <div class="cont_Form">
                            <h4 class="text-center">Send us your queries</h4>
                            <form id="quary_form">
                                <div class="form-group">
                                    <input name="name" id="user_name" class="form-control brd_bottom" placeholder="Name" type="text">
                                    <div id="user_name_error" class="error" hidden>Please Enter Name</div>
                                    <div id="user_name_error_val" class="error" hidden>Please Enter Valid Characters</div>
                                </div>
                                <div class="form-group">
                                    <input email="email" id="email_id" class="form-control brd_bottom" placeholder="Email" type="text">
                                    <div id="email_id_error" class="error" hidden>Please Enter Email</div>
                                    <div id="email_id_error_val" class="error" hidden>Please Enter Valid Email</div>
                                </div>
                                <div class="form-group">
                                    <input name="subject" id="subject" class="form-control brd_bottom" placeholder="Subject" type="text">
                                    <div id="subject_error" class="error" hidden>Please Enter Subject</div>                                
                                </div>
                                <div class="form-group">
                                    <input name="phone" id="phone_no" class="form-control brd_bottom" maxlength="10" placeholder="Phone" type="text">
                                    <div id="phone_no_error" class="error" hidden>Please Enter Phone Number</div>
                                    <div id="phone_no_error_val" class="error" hidden>Please Enter Valid Phone Number</div>
                                </div>
                                <div class="form-group mrg_tp">
                                    <textarea id="ms_user" name="msg" class="form-control cst_control" placeholder="message"></textarea>
                                    <div id="ms_user_error" class="error" hidden>Please Enter Message</div>
                                </div>
                                <div class="btn_sec text-center"><a id="submit_query" href="javascript:;" class="btn thm_brd_btn btn_gray ripplelink">Submit</a></div>
                            </form>
                        </div>
                    </div>
                    <!-- /contact_wrp -->
                </div>
            </section>
            
            <section id="section7" class="wrapper section fp-auto-height">
                <div class="footer_add_wrp"  style="padding-top: 30px;"> 
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 address_sec">
                                <h3 class="text-center" style="letter-spacing:0;">New Era Livingdeco FZE, <br>U.A.E. (NEL FZE)</h3>
                                <div class="text-cont text-center">
                                    <p class="addrs"><a href="https://goo.gl/maps/hMsf5gzmz13MvyYN8" target="_blank">Business Center RAKEZ, (Ras Al Khaimah Economic Zone), Ras Al Khaimah, United Arab Emirates</a></p>
                                    <ul class="list-unstyled cont_Info">
                                        <!--<li>Phone: <a href="tel:29536469">29536469</a></li>-->
                                        <!--<li>Fax: +91-11-29536469</li>-->
                                        <li>E-mail: <a href="mailto:neweralivingdeco@rakfzbc.ae">neweralivingdeco@rakfzbc.ae</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 address_sec">
                                <h3 class="text-center" style="letter-spacing:0;">New Era Livingdeco Limited Company, <br>Vietnam (NELLC)</h3>
                                <div class="text-cont text-center">
                                    <p class="addrs"><a href="https://goo.gl/maps/xBjbtzWRbmQzQ7bL7" target="_blank">4th Floor, no. 17c, group 80, Khuong Trung ward, Thanh Xuan district, Hanoi, Vietnam</a></p>
                                    <ul class="list-unstyled cont_Info">
                                        <li>Phone: <a href="tel:+84913059573">+84913059573</a>
                                        <!--<li>Fax: +91-11-29536469</li>-->
                                        <li>E-mail: <a href="mailto:nellc.vietnam@gmail.com">nellc.vietnam@gmail.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="section7" class="wrapper section fp-auto-height">
                <div class="footer_add_wrp" id="footer_adrs"> 
                    <div class="container">
                        <div class="contact_wrp top_wrp" data-aos="fade-up" data-aos-duration="700">
                            <div class="address_sec">
                                <h3 class="text-center">New Era Industries</h3>
                                <div class="text-cont text-center">
                                    <p class="addrs"><a href="https://goo.gl/maps/nnSpW7SvuRk" target="_blank">2nd Floor,<br> 
                                            Plot No. 4, Khasra No. 132,<br> IGNOU Road, Neb Sarai, New Delhi – 110068 </a></p>
                                    <span class="phn">Phone: <a href="tel:+91-11-29536471">+91-11-29536471</a>/<a href="tel:+91-11-29536473">73</a></span> 
                                    <!--<span class="fax">Fax: +91-11-29536469</span>-->
                                    <p class="email">E-mail: <a href="mailto:sales@neweralivingdeco.com">sales@neweralivingdeco.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </div>
        <!-- /page -->
        <a href="javascript:void(0);" class="go_top" id="scroll" title="Scroll to Top" style="display: none;">Top</a>
        <!-- Menu -->
        <!-- drawer Menu -->
        <div class="mobile-nav sidebar-off-canvas site-Nav">
            <div class="menu_hamburger">
                <div class="hamburger hamburger--spin cust-position ripplelink">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </div>
            <ul id="menu" class="nav navbar-nav">
                <li class="active"><a href="<?php echo Router::url('/mobile', true); ?>">Home</a></li>
                <li><a onclick="myHref('<?php echo Router::url('/', true); ?>about-us');" href="javascript:;">About Us</a></li>
                <li><a onclick="myHref('<?php echo Router::url('/', true); ?>products');" href="javascript:;">Products</a></li>
                <li><a onclick="myHref('<?php echo Router::url('/', true); ?>gallery/0/0');" href="javascript:;">Gallery</a></li>
                <li data-menuanchor="contactsec"><a class="onepage" href="#contactsec">Contact Us</a></li>
                <li><a href="<?php echo Router::url('/', true); ?>#section5">Subsidiaries</a>
                    <ul>
                        <li><a onclick="myHref('<?php echo Router::url('/', true); ?>nel-fze');" href="javascript:;">New Era Livingdeco FZE, U.A.E.</a></li>
                        <li><a onclick="myHref('<?php echo Router::url('/', true); ?>nellc');" href="javascript:;">New Era Livingdeco Limited Company, Vietnam (NELLC)</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /drawer -->
        <!-- End Menu -->
        <?php echo $this->element('front_js'); ?>
        <style>
            .error{color: red;}
        </style>
        <script>
            AOS.init({
                easing: 'ease-in-out-sine'
            });
        </script>
        <script>
            var base_path = "<?= Router::url('/', true) ?>";
            $(document).ready(function () {
                $('#search_text_submit').click(function () {
                    var search = $('#search_text').val();
                    if (search != '') {
                        $('#add_page').submit();
                    } else {
                        // alert('out');
                    }
                });
                $('#search_text_submit1').click(function () {
                    var search = $('#search_text1').val();
                    if (search != '') {
                        $('#add_page1').submit();
                    } else {
                        // alert('out');
                    }
                });
                $('#search_text_submit2').click(function () {
                    var search = $('#search_text2').val();
                    if (search != '') {
                        $('#add_page2').submit();
                    } else {
                        // alert('out');
                    }
                });
                $('#search_text_submit3').click(function () {
                    var search = $('#search_text3').val();
                    if (search != '') {
                        $('#add_page3').submit();
                    } else {
                        // alert('out');
                    }
                });
                $('#search_text_submit4').click(function () {
                    var search = $('#search_text4').val();
                    if (search != '') {
                        $('#add_page4').submit();
                    } else {
                        // alert('out');
                    }
                });
                $('#search_text_submit5').click(function () {
                    var search = $('#search_text5').val();
                    if (search != '') {
                        $('#add_page5').submit();
                    } else {
                        // alert('out');
                    }
                });
                $('#search_text_submit6').click(function () {
                    var search = $('#search_text6').val();
                    if (search != '') {
                        $('#add_page6').submit();
                    } else {
                        // alert('out');
                    }
                });
                $('#fullpage').fullpage({
                    scrollBar: true,
                    bigSectionsDestination: top,
                    //scrollOverflow: true,
                    anchors: ['slidersec', 'aboutsec', 'productsec', 'projectsec', 'brandsec', 'clientsec', 'contactsec', 'addresssec'],
                    menu: '#menu',
                    responsiveHeight: 350,
                    //responsiveWidth: 1100,
                });
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 100) {
                        $('#scroll').fadeIn();
                    } else {
                        $('#scroll').fadeOut();
                    }
                });
                $('#scroll').click(function () {
                    $("html, body").animate({scrollTop: 0}, 600);
                    return false;
                });
                // For collapse Menu
                $('.onepage').click(
                        function () {
                            $('.hamburger').removeClass('open');
                        }
                );
                $(function () {
                    $(".onepage").click(function () {
                        $(".mobile-nav").css({"display": "none", "left": "-100%"});
                        $("body").css({"overflow": "inherit"});
                    });
                });
// End collapse Menu
                $('.c-header-home_footer .c-header-home_buttons a').click(function () {
                    $('html, body').animate({
                        scrollTop: $($(this).attr('href')).offset().top
                    }, 500);
                    return false;
                });

                $("#submit_query").click(function () {
                    var name = $('#user_name').val();
                    var email = $('#email_id').val();
                    var subject = $('#subject').val();
                    var phone = $('#phone_no').val();
                    var msg = $('#ms_user').val();
                    var form_data = new FormData();
                    if (validation()) {
                        //   $('#loader_show').show();
                        $('.error').hide();
                        form_data.append("name", name)
                        form_data.append("email", email)
                        form_data.append("subject", subject)
                        form_data.append("phone", phone)
                        form_data.append("msg", msg)
                        $.ajax({
                            url: base_path + '/Users/queryUser',
                            dataType: 'html',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: 'post',
                            success: function (data) {
                                if (data == 1) {
                                    $("#quary_form").trigger('reset');
                                    swal({title: "Success !", text: "Thank you for Share your query!", timer: 2100})
                                } else if (data == 0) {
                                    swal({title: "Error !", text: "Please try again share your query!", timer: 2100})
                                    $('#loader_show').hide();
                                }
                            },
                            error: function () {
                                swal({title: "Error !", text: "Please try again share your query!", timer: 2100})
                                $('#loader_show').hide();
                            }
                        });
                    }
                });
            });
            function myHref(url) {
                location.href = url;
            }
            function validation() {
                var flag = true;
                if ($('#user_name').val() == "") {
                    $('#user_name_error').show();
                    $('#user_name').focus();
                    flag = false;
                } else {
                    $('#user_name_error').hide();
                    if (!/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/.test($('#user_name').val())) {
                        $('#user_name_error_val').show();
                        $('#user_name').focus();
                        flag = false;
                    } else {
                        $('#user_name_error_val').hide();
                    }
                }
                if ($('#email_id').val() == "") {
                    $('#email_id_error').show();
                    $('#email_id').focus();
                    flag = false;
                } else {
                    $('#email_id_error').hide();
                    var email = $('#email_id').val();
                    var re = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
                    var email_id = re.test(email);
                    if (email_id == true) {
                        $('#email_id_error_val').hide();
                    } else {
                        $('#email_id_error_val').show();
                        $('#email_id').focus();
                        flag = false;
                    }
                }
                if ($('#subject').val() == "") {
                    $('#subject_error').show();
                    $('#subject').focus();
                    flag = false;
                } else {
                    $('#subject_error').hide();
                }
                if ($('#phone_no').val() == "") {
                    $('#phone_no_error').show();
                    $('#phone_no').focus();
                    flag = false;
                } else {
                    $('#phone_no_error').hide();
                    var phone_no = $('#phone_no').val().length;
                    if (phone_no != '') {
                        if (phone_no == 10) {
                            $('#phone_no_error_val').hide();
                        } else {
                            $('#phone_no_error_val').show();
                            $('#phone_no').focus();
                            flag = false;
                        }
                    }
                }
                if ($('#ms_user').val() == "") {
                    $('#ms_user_error').show();
                    $('#ms_user').focus();
                    flag = false;
                } else {
                    $('#ms_user_error').hide();
                }
                return flag;
            }
        </script>
    </body>
</html>