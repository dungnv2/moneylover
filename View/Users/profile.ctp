<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<div class="col-sm-12" id="main-menu">
    <?php
    echo 'hello ' .$users['User']['name'];    
    ?>
    <?php echo $this->Html->link(
            'Logout', array('action' => 'logout')); ?>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo Configure::read('Link.front_page'); ?>">MoneyLover</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo Configure::read('Link.front_page'); ?>">Home</a></li>
                <li><a href="<?php echo Configure::read('Link.wallet_manage'); ?>">Wallet Manage</a></li>
                <li><a href="<?php echo Configure::read('Link.category_manage'); ?>">Category Manage</a></li> 
                <li><a href="<?php echo Configure::read('Link.transfer_manage') ?>">Tranfer Manage</a></li> 
                <li> <?php echo $this->Html->link(
                    'Setting account',
                    array('action' => 'edit', $users['User']['id'])); ?></li>
                
            </ul>
        </div>
    </nav>
</div>  
<div class="col-sm-3" id="profile-infomation">
   
    
    <table class="table">
    <thead>
      <tr>
        <th>Wallet Name</th>
        <th>Wallet Balance</th>
      </tr>
    </thead>
 

<!-- Here's where we loop through our $posts array, printing out post info -->
 <tbody>
<?php foreach ($wallets as $wallet): ?>
    <tr class="success" >
        <td><?php echo $wallet['Wallet']['name']; ?></td>
        <td><?php echo $wallet['Wallet']['balance'].' VND'; ?></td>
        
    </tr>
<?php endforeach; ?>
   </table>
    <h4>Total Balance: </h4>
       <?php foreach ($resulfts as $resulft): ?>
    <?php echo $resulft[0]['TotalItemsOrdered']; ?>
<?php endforeach; ?>
</div>