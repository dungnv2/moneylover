
<div class="col-sm-12"> 
    <?php
    echo 'hello ' .$users['name'];
    
    ?>
</div>

<div class="col-sm-4" id="wallet">
    <?php echo $this->Session->flash(); ?>
    <!-- wallet -->
    <?php
    echo $this->Form->create('Wallet', array('url' => array('controller' => 'wallets', 'action' => 'add')));
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

