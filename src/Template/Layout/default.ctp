<?php

use Cake\Routing\Router; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>New Era Industry | Dashboard</title>
        <link rel="shortcut icon" href="<?php echo Router::url('/', true) ?>img/images/favicon.ico" type="image/x-icon">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php echo $this->element('back_header_css_js'); ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php echo $this->element('back_header'); ?>

            <!-- Left side column. contains the logo and sidebar -->
            <?php echo $this->element('back_sidebar'); ?>

            <div class="content-wrapper">  
                <section class="content-header">

                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php echo $this->Flash->render(); ?>
                            <?php echo $this->fetch('content'); ?>
                        </div>
                    </div>
                </section>
            </div>
            <div class="control-sidebar-bg"></div>
            <?php echo $this->element('back_footer'); ?>
        </div><!-- ./wrapper -->     
    </body>
</html>