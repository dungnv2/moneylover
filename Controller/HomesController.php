<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class HomesController extends AppController {

    public $helpers = array('Form', 'Html', 'Js', 'Time');

    /**
     * This controller does not omeuse a model
     *
     * @var array
     */
    public $uses = array('User');

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     *   or MissingViewException in debug mode.
     */
    public function index() {
        $this->layout = 'default_home_layout';
        App::uses('CakeEmail', 'Network/Email');

//        $Email = new CakeEmail('smtp');
//        $Email->to('dungnv@rikkeisoft.com');
//        $Email->subject('Test');
//        $Email->send('My message');
        $this->set('users', $this->User->find('first', array(
                    'conditions' => array(
                        'User.id' => $this->Auth->user('id'))
        )));
//        if ($this->Auth->user()) {
//            $this->redirect(array('controller' => 'users', 'action' => 'profile'));
//        }
    }

}
