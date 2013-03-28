<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    var $helpers = array('Html', 'Form', 'Js');

    /* public $components = array(
      'Session',
      'Auth' => array(
      'loginRedirect' => array('controller' => 'courses', 'action' => 'index'),
      'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
      array('authorize' => 'Controller')
      )
      ); */
    public $components = array(
        'Session',
        'Auth' => array('authorize' => 'Controller'),
        'RequestHandler',
    );

    function beforeRender() {
        if ($this->RequestHandler->isAjax() || $this->RequestHandler->isXml()) {
            Configure::write('debug', 0);
        }
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->deny('index', 'view', 'add', 'delete', 'edit');
    }

    public function changeLanguage ($theUrl) {
        
        $language = substr($theUrl, 0, 3);
        
        $this->Session->write('Config.language', $language);

//        $pos = strpos($theUrl, '/');
//        
//        $this->redirect(substr($theUrl, $pos, strlen($theUrl)));
//        
        $this->redirect($this->referer());
    }

    /* public function isAuthorized($user) {

      // Admin can access every action
      if (isset($user['role']) && $user['role'] === 'admin') {
      return true;
      }

      // Default deny
      return false;
      } */

    public function isAuthorized($user = null) {
        // Any registered user can access public functions
        if (empty($this->request->params['admin'])) {
            return true;
        }

        // Only admins can access admin functions
        if (isset($this->request->params['admin'])) {
            return (bool) ($user['role'] === 'admin');
        }

        // Default deny
        return false;
    }

}
