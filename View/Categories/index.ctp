


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
    <h1>Categories manager</h1>
    <h3><?php echo $this->Html->link("Add Category +", array('action' => 'addCategory')); ?></h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Thu/Chi</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>


        <!-- Here's where we loop through our $posts array, printing out post info -->
        <tbody>
<?php foreach ($categories as $category): ?>
            
            <tr class="success" >
                <td><?php echo $category['Category']['name']; ?></td>
                <td>
                    <?php        
        if($category['Category']['type']==1){
            echo 'Thu';
        } else {
            echo 'Chi';
        }
                    ?>
                </td>
                <td><?php echo $category['Category']['created']; ?></td>
                <td><?php echo $this->Html->link('Edit', 
                array('action' => 'edit', $category['Category']['id']));
                echo " | ";
                echo $this->Form->postLink(
                        'Delete',
                        array('action' => 'delete', $category['Category']['id']),
                        array('confirm' => 'Are you sure delete this category?')
                        );
            ?>
                </td>
            </tr>
<?php endforeach; ?>
            

    </table>
    
</div>  
