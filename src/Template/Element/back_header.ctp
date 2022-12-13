<script type="text/javascript">
    $(window).load(function() {
        setTimeout(function() {
            $('.flash-timeout').fadeOut()
        }, 3000);
    });
</script>
<style>
    .required{
        color: red;
    }
</style>
<?php

use Cake\Routing\Router; ?>

<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo Router::url(array('controller' => 'Users', 'action' => 'index')); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>New Era Industry</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>New Era Industry</b></span>
        <link rel="shortcut icon" href="<?= Router::url('/', true) ?>img/favicon-96x96.png" type="image/x-icon">
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs"> <?php $user_data = $this->request->Session()->read('Auth.User'); ?> <?php echo $user_data['name'] ?> !!!</span>
                    </a>
                    <ul class="dropdown-menu">

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <?php /* ?>
                              <div class="pull-left">
                              <a href="<?php echo Router::url(array('controller' => 'Users', 'action' => 'passwordChange')); ?>" class="btn btn-default btn-flat">Change Password</a>
                              </div>
                              <?php */ ?>
                            <div class="pull-right">
                                <a href="<?php echo Router::url(array('controller' => 'Users', 'action' => 'logout')); ?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<script>
    function goBack() {
        window.history.back();
    }

</script>