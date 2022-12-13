<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
     
    public function initialize() {
        parent::initialize();
        $this->loadComponent('Security', ['blackHoleCallback' => 'forceSSL']);
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
            //'plugin' => 'Users'
            ],
            'authenticate' => array(
                'Form' => array(
                    'userModel' => array('Users')
                )
            ),
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            //'authError' => 'Did you really think you are allowed to see that?',
            'authorize' => 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
            'storage' => 'Session',
//            'Session' => [
//                'timeout' => 1,
//            ]
            'Session' => [
                'defaults' => 'php',
                'timeout' => 2000 * 60//in minutes
            ],
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    const ROLE_SYSTEM_ADMIN = 1;

    public function isAuthorized($user = null) {
        if ($user) {
            $role = $user['role'];
            $url = $this->request->url;
            $controller = $this->request->controller;
            $action = $this->request->action;
            $is_authorized = false;
            $role = $user['role'];
            if ($role == 1) {
                Configure::load('system_admin');
                $role_data = Configure::read("roles.$role");
            }
            switch (true) {
                case $url === false: // Home Page - Allow to everyone
                    $is_authorized = true;
                    break;
                case $role == self::ROLE_SYSTEM_ADMIN && in_array($action, $role_data[$controller]):
                    $is_authorized = true;
                    break;
            }
            if ($is_authorized) {
                return true;
            } else {
                $this->Flash->success(__('You are not authorized to access the requested page.'));
                //$this->Session->setFlash(__('You are not authorized to access the requested page.'));
                return false;
            }
        } else {
            $this->Flash->success(__('You are not authorized to access the requested page.'));
            return false;
        }
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeRender(Event $event) {
        // Note: These defaults are just to get started quickly with development
        // and should not be used in production. You should instead set "_serialize"
        // in each action as required.
        if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    
    public function forceSSL(){
        $this->request->addDetector('ssl', array(
            'env' => 'HTTP_X_FORWARDED_PROTO',
            'value' => 'https'
        ));
        if($_SERVER['HTTP_X_FORWARDED_PROTO'] == "http") {
            return $this->redirect('https://' . env('SERVER_NAME') . $this->here); 
        }
    }

}
