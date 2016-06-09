<?php

/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
    <head>
	<?php echo $this->Html->charset(); ?>
        <title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
        </title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.min');
		//echo $this->Html->css('bootstrap');
		echo $this->Html->css('style_dung');
		//echo $this->Html->script(array('test'));
                echo $this->Html->script(array('jquery-2.2.4.min.js'));
		//echo $this->Html->script(array('bootstrap.js'));
		echo $this->Html->script(array('bootstrap.min.js'));
		

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    </head>
    <body>
        <div id="container" class="container">
            <div class="row">
                <div id="header" class="col-sm-12">
                    <div id="logo" class="col-sm-3">
                        <?php echo $this->Html->link(
					$this->Html->image('moneylover/logo.png', array('alt' => $cakeDescription, 'border' => '0')),
					'http://192.168.56.57/moneylover/',
					array('target' => '_self', 'escape' => false)
				);
			?>
                        
                    </div>
                    <div id="info" class="col-sm-9">

                        <h1 class="col-sm-12">Money Lover</h1>
                        <h3>Financial Management Software</h3>
                    </div>
                </div>
                
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
               
                <div id="footer">
                    <div class="col-sm-12">
                        <h3><?php echo 'Method of Personal Finance Management'?></h3>

                    </div>

                </div>
            </div>
        </div>
	
    </body>
</html>
