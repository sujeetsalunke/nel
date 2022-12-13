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
        <?php echo $this->element('front_other_css'); ?>
    </head>
    <body class="innerPg" id="top_Scroll">
        <div class="page" id="fullpage">
            <div class="pgHwrp pgBG_black">
                <header class="main_head innerHead">
                    <div class="hamburger hamburger--spin cust-position ripplelink">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                    <a href="<?php echo Router::url('/mobile', true); ?>" class="logo">New Era</a>
                    <div class="search_wrap" data-aos="fade-in" data-aos-delay="350">
                        <a href="javascript:void(0)" class="search"></a>
                        <?php echo $this->Form->create('Products', array('url' => array('controller' => 'users', 'action' => 'products'), 'id' => 'add_page')); ?>                                                                                                             
                        <div class="search_form_wrp"><div class="search_form">
                                <input class="form-control brd_bottom" id="search_text" name="search" placeholder="Search" type="text">
                                <a href="javascript:;" id="search_text_submit" class="btn thm_brd_btn btn_gray ripplelink">Go</a>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?> 
                    </div>
                    <?php
                    echo $this->Html->script(
                            array(
                                'front_end/jquery.min.js',
                    ));
                    ?>
                    <script>
                        $(document).ready(function() {
                            $(".search").click(function() {
                                $(".search_form_wrp").toggle();
                            });
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
                </header>