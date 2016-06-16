<div class="col-sm-4" id="wallet">
<?php
echo "Change infomation this Wallet"."</br>";
echo $this->Form->create('Wallet');
echo $this->Form->input('name',array('label' => 'Wallet name', 'class'=>'form-control', 'width'=>'500px'));
echo $this->Form->input('balance',array('label' => 'Balance', 'class'=>'form-control', 'width'=>'500px'));
echo $this->Form->end(array('label' =>__('Save Wallet'), 'class'=>'btn btn-info', 'id'=>'btn-save-wallet')) ;

?>
</div>