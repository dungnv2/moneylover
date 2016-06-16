
<div class="col-sm-12"> 
    <?php
    echo 'hello ' .$users['User']['name'];    
    ?>
</div>

<div class="col-sm-4" id="wallet">
    <?php echo $this->Session->flash(); ?>
    <!-- wallet -->
    <?php
    echo $this->Form->create('InitializeWallet', array('url' => array('controller' => 'wallets', 'action' => 'initializeWallet')));
    ?>
    <fieldset>
        <legend>
            <?php echo __('initialization wallet'); ?>
        </legend>
        <?php
        echo $this->Form->input('Wallet.name',array('label' => 'Wallet name:', 
            'class' => 'form-control', 
            'value' => 'Start valus' ));
        echo $this->Form->input('Wallet.balance',array('label' => 'Ballance:',
            'class'=>'form-control', 
            'value'=>0));
        ?>
        </fieldset>
            
        <fieldset>
            <legend>
                        <?php echo __('category Thu'); ?>

            </legend>
        <?php
        $list = Configure::read('Category.list_default');
        foreach ($list[0] as $key => $value) {
            echo $this->Form->input('Category.thu.' . $key,array('type' => 'checkbox', 
                'label' => $value,
                'value' => $value,
                'class' => 'checkbox', 
                'checked'=>"checked" )
            );
        }
      
        ?>
    </fieldset>
    
    <fieldset>
            <legend>
                        <?php echo __('category Chi'); ?>

            </legend>
        <?php
        foreach ($list[1] as $key => $value) {
            echo $this->Form->input('Category.chi.' . $key,array('type' => 'checkbox', 
                'label' => $value,
                'value' => $value,
                'class' => 'checkbox', 
                'checked'=>"checked" )
            );
        }
      
        ?>
    </fieldset>
    <?php
    echo $this->Form->end(array('label' =>__('Save Infomation'), 'class'=>'btn btn-info', 'id'=>'btn-save-wallet'));
    ?>

    <!-- category -->
    
</div>        
<div class="col-sm-8">

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
                    array('action' => 'edit', $users['User']['id'])); ?></li>
                <li><a href="<?php echo Configure::read('Link.profile'); ?>">Profile</a></li>
            </ul>
        </div>
    </nav>
</div>        

