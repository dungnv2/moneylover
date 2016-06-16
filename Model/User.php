<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    public $name = 'User';
    public $validate = array(
//    'current_password' => array(
//        'rule' => 'checkCurrentPassword',
//        'message' => 'Wrong current pass',
//    ),
//    'newpassword' => array(
//        'length' => array(
//                'rule' => array('minLength', 6),
//                'message' => 'Your password must be between 8 and 40 characters.'
//            ),
//        
//    ),
//    'renewpassword' => array(
//        'length' => array(
//                'rule' => array('minLength', 6),
//                'message' => 'Your password must be between 8 and 40 characters.'
//            ),
//        ),
//        're_password' => array(
//            'length' => array(
//                'rule' => array('minLength', 6),
//                'message' => 'Your password must be between 8 and 40 characters.'
//            ),
//            'compare' => array(
//                'rule' => array('passwordsMatch'),
//                'message' => 'The passwords you entered do not match.',
//            )
//    ),
        'email' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A email is not blank',
            ),
//            'isUnique' => array(
//                'rule' => 'isUnique',
//                'message' => 'The email is already used'
//            ),
            'compare' => array(
                'rule' => array('isUniqueEmail'),
                'message' => 'The email is already used',
            ),
            
                   
        ),
        'password' => array(
            'length' => array(
                'rule' => array('minLength', 6),
                'message' => 'Your password must be between 8 and 40 characters.'
            ),
        ),
        're_password' => array(
            'length' => array(
                'rule' => array('minLength', 6),
                'message' => 'Your password must be between 8 and 40 characters.'
            ),
            'compare' => array(
                'rule' => array('validatePasswords'),
                'message' => 'The passwords you entered do not match.',
            )
        ),
        'name' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A fullname is required'
            ),
            'length' => array(
                'rule' => array('maxLength', 40),
                'message' => 'Your name must maxlength 40 characters.'
            )
        ),
    );
    public function checkCurrentPassword() {
        
    }
    public function passwordsMatch() {
        return $this->data[$this->alias]['newpassword'] === $this->data[$this->alias]['renewpassword'];
    }
     public function validatePasswords() {
        return $this->data[$this->alias]['password'] === $this->data[$this->alias]['re_password'];
    }
    public function isUniqueEmail() {
        $mail = $this->data[$this->alias]['email'];
        $resulfts = $this->find('first', array(
            'conditions' => array(
                'User.email' => $mail,
                'User.status' => 1,
            )
        ));
       //  debug($resulfts); die();
        if (!empty($resulfts) &&  $resulfts['User']['status']) {
            $check = FALSE;
        } else {
            $check = TRUE;
        }
        return $check;
    }

    public function getActivationHash()
        {
                if (!isset($this->id)) {
                        return false;
                }
                return substr(Security::hash(Configure::read('Security.salt') . $this->field('created') . date('Ymd')), 0, 8);
        }

    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }
        return true;
    }
    

}
