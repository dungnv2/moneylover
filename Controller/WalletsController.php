<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');

class WalletsController extends AppController 
{

    public $uses = array('Wallet', 'Category', 'User'); //sử dụng nhiều model phải khai báo như này

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function index() {
        $this->layout = 'default_personal_layout';
        $this->set('users', $this->User->find('first', array(
                    'conditions' => array(
                        'User.id' => $this->Auth->user('id'))
        )));
        $this->set('wallets', $this->Wallet->find('all', array(
                    'conditions' => array(
                        'user_id' => $this->Auth->user('id'))
        )));
    }

    public function initializeWallet() {
        if ($this->request->is('post')) {
            $this->Wallet->create();
            // if ($wallet = $this->Wallet->saveAll($this->request->data)) 
            //debug($this->Auth->user());die;
            // debug($this->request->data);die;

            if ($this->Wallet->save(array(
                        'name' => $this->request->data['Wallet']['name'],
                        'user_id' => $this->Auth->user('id'),
                        'balance' => $this->request->data['Wallet']['balance'],
                    ))) {
                // $this->Session->setFlash(_('The wallet has been saved.'), true);
                //debug($this->request->data['Category']);
                // debug($this->request->data['Category']['thu']); die;
                ///if (!empty($wallet)) {
                // $this->request->data['Wallet']['id'] = $this->Wallet->id;
                // debug($this->Wallet->id); die;
                $length = sizeof($this->request->data['Category']['thu']);
                for ($i = 0; $i < $length; $i++) {
                    if ($this->request->data['Category']['thu'][$i]) {
                        $this->Category->create();
                        $this->Category->save(array(
                            'user_id' => $this->Auth->user('id'),
                            'name' => $this->request->data['Category']['thu'][$i],
                            'type' => 1
                                // 'name'=> $this->request->data[],
                        ));
                    }
                }
                $length = sizeof($this->request->data['Category']['chi']);
                for ($i = 0; $i < $length; $i++) {
                    if ($this->request->data['Category']['chi'][$i]) {
                        $this->Category->create();
                        $this->Category->save(array(
                            'user_id' => $this->Auth->user('id'),
                            'name' => $this->request->data['Category']['chi'][$i],
                        ));
                    }
                }

                echo "Categories save completed?<br/>";
                echo var_dump($this->request->data);
                // }
                return $this->redirect(array('controller' => 'users', 'action' => 'profile'));
            } else {
                $this->Session->setFlash(_('The wallet could not be saved.', true));
            }
        }
        return $this->redirect(array('controller' => 'users', 'action' => 'profile'));
    }

    public function addWallet() {
        $this->layout = 'default_personal_layout';
        if ($this->request->is('post')) {
            $this->Wallet->create();
            if ($this->Wallet->save(array(
                        'name' => $this->request->data['Wallet']['name'],
                        'user_id' => $this->Auth->user('id'),
                        'balance' => $this->request->data['Wallet']['balance'],
                    ))) {
                return $this->redirect(array('controller' => 'wallets', 'action' => 'index'));
            } else {
                $this->Session->setFlash(_('The wallet could not be saved.', true));
            }
        } else {
            $this->Flash->error(__('The wallet not save,'), array('key' => 'addwallet'));
        }

      //  return $this->redirect(array('controller' => 'wallets', 'action' => 'index'));
        
    }
    public function edit($id = NULL) {
        $this->layout = 'default_personal_layout';
        if (!$id) {
            throw new NotFoundException(__('Invalid wallet'));
        }

        $wallet = $this->Wallet->findById($id);
        if (!$wallet) {
            throw new NotFoundException(__('Invalid wallet'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Wallet->id = $id;
            if ($this->Wallet->save($this->request->data)) {
                $this->Flash->success(__('Your wallet has been updated.'));
                return $this->redirect(array('controller' => 'wallets', 'action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your wallet.'));
        }

        if (!$this->request->data) {
            $this->request->data = $wallet;
        }
    }

    public function delete($id){
            if($this->request->is('get')){
                throw new MethodNotAllowedException();
            }
            if($this->Wallet->delete($id)){
                $this->Flash->success(__('the wallet id: %s has been delete', h($id)));
            } else {
                $this->Flash->error(__('the wallet id: $s could not delete',h($id)));
            }
            return $this->redirect(array('action' => 'index'));
        }

}
