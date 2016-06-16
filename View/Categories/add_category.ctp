
<div class="col-sm-4" id="category">
    <h1>Add New Category</h1>
    <?php echo $this->Session->flash(); ?>
    <?php
    echo $this->Form->create('NewCategory', array('url' => array('controller' => 'categories', 'action' => 'addCategory')));
    ?>
        <?php
        echo $this->Form->input('Category.name',array('label' => 'Category name:', 
            'class' => 'form-control'
            ));        
        ?>
    <br>
    
    <?php 
//    $list_type_category=Configure::read('Category.type');
//       // debug($list_type_category);die;
//        foreach ($list_type_category as $key => $value) {
//            echo $this->Form->input('Category.type.' . $key,array('type' => 'checkbox', 
//                'label' => $value,
//                'value' => $value,
//                'class' => 'checkbox' )
//            );
//        }
//        echo $this->Form->input('categorytype', array(
//    'options' => array('chi','thu'),
//    'empty' => 'Choose one',
//    'label' => 'Choose category',
//    'class' => 'selectpicker'
//));
        echo $this->Form->label('Choose Category');
        echo '</br>';
        $options = array('0' => 'Chi', '1' => 'thu');
        $attributes = array('legend' => false,'label'=>'Choose category','class'=>'radio-inline');
        echo $this->Form->radio('categorytype', $options, $attributes,array('label'=>'Choose category','class'=>'radio-inline'));
    
    ?>
    <?php
    echo $this->Form->end(array('label' =>__('Save Category'), 'class'=>'btn btn-info', 'id'=>'btn-save-wallet'));
    ?>
</div>  