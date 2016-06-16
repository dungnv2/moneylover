<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppModel', 'Model');
class Wallet extends AppModel
{
    public $name="Wallet";
    public $validate = array (
        'name'=> array(
            'require'=>array(
                'rule' => 'notBlank',
                'message' => 'A wallet name is not blank',
            )
        ),
        'balance'=> array(
            'require'=>array(
                'rule' => 'notBlank',
                'message' => 'Balance is not blank',
            )
        )
    );
}
