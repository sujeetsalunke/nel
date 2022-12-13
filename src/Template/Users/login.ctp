<?php

use Cake\Routing\Router; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>New Era Industry | Log in</title>
         <link rel="shortcut icon" href="<?= Router::url('/', true) ?>img/favicon-96x96.png" type="image/x-icon">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">    
        <?php
        echo $this->Html->css(
                array(
                    'back_end/bootstrap/css/bootstrap.min.css',
                    'back_end/dist/css/AdminLTE.min.css',
                    'back_end/bvalidator.css',
                    'back_end/plugins/iCheck/square/blue.css'
        ));
        ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php
        echo $this->Html->script(array(
            'back_end/jQuery-2.1.4.min.js',
            'back_end/bootstrap.min.js',
            'back_end/icheck.min.js',
            'back_end/jquery.bvalidator.js'
        ));
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#login_form').bValidator();
            });
        </script>     
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>New </b>Era Industry</a>
            </div><!-- /.login-logo -->         
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <?php echo $this->Flash->render(); ?>
                <?php echo $this->Form->create('Users', array('class' => 'form form-horizontal', 'id' => 'login_form', 'role' => 'form')); ?>
                <div class="form-group has-feedback">
                    <?php echo $this->Form->input('email', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Email', 'data-bvalidator' => 'email,required', 'label' => false)); ?>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <?php echo $this->Form->input('password', array('type' => 'password', 'class' => 'form-control', 'data-bvalidator' => 'required', 'placeholder' => 'Password', 'label' => false)); ?>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <?php echo $this->Form->submit('LOGIN', array('class' => 'btn btn-primary btn-block btn-flat')); ?>
                    </div><!-- /.col -->
                </div>
                <?php echo $this->Form->end(); ?>

        <?php /* ?>        <a href="<?php echo Router::url(array('controller' => 'Users', 'action' => 'forgot')); ?>">I forgot my password</a><br>  <?php */ ?>  
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

    </body>
</html>
