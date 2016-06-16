<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('CakeEmail', 'Network/Email');
App::uses('AppController', 'Controller');
App::uses('String', 'Utility');

class UsersController extends AppController {

    public $name = 'Users';
    public $uses = array('Wallet','User');
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('register', 'login', 'logout', 'activate', 'edit');
    }

    public function index() {
        $this->layout = 'default_personal_layout';
       // $this->set('users',  $this->User->find('all'));

       // $this->set('users', $this->Auth->user());

          //debug($this->User->find('all'));die;
$this->set('users', $this->User->find('first', array(
                    'conditions' => array(
                        'User.id' => $this->Auth->user('id'))
                ))); 
//                debug($this->User->find('first', array(
//                    'conditions' => array(
//                        'User.id' => $this->Auth->user('id'),
//                        
//                    )
//                ))); die;
    }

    function register() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->data)) {
                // TODO:  Send email register 
                $link = array('controller' => 'users', 'action' => 'activate', $this->User->id, sha1($this->request->data['User']['email']));
                $mail = new CakeEmail('smtp');
                $mail->to($this->request->data['User']['email'])
                        ->subject('Test :: Inscription')
                        ->template('signup')
                        ->emailFormat('html')
                        ->viewVars(array('name' => $this->request->data['User']['name'], 'link' => $link))
                        ->send();
                $this->Flash->success(__('The user has been saved, check email to active'), array('key' => 'register'));
            } else {
                //lay ra message loi 
                $errors = Hash::extract($this->User->validationErrors, '{s}.{n}');

                $this->Flash->error(String::toList($errors, null, '\n'), array('key' => 'register', 'params' => array('class' => 'alert alert-danger')));
            }
        } else {
            $this->Flash->error(__('The user could not be saved. Please, try again.2'), array('key' => 'register'));
        }

        return $this->redirect(array('controller' => 'homes', 'action' => 'index'));
    }

    // Check thời hạn link
    // OK: Active tài khoản và hiển thị link login 
    // not: redirect về trang home 
    //check if the token is valid
    function activate($userId, $email) {
        // lay gia tri , null là tham so truyền vào, nếu để null lấy ra tất cả 
        $user = $this->User->read(null, $userId);
        App::uses('CakeTime', 'Utility');

        if (empty($user) || $email !== sha1($user['User']['email']) || CakeTime::isPast(strtotime($user['User']['created']) + Configure::read('User.time_limit'))) {
            $this->redirect(array('controller' => 'homes', 'action' => 'index'));
        }
        // Update the active flag in the database
        $this->User->id = $userId;
        if ($this->User->saveField('status', Configure::read('User.is_active'))) {
            $this->Session->setFlash('Your account has been activated, please log in below.');
            $this->redirect(array('controller' => 'homes', 'action' => 'index'));
        }
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $results = $this->User->find('first', array(
                    'conditions' => array(
                        'User.email' => $this->Auth->user('email'),
                        'User.status' => Configure::read('User.is_active'),
                    )
                ));

                if ($results) {
                    // tai khoan active status = 1
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    // tai khoan chua  active status = 0
                    $this->Session->setFlash('Your account has not been activated. Please check your email.');
                    $this->Auth->logout();
                    return $this->redirect(array('controller' => 'homes', 'action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('Your email/password  was incorrect'));
            }
        }
        return $this->redirect(array('controller' =>'users', 'action' => 'index'));
    }

    function logout() {
        $this->redirect($this->Auth->logout());
    }

    
    public function edit($id = NULL) {
        $this->layout = 'default_personal_layout';
       // $this->set('users', $this->Auth->user());
       //debug($this->request->data);die;
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->findById($id);
        // debug($user);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->User->id = $id;
           // debug($this->request->data); die;
//            //upload file
//                if (!empty($this->request->data)) {
//                if (!empty($this->request->data['User']['upload']['name'])) {
//                    $file = $this->request->data['User']['upload']; //put the data into a var for easy use
//                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
//                    $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
//                    //only process if the extension is valid
//                    if (in_array($ext, $arr_ext)) {
//                        //do the actual uploading of the file. First arg is the tmp name, second arg is 
//                        //where we are putting it
//                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/users/' . $file['name']);
//                        //prepare the filename for database entry
//                        $this->data['User']['avatar_image'] = $file['name'];
//                    } else return FALSE;
//                }else return FALSE;
//            }else return FALSE;
//                          // debug($file['name']); die;

                //end upload avatar
            if ($this->User->save($this->request->data)) {
                //update session
                //CakeSession::write('Auth.User.name', $this->request->data['name']);
                $this->Flash->success(__('Your profile has been updated.'));
                return $this->redirect(array('controller' => 'users', 'action' => 'profile'));
            }
            $this->Flash->error(__('Unable to update your profile.'));
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
//        if ($this->request->is('post')) {
//            // debug($this->Auth->user()); die;
//            debug($this->request->data);die;
//            if (!empty($this->request->data)) {
//                if (!empty($this->request->data['User']['upload']['name'])) {
//                    $file = $this->request->data['User']['upload']; //put the data into a var for easy use
//                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
//                    $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
//                    //only process if the extension is valid
//                    if (in_array($ext, $arr_ext)) {
//                        //do the actual uploading of the file. First arg is the tmp name, second arg is 
//                        //where we are putting it
//                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/users/' . $file['name']);
//
//                        //prepare the filename for database entry
//                        $this->data['User']['avatar_image'] = $file['name'];
//                    }
//                }
//            }
//
//            $this->User->updateAll(
//                    array('id' => $this->Auth->user('id')), array('name' => $this->request->data['User']['name'])
//                    //array('email' => $this->request->data['User']['email'])
//            );
//        }
    }
    public function profile() {
        $this->layout = 'default_personal_layout';
        $this->set('users', $this->User->find('first', array(
                    'conditions' => array(
                        'User.id' => $this->Auth->user('id'))
                ))); 
      $this->set('wallets', $this->Wallet->find('all', array(
          'conditions' => array(
              'user_id' => $this->Auth->user('id')
          )
      )));
      $userid=$this->Auth->user('id');
      $this->set('resulfts',
              $this->Wallet->query("SELECT SUM( balance ) AS TotalItemsOrdered FROM wallets where user_id = $userid "));
      
    }


}

?>