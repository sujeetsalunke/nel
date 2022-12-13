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
        <?php echo $this->element('front_css1'); ?>
        <style>
            .error {
                color: red;
            }
        </style>
    </head>
    <body class="homepage_pd" id="top_Scroll">
        <div class="page" id="fullpage">
            <header class="pg_header fixHeader">
                <nav class="navbar main_Nav_wrap">
                    <div class="container-fluid">
                        <div class="navbar-header site_logo">
                            <a class="navbar-brand logo_site" href="<?php echo Router::url('/', true); ?>">New Era</a>
                        </div>
                        <div class="navbar-collapse desk-nav">
                            <ul id="d_menu" class="nav navbar-nav">
                                <li class="active"><a href="<?php echo Router::url('/', true); ?>">Home</a></li>
                                <li><a onclick="myHref('<?php echo Router::url('/', true); ?>d-about-us');" href="javascript:;">About Us</a></li>
                                <li><a onclick="myHref('<?php echo Router::url('/', true); ?>d-products');" href="javascript:;">Products</a></li>
                                <li><a onclick="myHref('<?php echo Router::url('/', true); ?>d-gallery/0/0');" href="javascript:;">Project Gallery</a></li>
                                <li class="scroll_click"><a href="#section4">Contact Us</a></li>
                                <li><a href="<?php echo Router::url('/', true); ?>#section5">Subsidiaries</a>
                                <ul>
                                    <li><a onclick="myHref('<?php echo Router::url('/', true); ?>d-nel-fze');" href="javascript:;">New Era Livingdeco FZE, U.A.E.</a></li>
                                    <li><a onclick="myHref('<?php echo Router::url('/', true); ?>d-nellc');" href="javascript:;">New Era Livingdeco Limited Company, Vietnam (NELLC)</a></li>
                                </ul>
                                </li>
                                <li>
                                    <div class="search_wrap">
                                        <a href="javascript:void(0)" class="search"></a>
                                        <div class="search_form_wrp">
                                            <?php echo $this->Form->create('Products', array('url' => array('controller' => 'users', 'action' => 'dProductsList'), 'id' => 'add_page')); ?>
                                            <div class="search_form">
                                                <input class="form-control brd_bottom" id="search_text" name="search" placeholder="Search" type="text">
                                                <a href="javascript:;" id="search_text_submit" class="btn thm_brd_btn btn_gray ripplelink">Go</a>
                                            </div>
                                            <?php echo $this->Form->end(); ?> 
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </nav>
            </header>

            <section id="section0" class="head_wrp section headFix">
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
                                                            <div class="c-header-home_image o-background" style="background-image: url('<?php Router::url('/', true) ?>img/slider/<?php echo $value_slider['image']; ?>');"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="c-header-home_text-load">
                                        <div class="c-header-home_text">
                                            <div class="c-header-home_container o-container js-parallax" data-speed="2" data-position="top" data-target="#js-header">
                                                <h1 class="c-header-home_heading -full">
                                                            <?php echo ucfirst($value_slider['name']); ?></h1>
                                                <span class="c-header-home_subheading -load o-hsub"></span>

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
                                                <button class="o-button -white -square -left js-slider-home-button sqr-btn js-slider-home-prev" type="button">
                                                    <span class="o-button_label">
                                                    </span>
                                                </button>
                                                <button class="o-button -white -square js-slider-home-button sqr-btn js-slider-home-next" type="button">
                                                    <span class="o-button_label">
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="c-header-home_buttons o-button-group">
                                            <div class="js-parallax" data-speed="0.5" data-position="top" data-target="#js-header">
                                                <a class="c-header-home_button o-button -white -left btn_links" data-route-option="keep-header" href="#section3">
                                                    <span class="o-button_label">Projects</span>
                                                </a>
                                                <a class="c-header-home_button o-button -white btn_links" data-route-option="keep-header" href="#section2">
                                                    <span class="o-button_label">Products</span>
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
            <section id="section1" class="wrapper ham_menu abt_Section section">
                <div class="container container-full abt_Sec_wrp headFix">
                    <div class="abt_contWrap">
                        <div class="secHead text-center" data-aos="fade-up" data-aos-duration="1200"><div class="head_Sz"><span class="brd">About Us</span></div></div>
                        <!-- /header_Circle -->
                        <div class="abt_sec text-center" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                            <h3><?php if (!empty($CmsPages['display_name'])) { ?><?php echo ucfirst($CmsPages['display_name']); ?><?php } ?></h3>
                            <?php if (!empty($CmsPages['description'])) { ?><?php echo $CmsPages['description']; ?><?php } ?>
                            <a onclick="myHref('<?php echo Router::url('/', true); ?>d-about-us');" href="javascript:;" href="<?php echo Router::url('/', true); ?>d-about-us" class="btn cstomBtn ripplelink">Know More</a></div>
                        <!-- /abt_sec  -->
                    </div>
                </div>
                <!-- /container -->
            </section>
            <!-- /wrapper -->
            <section id="section2" class="wrapper sec-bgGray section">
                <div class="full-content headFix">
                    <div class="prodSec_outer">
                        <div class="secHead text-center" data-aos="fade-up" data-aos-duration="700"><div class="head_Sz"><span class="brd">Products</span></div></div>

                        <div class="prod_slider-wrap" data-aos="fade-up" data-aos-duration="700" data-aos-delay="450">
                            <div class="accordion">
                                <ul class="acc_list">
                                    <?php if (!empty($Products)) { ?>
                                        <?php foreach ($Products as $key => $value_product) { ?>
                                    <li style="background-image:url(<?php Router::url('/', true) ?>img/product/main/<?php echo $value_product['image']; ?>);">
                                        <div class="acc_inner">
                                            <a class="acc_secWRAP" onclick="myHref('<?php echo Router::url('/', true); ?>d-product-details/<?php echo $value_product['id']; ?>');" href="javascript:;">
                                                <div class="prodText-wrp">
                                                    <div class="textCont">
                                                        <div class="text-cont"><?php echo ucfirst($value_product['name']); ?></div>
                                                        <div class="link-col"><button class="btn cstomBtn ripplelink">Know More</button></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                        <?php } ?>   
                                    <?php } ?>                                      
                                </ul>
                            </div>
                        </div>
                    </div>

                </div><!-- /container -->
            </section><!-- /wrapper -->
            <section id="section3" class="wrapper ham_menu gallerySecWrap section">
                <div class="container container-full headFix">
                    <!-- /header_Circle -->
                    <div class="proj_secOuter">
                        <div class="secHead text-center" data-aos="fade-up" data-aos-duration="700"><div class="head_Sz"><span class="brd">Projects</span></div></div>
                        <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="450">
                            <div class="owl-carousel owl-theme project_Slider glrNav sld_arrw arw_black">
                                <?php if (!empty($Projects)) { ?>
                                    <?php foreach ($Projects as $key => $value_project) { ?>
                                <div class="item">
                                    <div class="project_cont desk_prj_cont">
                                        <div class="proj_img"><a onclick="myHref('<?php echo Router::url('/', true); ?>d-gallery/<?php echo $value_project['id']; ?>/0');" href="javascript:;"><?php echo $this->Html->image('project/main/' . $value_project['image'], array('style' => 'object-position: center; height: 200px; width: 200px;', 'alt' => 'Project')); ?></a></div>
                                                <?php /* ?><div class="proj_no text-center"><?php echo $value_project['name']; ?></div> <?php */ ?>
                                        <a onclick="myHref('<?php echo Router::url('/', true); ?>d-gallery/<?php echo $value_project['id']; ?>/0');" href="javascript:;"><h4 class="proj_head text-center"><?php echo $value_project['address']; ?></h4></a>
                                        <div class="share_read"> 
                                            <div class="dropdown"><a href="#" data-toggle="dropdown" class="share_icon dropdown-toggle"><?php echo $this->Html->image('images/share_icon.png', array('alt' => 'share')); ?></a>
                                                <div class="dropdown-menu share_opt_drop">
                                                    <ul class="list-unstyled social_share">
                                                        <li><a class="scl_item scl_fb" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Router::url('/', true); ?>details/<?php echo $value_project['id']; ?>"><?php echo $this->Html->image('images/social_fb.png', array('alt' => 'Facebook')); ?></a></li>
                                                        <li><a class="scl_item scl_twt" target="_blank" href="https://twitter.com/home?status=<?php echo Router::url('/', true); ?>details/<?php echo $value_project['id']; ?>&text= <?php echo $value_project['name']; ?>"><?php echo $this->Html->image('images/social_twitter.png', array('alt' => 'Twitter')); ?></a></li>
                                                    </ul>
                                                </div>
                                            </div>  
                                            <a onclick="myHref('<?php echo Router::url('/', true); ?>d-gallery/<?php echo $value_project['id']; ?>/0');" href="javascript:;" class="read_more ripplelink">See More</a> 
                                        </div>
                                        <!-- /share_read -->
                                    </div>
                                    <!-- /project_cont -->
                                </div>
                                    <?php } ?>     
                                <?php } ?>                                   
                            </div>
                            <div class="all_links text-center"><a onclick="myHref('<?php echo Router::url('/', true); ?>d-gallery/0/0');" href="javascript:;" class="btn thm_brd_btn btn_black ripplelink">View All</a></div>
                        </div> <!-- /div -->
                    </div>
                    <!-- /product_Slider -->
                    <!-- /product_sec -->
                </div>
            </section>
            <!-- /wrapper -->

            <section id="section4" class="wrapper section">
                <div class="headFix">
                    <div class="full-client_sec">
                        <div class="container">
                            <div class="client_middleContent">
                                <div class="secHead text-center"><div class="head_Sz"><span class="brd">Our Clients</span></div></div>                                
                                <div class="clientSlider-wrap">
                                    <div class="owl-carousel owl-theme clients_Slider glrNav sld_arrw arw_black">
                                        <?php if (!empty($Clients)) { ?>
                                            <?php foreach ($Clients as $key => $value_client) { ?>
                                        <div class="item text-center">
                                            <div class="clnt_img">                                                      
                                                <a onclick="myHref('<?php Router::url('/', true); ?>d-products');" href="javascript:;"><img src="<?php Router::url('/', true); ?>img/client/<?php echo $value_client['desktop_image']; ?>" alt="Client" /></a>
                                            </div>
                                        </div>
                                            <?php } ?>      
                                        <?php } ?>      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="cont_secMiddle">
                            <div class="contact_wrp bottom_wrp" data-aos="fade-up" data-aos-duration="700">
                                <div class="cont_Form contDesk">
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
                    </div>
                </div>
            </section>

            <section id="section5" class="wrapper section fp-auto-height">
                <div class="footer_add_wrp"  style="padding-top: 30px;"> 
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="secHead text-center"><div class="head_Sz"><span class="brd">Subsidiaries</span></div></div>
                            </div>
                        </div>
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

            <section id="section5" class="wrapper section fp-auto-height">
                <div class="footer_add_wrp"> 
                    <div class="container">
                        <div class="contact_wrp footerDesk top_wrp">
                            <div class="address_sec">
                                <h3 class="text-center">New Era Industries</h3>
                                <div class="text-cont text-center">
                                    <p class="addrs"><a href="https://goo.gl/maps/nnSpW7SvuRk" target="_blank">2nd Floor, Plot No. 4, Khasra No. 132, IGNOU Road, Neb Sarai, New Delhi – 110068</a></p>
                                    <ul class="list-unstyled cont_Info">
                                        <li>Phone: <a href="tel:+91-11-29536471">+91-11-29536471</a>/<a href="tel:+91-11-29536473">73</a></li>
                                        <!--<li>Fax: +91-11-29536469</li>-->
                                        <li>E-mail: <a href="mailto:sales@neweralivingdeco.com">sales@neweralivingdeco.com</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /address_sec -->
                        </div>
                        <!-- /contact_wrp -->
                    </div>
                </div>
            </section>
        </div>
        <!-- /page -->
        <a href="javascript:void(0);" class="go_top" id="scroll" title="Scroll to Top" style="display: none;">Top</a>
        <?php echo $this->element('front_js1'); ?>
        <script>
            $(document).on('click', '.scroll_click > a[href^="#"]', function (event) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: $($.attr(this, 'href')).offset().top
                }, 500);
            });
        </script>
        <!-- animation -->
        <script>
            AOS.init({
                easing: 'ease-in-out-sine'
            });
        </script>
        <script type="text/javascript">
            var base_path = "<?= Router::url('/', true) ?>";
            if (screen.width <= 800) {
                window.location = base_path + "mobile";
            }
        </script>
        <script>
            // Home Products Height
            jQuery('.prod_slider-wrap .accordion, .prod_slider-wrap .acc_list > li, .accordion .acc_list .acc_secWRAP').css({'height': ((jQuery(window).height() - 270)) + 'px'});
            jQuery(window).resize(function () {
                jQuery('.prod_slider-wrap .accordion, .prod_slider-wrap .acc_list > li, .accordion .acc_list .acc_secWRAP').css({'height': ((jQuery(window).height() - 270)) + 'px'});
            });
            // End Home Products Height
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
                $('#fullpage').fullpage({
                    scrollBar: true,
                    bigSectionsDestination: top,
                    //scrollOverflow: true,
                    //anchors: ['slider_sec', 'about_sec', 'products_sec', 'gallery_sec', 'contact_sec', 'address__sec'],
                    //menu: 'd_menu',
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