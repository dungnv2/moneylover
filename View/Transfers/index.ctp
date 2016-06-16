


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
                <li> <?php echo $this->Html->link(
                    'Setting account',
                    array('controller'=>'users','action' => 'edit', $users['User']['id'])); ?></li>
                <li><a href="<?php echo Configure::read('Link.profile'); ?>">Profile</a></li>
            </ul>
        </div>
    </nav>
    <h1>Transfer manage</h1>
    <h3><?php echo $this->Html->link("Add Transfer +", array('action' => 'addTransfer')); ?></h3>
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th>From Wallet</th>
                <th>To Wallet</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Description</th>
            </tr>
        </thead>


        <!-- Here's where we loop through our $posts array, printing out post info -->
        <tbody>
<?php foreach ($transfers as $transfer): ?>
            
            <tr class="success" >
                <td><?php echo $transfer['Transfer']['from_wallet_id']; ?></td>
                <td><?php echo $transfer['Transfer']['to_wallet_id']; ?></td>
                <td><?php echo $transfer['Transfer']['transfer_date']; ?></td>
                <td><?php echo $transfer['Transfer']['transfer_value']; ?></td>
                <td><?php echo $transfer['Transfer']['description']; ?></td>
               
            </tr>
<?php endforeach; ?>
            

    </table>
    
    
</div>  
