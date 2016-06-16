


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
    <h1>Wallet manager</h1>
<h3><?php echo $this->Html->link("Add Wallet +", array('action' => 'addWallet')); ?></h3>
<script>
$(document).ready(function(e) {
	//Tham chiếu đến form check all và bắt sự kiện click chuột
    $("#cball").click(function(e) {
        var stt=$(this).attr('checked');
		if(stt=='checked')$('input[type=checkbox]').attr('checked',true);
		else $('input[type=checkbox]').attr('checked',false);
    });
});
</script>

<?php echo $this->Form->create('del',
        array('url' => array('controller' => 'wallets', 'action' => 'delete')));  ?>
<table class="table table-hover">
    <thead>
      <tr>
         <th>Wallet ID</th>
        <th><?php echo $this->Form->checkbox('cball',array('id'=> 'cball','name' => 'cball')); ?></th>
        <th>Wallet Name</th>
        <th>Balance</th>
        <th>Created</th>
        <th>Action</th>
      </tr>
    </thead>
 

<!-- Here's where we loop through our $posts array, printing out post info -->
 <tbody>
<?php foreach ($wallets as $wallet): ?>
    <tr class="success" >
        <td><?php echo $wallet['Wallet']['id']; ?></td>
        <td><?php echo $this->Form->checkbox('cbitem',array('name'=>'cbitem[]', 'value'=>$wallet['Wallet']['id']));  ?></td>
        <td><?php echo $wallet['Wallet']['name']; ?></td>
        <td><?php echo $wallet['Wallet']['balance'].' VND'; ?></td>
        <td><?php echo $wallet['Wallet']['created']; ?></td>
        <td><?php echo $this->Html->link('Edit', 
                array('action' => 'edit', $wallet['Wallet']['id']));
            echo " | ";
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $wallet['Wallet']['id']),
                    array('confirm' => 'Are you sure delete this wallet?')
                );
            ?>
            
        </td>
    </tr>
<?php endforeach; ?>

</table>
<?php 
    echo $this->Form->input('delete Item',
        array('type'=>'submit','name'=>'btndel','onClick'=>'are you sure')); ?>
<?php echo $this->Form->end(); ?>
</div>  
