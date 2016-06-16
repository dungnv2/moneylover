
<div class="col-sm-4">
    <h1>Add New Transfer</h1>
    <?php echo $this->Session->flash(); ?>
    <?php
    echo $this->Form->create('NewTransfer', array('url' => array('controller' => 'transfers', 'action' => 'addTransfer')));
    ?>
        <?php
        echo $this->Form->input('fromwallet', 
                array(
                     'options' => $listsWallet,
                     'empty' => '(choose wallet)',
                     'label'=> 'From Wallet : ',
                     'class' => 'form-control'
                    ));
       echo $this->Form->input('towallet', 
                array(
                     'options' => $listsWallet,
                     'empty' => '(choose wallet)',
                     'label'=> 'To Wallet : ',
                     'class' => 'form-control'
                    ));
       echo $this->Form->input('amount',array('label' => 'The amount in wallet:', 
            'class' => 'form-control',
            ));
       echo $this->Form->input('date', array('label' => 'Date:', 
            'class' => 'form-control'
            ));
       echo $this->Form->input('description', array('label' => 'Description:', 
            'class' => 'form-control'
            ));
        ?>
    <?php
    echo $this->Form->end(array('label' =>__('OK'), 'class'=>'btn btn-info', 'id'=>'btn-save-wallet'));
    ?>
    
</div>  

