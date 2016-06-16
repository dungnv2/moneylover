<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-sm-12" id="main-menu">

    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo Configure::read('Link.front_page'); ?>">MoneyLover</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo Configure::read('Link.front_page'); ?>">Home</a></li>
                <li><a href="<?php echo Configure::read('Link.wallet_manage'); ?>">Wallet Manage</a></li>
                <li><a href="<?php echo Configure::read('Link.category_manage'); ?>">Category Manage</a></li> 
                <li><a href="<?php echo Configure::read('Link.transfer_manage'); ?>">Tranfer Manage</a></li> 
               <li><a href="<?php echo Configure::read('Link.profile'); ?>">Profile</a></li>
               
            </ul>
        </div>
    </nav>
</div>  
<div class="col-sm-5" id="profile-infomation">
    <h3> Setting for you account</h3>
    <?php echo $this->Session->flash(); ?>
    <?php
    echo $this->Form->create('User',array('enctype' => 'multipart/form-data'));
//   echo $this->Form->create('userEdit');
    ?>
    <fieldset>
        <?php
        //echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->input('name',array('label' => 'Fullname:', 
            'class' => 'form-control'
            ));
        echo $this->Form->input('email',array('label' => 'Email:', 
            'class' => 'form-control', 
             'disabled'=>'disabled' ));
//        echo $this->Form->input('current_password',array('label' => 'Your Password:', 
//            'class' => 'form-control','type'=>'password','value'=>'')); 
        echo $this->Form->input('password',array('label' => 'New Password:', 
            'class' => 'form-control','type'=>'password','value'=>'')); 
        echo $this->Form->input('re_password',array('label' => 'ReNewPassword:', 
            'class' => 'form-control','type'=>'password'));
        echo $this->Form->input('upload', array('type'=>'file'));
        
        ?>
    <?php
    echo $this->Form->end(array('label' =>__('Save'), 'class'=>'btn btn-info', 'id'=>'btn-save-wallet')) ;
    ?>


</div>