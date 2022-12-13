<?php

use Cake\Routing\Router; ?>
<link rel="icon" href="<?php echo Router::url('/', true) ?>img/images/favicon.ico" type="image/x-icon">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet"> 
<?php
echo $this->Html->css(
        array(
            'front_end1/bootstrap.min.css',
            'front_end1/owl.carousel.min.css',
            'front_end1/owl.theme.default.min.css',
            'front_end1/jv-jquery-mobile-menu.css',
            'front_end1/scroll/jquery.fullPage.css',
            'front_end1/aos.css',
            'front_end1/jquery.mCustomScrollbar.min.css',
            'front_end1/main-slider.css',
            'front_end1/stylesheet.css',
            'front_end1/stylesheet-desktop.css',
            'front_end1/sweetalert.css',
            'back_end/bvalidator.css',
));
?>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139508704-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-139508704-1');
</script>

