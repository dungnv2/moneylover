<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

class CategoriesController extends AppController {
 
    public $uses = array('Wallet', 'Category', 'User');
    public $components = array('Paginator');
    public function index(){
        $this->set('category', $this->Paginator->paginate());
         $this->layout = 'default_personal_layout';
         $this->set('users', $this->User->find('first', array(
                    'conditions' => array(
                        'User.id' => $this->Auth->user('id'))
        )));
          $this->set('categories', $this->Category->find('all', array(
                    'conditions' => array(
                        'user_id' => $this->Auth->user('id'))
        )));
       
    }
    public function addCategory(){
        $this->layout="default_personal_layout";
        if ($this->request->is('post')) {
           // debug($this->request->data); die;
            
            $this->Category->create();
            if ($this->Category->save(array(
                        'user_id' => $this->Auth->user('id'),
                        'name' => $this->request->data['Category']['name'],
                        'type' => $this->request->data['NewCategory']['categorytype'],
                    ))) {
                return $this->redirect(array('controller' => 'categories', 'action' => 'index'));
            } else {
                $this->Session->setFlash(_('The wallet could not be saved.', true));
            }
        } else {
            $this->Flash->error(__('The category not save,'), array('key' => 'addcategory'));
        }

        
    }
    public function delete($id){
        if($this->request->is('get')){
                throw new MethodNotAllowedException();
            }
            if($this->Category->delete($id)){
                $this->Flash->success(__('the Category id: %s has been delete', h($id)));
            } else {
                $this->Flash->error(__('the category id: $s could not delete',h($id)));
            }
            return $this->redirect(array('action' => 'index'));
    }
    public function edit($id = NULL){
        $this->layout = 'default_personal_layout';
           if (!$id) {
            throw new NotFoundException(__('Invalid category'));
        }

        $category = $this->Category->findById($id);
       // debug($category); die;
        if (!$category ) {
            throw new NotFoundException(__('Invalid category'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Category->id = $id;
            if ($this->Category->save($this->request->data)) {
                $this->Flash->success(__('Your wallet has been updated.'));
                return $this->redirect(array('controller' => 'wallets', 'action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your wallet.'));
        }

        if (!$this->request->data) {
            $this->request->data = $category;
        }
    }

    
    
}
