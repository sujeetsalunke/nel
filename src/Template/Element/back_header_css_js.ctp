<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<?php
echo $this->Html->css(
        array(
            'back_end/bootstrap/css/bootstrap.min.css',
            'back_end/dist/css/AdminLTE.min.css',
            'back_end/dist/css/skins/_all-skins.min.css',
            'back_end/plugins/iCheck/flat/blue.css',
            'back_end/plugins/morris/morris.css',
            'back_end/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
            'back_end/plugins/datepicker/datepicker3.css',
            'back_end/plugins/daterangepicker/daterangepicker-bs3.css',
            'back_end/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
            'back_end/dataTables.bootstrap.css',
            'back_end/bvalidator.css',
));
?>

<?php
echo $this->Html->script(
        array(
            'back_end/jQuery-2.1.4.min.js',
            'back_end/jquery-ui.min.js',
            'back_end/bootstrap.min.js',
            'back_end/jquery.sparkline.min.js',
            'back_end/jquery-jvectormap-1.2.2.min.js',
            'back_end/jquery-jvectormap-world-mill-en.js',
            'back_end/jquery.knob.js',
            'back_end/daterangepicker.js',
            'back_end/bootstrap-datepicker.js',
            'back_end/bootstrap3-wysihtml5.all.min.js',
            'back_end/jquery.slimscroll.min.js',
            'back_end/fastclick.min.js',
            'back_end/app.min.js',
            'back_end/demo.js',
            'back_end/ckeditor/ckeditor.js',
            'back_end/jquery.dataTables.min.js',
            'back_end/dataTables.bootstrap.min.js',
            'back_end/jquery.bvalidator.js'
));
?>