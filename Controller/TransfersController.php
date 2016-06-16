<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TransfersController extends AppController {

    public $uses = array('Transfer', 'User', 'Wallet');

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
        $this->set('transfers', $this->Transfer->find('all', array(
                    'conditions' => array(
                        'user_id' => $this->Auth->user('id'))
        )));
        
        
//        $this->set('transfers', $this->Wallet->query("SELECT * FROM wallets
//INNER JOIN transfers ON wallets.id = transfers.from_wallet_id
//LIMIT 0 , 30"));
    }
    

    public function addTransfer() {
        $this->layout = 'default_personal_layout';
        $this->set('wallets', $this->Wallet->find('all', array(
                    'conditions' => array(
                        'user_id' => $this->Auth->user('id'))
        )));

        $this->set('listsWallet', $this->Wallet->find('list', array(
                    'conditions' => array(
                        'user_id' => $this->Auth->user('id'))
        )));

        if ($this->request->is('post')) {
            //debug($this->request->data); die;
            $user_id = $this->Auth->user('id');
            $from = $this->request->data['NewTransfer']['fromwallet'];
            $to = $this->request->data['NewTransfer']['towallet'];
            $date = $this->request->data['NewTransfer']['date'];
            $amount = $this->request->data['NewTransfer']['amount'];
            $description = $this->request->data['NewTransfer']['description'];

            $this->Transfer->create();
            if ($this->Transfer->save(array(
                        'user_id' => $user_id,
                        'from_wallet_id' => $from,
                        'to_wallet_id' => $to,
                        'transfer_date' => $date,
                        'transfer_value' => $amount,
                        'description' => $description,
                    ))) {
                //debug($this->request->data); die;

                $this->Wallet->query("UPDATE wallets Set balance = balance- $amount  where id = $from ");
                $this->Wallet->query("UPDATE wallets Set balance = balance + $amount  where id = $to ");
                //xu ly cong tru tien trong vi 


                return $this->redirect(array('controller' => 'wallets', 'action' => 'index'));
            } else {
                $this->Session->setFlash(_('The wallet could not be saved.', true));
            }
        }
    }

}
