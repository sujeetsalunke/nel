<?php

use Cake\Routing\Router; ?>
<aside class="main-sidebar">
    <section class="sidebar">
        <?php $user_data = $this->request->Session()->read('Auth.User'); ?>
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li class="<?php echo (($this->request->controller == 'Users') ) ? 'active' : 'inactive' ?> treeview">
                <a href="<?php echo Router::url(array('controller' => 'users', 'action' => 'index'), true); ?>">
                    <i class="fa fa-users"></i>
                    <span>Manage Users</span>
                </a>
            </li>   
            <li class="<?php echo (($this->request->controller == 'Sliders') ) ? 'active' : 'inactive' ?> treeview">
                <a href="<?php echo Router::url(array('controller' => 'Sliders', 'action' => 'index'), true); ?>">
                    <i class="fa fa-angle-down"></i>
                    <span>Manage Sliders</span>
                </a>
            </li> 
            <li class="<?php echo (($this->request->controller == 'Queries') ) ? 'active' : 'inactive' ?> treeview">
                <a href="<?php echo Router::url(array('controller' => 'Queries', 'action' => 'index'), true); ?>">
                    <i class="fa fa-pencil"></i>
                    <span>Manage Queries</span>
                </a>
            </li> 
            <li class="<?php echo (($this->request->controller == 'Brands') ) ? 'active' : 'inactive' ?> treeview">
                <a href="<?php echo Router::url(array('controller' => 'Brands', 'action' => 'index'), true); ?>">
                    <i class="fa fa-star"></i>
                    <span>Manage Brands</span>
                </a>
            </li> 
            <li class="<?php echo (($this->request->controller == 'Clients') ) ? 'active' : 'inactive' ?> treeview">
                <a href="<?php echo Router::url(array('controller' => 'Clients', 'action' => 'index'), true); ?>">
                    <i class="fa fa-suitcase"></i>
                    <span>Manage Clients</span>
                </a>
            </li> 
            <li class="<?php echo (($this->request->controller == 'Projects') ) ? 'active' : 'inactive' ?> treeview">
                <a href="<?php echo Router::url(array('controller' => 'Projects', 'action' => 'index'), true); ?>">
                    <i class="fa fa-pencil-square-o"></i>
                    <span>Manage Projects</span>
                </a>
            </li> 
            <?php /* ?>
            <li class="<?php echo (($this->request->controller == 'ProjectDetails') ) ? 'active' : 'inactive' ?> treeview">
                <a href="<?php echo Router::url(array('controller' => 'ProjectDetails', 'action' => 'index'), true); ?>">
                    <i class="fa fa-pencil-square-o"></i>
                    <span>Manage Project Details</span>
                </a>
            </li> 
      <?php */ ?>
            <li class="<?php echo (($this->request->controller == 'Categories') ) ? 'active' : 'inactive' ?> treeview">
                <a href="<?php echo Router::url(array('controller' => 'Categories', 'action' => 'index'), true); ?>">
                    <i class="fa fa-globe"></i>
                    <span>Manage Categories</span>
                </a>
            </li>
            <li class="<?php echo (($this->request->controller == 'Materials') ) ? 'active' : 'inactive' ?> treeview">
                <a href="<?php echo Router::url(array('controller' => 'Materials', 'action' => 'index'), true); ?>">
                    <i class="fa fa-angle-down"></i>
                    <span>Manage Materials</span>
                </a>
            </li>
            <li class="<?php echo (($this->request->controller == 'Galleries') ) ? 'active' : 'inactive' ?> treeview">
                <a href="<?php echo Router::url(array('controller' => 'Galleries', 'action' => 'index'), true); ?>">
                    <i class="fa fa-pencil-square-o"></i>
                    <span>Manage Galleries</span>
                </a>
            </li> 
            <li class="<?php echo (($this->request->controller == 'Products') ) ? 'active' : 'inactive' ?> treeview">
                <a href="<?php echo Router::url(array('controller' => 'Products', 'action' => 'index'), true); ?>">
                    <i class="fa fa-pencil"></i>
                    <span>Manage Products</span>
                </a>
            </li> 
            <li class="<?php echo (($this->request->controller == 'ProductDetails') ) ? 'active' : 'inactive' ?> treeview">
                <a href="<?php echo Router::url(array('controller' => 'ProductDetails', 'action' => 'index'), true); ?>">
                    <i class="fa fa-pencil"></i>
                    <span>Manage Product Details</span>
                </a>
            </li> 
            <li class="<?php echo (($this->request->controller == 'Cities') ) ? 'active' : 'inactive' ?> treeview" hidden>
                <a href="<?php echo Router::url(array('controller' => 'Cities', 'action' => 'index'), true); ?>">
                    <i class="fa fa-angle-down"></i>
                    <span>Manage Cities</span>
                </a>
            </li> 
            <li class="<?php echo (($this->request->controller == 'AboutUs') ) ? 'active' : 'inactive' ?> treeview">
                <a href="<?php echo Router::url(array('controller' => 'AboutUs', 'action' => 'index'), true); ?>">
                    <i class="fa fa-angle-left"></i>
                    <span>Manage About Us</span>
                </a>
            </li> 
            <li class="<?php echo (($this->request->controller == 'CmsPages') ) ? 'active' : 'inactive' ?> treeview">
                <a href="<?php echo Router::url(array('controller' => 'CmsPages', 'action' => 'index'), true); ?>">
                    <i class="fa fa-envelope"></i>
                    <span>Manage Cms Pages</span>
                </a>
            </li> 
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>