
<div id="left-contain" class="col-sm-9">
            <?php echo "introduce about website";?>
</div>
<div id="right-contain" class="col-sm-3">
        <?php //form dang nhap ?>
        <?php echo $this->Session->flash(); ?>
        <?php 
  echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));
            ?>
    <fieldset>
        <legend>
                        <?php echo __('Sign in'); ?>
        </legend>
        <?php         
        echo $this->Form->input('email', array('label' => 'Email:', 'class' => 'form-control'));
        echo $this->Form->input('password', array('label' => 'Password:', 'class' => 'form-control'));        
        ?>
    </fieldset>
<?php echo $this->Form->end(array('label' => __('Sign in'), 'class'=>'btn btn-primary')); ?>

            <?php //form dang ky ?>
            <?php echo nl2br($this->Session->flash('register')); ?>

 <?php echo $this->Form->create('User', array('url'=>array('cegisontroller'=>'users','action'=>'register'))); 
 ?>
    <fieldset>
        <legend>
            <?php echo __('Sign up'); ?>
        </legend>
        <?php 
        echo $this->Form->input('email',array('label'=>'Email:','class'=>'form-control'));
        echo $this->Form->input('password',array('label'=>'Password:','class'=>'form-control'));
        echo $this->Form->input('re_password',array('label'=>'Repassword:','class'=>'form-control','type'=>'password'));
        echo $this->Form->input('name',array('label'=>'Full name:','class'=>'form-control'));
        
    ?>
    </fieldset>
<?php echo $this->Form->end(array('label' => __('Sign up'), 'class'=>'btn btn-success')); ?>


</div>



