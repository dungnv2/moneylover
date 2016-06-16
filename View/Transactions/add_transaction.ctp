
<div class="col-sm-4">
    <h1>Add New Transaction</h1>
    <?php echo $this->Session->flash(); ?>
    <?php
    echo $this->Form->create('addtransaction', array('url' => array('controller' => 'transactions', 'action' => 'addTransaction')));
    ?>
        <?php
        echo $this->Form->input('wallet', 
                array(
                     'options' => $listsWallet,
                     'empty' => '(choose wallet)',
                     'label'=> 'Wallet : ',
                     'class' => 'form-control'
                    ));
         echo $this->Form->input('category', 
                array(
                     'options' => $listsCategory,
                     'empty' => '(choose wallet)',
                     'label'=> 'Category : ',
                     'class' => 'form-control'
                    ));
     
       echo $this->Form->input('amount',array('label' => 'The amount in wallet:', 
            'class' => 'form-control',
            ));
       echo $this->Form->input('date', array('label' => 'Date:', 
            'class' => 'form-control'
            ));
       echo $this->Form->input('description', array('label' => 'description:', 
            'class' => 'form-control'
            ));
        ?>
    <?php
    echo $this->Form->end(array('label' =>__('OK'), 'class'=>'btn btn-info', 'id'=>'btn-save-wallet'));
    ?>
    
</div>  

