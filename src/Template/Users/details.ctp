<?php

use Cake\Routing\Router; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>New Era Livingdeco</title>
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $project['name']; ?>" />
        <meta property="og:description" content="<?php echo $project['description']; ?>" />
        <meta property="og:url" content="<?php echo Router::url('/', true) ?>details/<?php echo $project['id']; ?>" />
        <meta property="og:site_name" content="New Era Livingdeco" />
        <meta property="og:image" content="<?php echo Router::url('/', true); ?>img/project/main/<?php echo $project['image']; ?>" />
        <meta property="og:image:width" content="480" />
        <meta property="og:image:height" content="855" />
        <link rel="canonical" href="<?php echo Router::url('/', true) ?>details/<?php echo $project['id']; ?>" />
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="New Era Livingdeco">
        <meta name="twitter:title" content="<?php echo $project['name']; ?>">
        <meta name="twitter:description" content="<?php echo $project['description']; ?>">
        <meta name="twitter:creator" content="New Era Livingdeco">
        <meta name="twitter:image" content="<?php echo Router::url('/', true); ?>img/project/main/<?php echo $project['image']; ?>">
        <meta name="twitter:domain" content="http://52.74.77.52/new_era_industries/">
        <link rel="icon" href="<?php echo Router::url('/', true) ?>img/images/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet"> 
        <?php
        echo $this->Html->css(
                array(
                    'front_end1/bootstrap.min.css',
                    'front_end1/aos.css',
                    'front_end1/jquery.mCustomScrollbar.min.css',
                    'front_end1/stylesheet.css',
                    'front_end1/stylesheet-desktop.css',
                    'front_end1/sweetalert.css',
                    'back_end/bvalidator.css',
        ));
        ?>                     
    </head>
    <body id="top_Scroll">
        <header class="pg_header fixHeader">
            <nav class="navbar main_Nav_wrap">
                <div class="container-fluid">
                    <div class="navbar-header site_logo">
                        <a class="navbar-brand logo_site" href="<?php echo Router::url('/', true); ?>">New Era</a>
                    </div>
                    <div class="navbar-collapse desk-nav">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo Router::url('/', true); ?>">Home</a></li>
                            <li><a href="<?php echo Router::url('/', true); ?>d-about-us">About Us</a></li>
                            <li><a href="<?php echo Router::url('/', true); ?>d-products">Products</a></li>
                            <li><a href="<?php echo Router::url('/', true); ?>d-gallery/0/0">Project Gallery</a></li>
                            <li><a href="<?php echo Router::url('/', true); ?>#section4">Contact Us</a></li>
                            <li>
                                <div class="search_wrap">
                                    <a href="javascript:void(0)" class="search"></a>
                                    <?php echo $this->Form->create('Products', array('url' => array('controller' => 'users', 'action' => 'dProductsList'), 'id' => 'add_page')); ?>
                                    <div class="search_form_wrp">
                                        <div class="search_form">
                                            <input class="form-control brd_bottom" name="search" id="search_text" placeholder="Search" type="text">
                                            <a href="javascript:;" id="search_text_submit" class="btn thm_brd_btn btn_gray ripplelink">Go</a>
                                        </div>
                                    </div>
                                    <?php echo $this->Form->end(); ?> 
                                </div>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>
        </header>
        <?php
        echo $this->Html->script(
                array(
                    'front_end/jquery.min.js',
        ));
        ?>
        <script type="text/javascript">
            var base_path = "<?= Router::url('/', true) ?>";
            if (screen.width <= 800) {
                window.location = base_path + "mobile";
            }
        </script>
        <script>
            $(document).ready(function() {
                $('#search_text_submit').click(function() {
                    var search = $('#search_text').val();
                    if (search != '') {
                        $('#add_page').submit();
                    } else {
                        // alert('out');
                    }
                });
            });
        </script>
        <!-- Header -->
        <div class="page innerPg_pd detailsPg_pd pg_hgt">
            <div class="black_bg prod_detailTop">
                <div class="container container-full">
                    <div class="head_Sz innerPgHead pg_Heading">
                        <span class="brd brd_ylw">Project</span>
                    </div>
                    <div class="detail_sec_head"><?php echo $project['name']; ?></div>
                    <div class="row pro_details_top">
                        <div class="col-sm-6 col-md-6 col-lg-5">
                            <div class="detail_img">
                                <img src="<?php echo Router::url('/', true); ?>img/project/main/<?php echo $project['image']; ?>" alt="Product" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-7">
                            <div class="detail_text_sec">
                                <?php echo $project['description']; ?>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page -->
        <!-- Footer -->
        <?php echo $this->element('front_footer_desktop'); ?>
