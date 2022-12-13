<?php

use Cake\Routing\Router; ?>
<link rel="icon" href="<?php echo Router::url('/', true) ?>img/images/favicon.ico" type="image/x-icon">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet"> 
<?php
echo $this->Html->css(
        array(
            'front_end/bootstrap.min.css',
            'front_end/owl.carousel.min.css',
            'front_end/owl.theme.default.min.css',
            'front_end/jv-jquery-mobile-menu.css',
            'front_end/aos.css',
            'front_end/jquery.mCustomScrollbar.min.css',
            'front_end/bootstrap-select.min.css',
            'front_end/stylesheet.css',
            'front_end/sweetalert.css',
            'back_end/bvalidator.css',
));
?>
