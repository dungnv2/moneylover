<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');

class WalletsController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
    
    public function index(){
        $this->layout = 'default_personal_layout';
        
    }
    public function add(){
//        $_GET; $_POST;
        debug($this->request->data);die;
        if ($this->request->is('post')) {
            $this->Wallet->create();
//            $this->Wallet->id = false;
            if($this->Wallet->save($this->data)){
                $this->Flash->success(__('Infomation is save'));
            }
            else {
                $this->Flash->error(__('you have an error when create wallet'));
            }
        }
    }
    
   
}