<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TransactionsController extends AppController 
{
     public $uses = array('Transfer', 'User', 'Wallet','Category');
    public function index(){
        $this->layout = 'default_personal_layout';
        $this->set('users', $this->User->find('first', array(
                    'conditions' => array(
                        'User.id' => $this->Auth->user('id'))
        )));
        $this->set('wallets', $this->Wallet->find('all', array(
                    'conditions' => array(
                        'user_id' => $this->Auth->user('id'))
        )));
        $this->set('transfers', $this->Transfer->find('all', array(
                    'conditions' => array(
                        'user_id' => $this->Auth->user('id'))
        )));
        
    }
    public function addTransaction(){
                $this->layout = 'default_personal_layout';

         $this->set('wallets', $this->Wallet->find('all', array(
                    'conditions' => array(
                        'user_id' => $this->Auth->user('id'))
        )));

        $this->set('listsWallet', $this->Wallet->find('list', array(
                    'conditions' => array(
                        'user_id' => $this->Auth->user('id'))
        )));
         $this->set('listsCategory', $this->Category->find('list', array(
                    'conditions' => array(
                        'user_id' => $this->Auth->user('id'))
        )));
    }
}