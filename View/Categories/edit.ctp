<div class="col-sm-4" id="wallet">
<?php
echo $this->Form->create('Category');
echo $this->Form->input('name',array('label' => 'Category name', 'class'=>'form-control', 'width'=>'500px'));


echo $this->Form->end(array('label' =>__('Save Category'), 'class'=>'btn btn-info', 'id'=>'btn-save-wallet'));
?>
</div>