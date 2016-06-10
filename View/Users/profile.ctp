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
                <a class="navbar-brand" href="#">MoneyLover</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Wallet Manage</a></li>
                <li><a href="#">Category Manage</a></li> 
                <li><a href="#">Tranfer Manage</a></li> 
                <li><a href="http://192.168.56.57/moneylover/users/profile">Profile</a></li> 
                
            </ul>
        </div>
    </nav>
</div>  
<div class="col-sm-12" id="profile-infomation">
    <h3> Setting for you account</h3>
    <?php echo $this->Session->flash(); ?>
    <!-- wallet -->
    <?php
    echo $this->Form->create('Profile', array('url' => array('controller' => 'users', 'action' => 'edit')));
    ?>
    <fieldset>
       
        <?php
        echo $this->Form->input('name',array('label' => 'Fullname:', 
            'class' => 'form-control', 
            'value' => $users['name'] ));
        echo $this->Form->input('avatar', array('type'=>'file'));

        ?>
    <?php
    echo $this->Form->end(array('label' =>__('Save'), 'class'=>'btn btn-info', 'id'=>'btn-save-wallet'));
    ?>

    
</div>