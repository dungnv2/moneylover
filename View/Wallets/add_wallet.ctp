
<div class="col-sm-4" id="wallet">
    <h1>Add New Wallet</h1>
    <?php echo $this->Session->flash(); ?>
    <?php
    echo $this->Form->create('NewWallet', array('url' => array('controller' => 'wallets', 'action' => 'addWallet')));
    ?>
        <?php
        echo $this->Form->input('Wallet.name',array('label' => 'Wallet name:', 
            'class' => 'form-control'
            ));
        echo $this->Form->input('Wallet.balance',array('label' => 'Ballance:',
            'class'=>'form-control'));
        ?>
    <?php
    echo $this->Form->end(array('label' =>__('Save Wallet'), 'class'=>'btn btn-info', 'id'=>'btn-save-wallet'));
    ?>
</div>  