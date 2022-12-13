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
        <link rel="icon" href="<?php echo Router::url('/', true) ?>img/images/favicon.ico" type="image/x-icon">
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
                            <li><a href="<?php echo Router::url('/', true); ?>#section5">Subsidiaries</a>
                                <ul>
                                    <li><a href="<?php echo Router::url('/', true); ?>d-nel-fze">New Era Livingdeco FZE, U.A.E.</a></li>
                                    <li><a href="<?php echo Router::url('/', true); ?>d-nellc">New Era Livingdeco Limited Company, Vietnam (NELLC)</a></li>
                                </ul>
                            </li>
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