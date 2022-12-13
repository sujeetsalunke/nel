<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/mobile', ['controller' => 'users', 'action' => 'home', 'home']);
    $routes->connect('/', ['controller' => 'users', 'action' => 'homeDesktop', 'home']);
    $routes->connect('/d-about-us', ['controller' => 'users', 'action' => 'desktop_about_us']);
    $routes->connect('/about-us', ['controller' => 'users', 'action' => 'about_us']);
    $routes->connect('/nellc', ['controller' => 'users', 'action' => 'nellc']);
    $routes->connect('/d-nellc', ['controller' => 'users', 'action' => 'd_nellc']);
    $routes->connect('/nel-fze', ['controller' => 'users', 'action' => 'nel_fze']);
    $routes->connect('/d-nel-fze', ['controller' => 'users', 'action' => 'd_nel_fze']);
    $routes->connect('/products', ['controller' => 'users', 'action' => 'products']);
    $routes->connect('/d-products', ['controller' => 'users', 'action' => 'dProductsList']);
    $routes->connect('/product-details/:product_id', ['controller' => 'users', 'action' => 'product-details'], array('pass' => array('product_id')), true);
    $routes->connect('/d-product-details/:product_id', ['controller' => 'users', 'action' => 'dProductDetails'], array('pass' => array('product_id')), true);
    $routes->connect('/gallery/:project_id/:product_id', ['controller' => 'users', 'action' => 'gallery'], array('pass' => array('project_id', 'product_id')), true);
    $routes->connect('/d-gallery/:project_id/:product_id', ['controller' => 'users', 'action' => 'dGallery'], array('pass' => array('project_id', 'product_id')), true);
    $routes->connect('/admin-login', ['controller' => 'users', 'action' => 'login']);
    $routes->connect('/product-list', ['controller' => 'Products', 'action' => 'index']);
    $routes->connect('/product-details/add', ['controller' => 'ProductDetails', 'action' => 'add']);
    $routes->connect('/about-list', ['controller' => 'AboutUs', 'action' => 'index']);
    $routes->connect('/details/:id', ['controller' => 'users', 'action' => 'details'], array('pass' => array('id')), true);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
// $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
