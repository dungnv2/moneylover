<p>
	<strong>HELLO <?php echo $name; ?></strong>
</p>
<p>
	To Activate your profile click here : 
</p>
<p>
	<?php echo $this->Html->link('Activate', $this->Html->url($link, true)); ?>
</p>