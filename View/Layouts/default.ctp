<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __('Curricula creator:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('curricula');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
		
			<div id="logo">
				<?php echo $this->Html->image('PNG/Product-documentation128.png', array('width'=>'100', 'alt'=>__('Curricula Creator'), 'border'=>'0'));?> 
			</div>
						
			<div class="area_left">
			  <div class="bubble_left">
				  <p><b> Curricula Creator </b></p>
			  </div>
			</div>
			
		
						
			<?php $user = AuthComponent::user();
			
			$width = 64;
			$border = 0;
			
			if(!empty($user)) { ?>
			
				<div class="menuitem">
					<?php 
					
						$name = 'Home';
						$image = 'PNG/Home.png';
						$controller = 'courses';
						$action = 'index';
					
						echo $this->Html->link($this->Html->image($image, 
							array('width'=>$width, 'alt'=>__($name), 'border'=>$border)), 
							array('controller'=>$controller, 'action'=>$action), 
							array('escape'=>false));						
					?>
					
					<h1>
						<?php echo $this->Html->link($name, array('controller'=>$controller,'action'=>$action)); ?>
					</h1>
					
				 </div>
				 
				 <div class="menuitem">					
					
					<?php 
					
						$name = 'Courses';
						$image = 'PNG/Misc-Tutorial-icon.png';
						$controller = 'courses';
						$action = 'index';
					
						echo $this->Html->link($this->Html->image($image, 
							array('width'=>$width, 'alt'=>__($name), 'border'=>$border)), 
							array('controller'=>$controller, 'action'=>$action), 
							array('escape'=>false));						
					?>
					
					<h1>
						<?php echo $this->Html->link($name, array('controller'=>$controller,'action'=>$action)); ?>
					</h1>
					
					
				 </div>
				 
				 <div class="menuitem">
					
					<?php 
					
						$name = 'Study Programs';
						$image = 'PNG/System/Control_Panel.png';
//						$controller = 'levels';
						$controller = 'courses';
						$action = 'index';
					
						echo $this->Html->link($this->Html->image($image, 
							array('width'=>$width, 'alt'=>__($name), 'border'=>$border)), 
							array('controller'=>$controller, 'action'=>$action), 
							array('escape'=>false));						
					?>
					
					<h1>
						<?php echo $this->Html->link($name, array('controller'=>$controller,'action'=>$action)); ?>
					</h1>
					
					
				 </div>
				 
				 <div class="menuitem">
					
					<?php 
					
						$name = 'Profile';
						$image = 'PNG/User.png';
						$controller = 'courses';
						$action = 'index';
					
						echo $this->Html->link($this->Html->image($image, 
							array('width'=>$width, 'alt'=>__($name), 'border'=>$border)), 
							array('controller'=>$controller, 'action'=>$action), 
							array('escape'=>false));						
					?>
					
					<h1>
						<?php echo $this->Html->link($name, array('controller'=>$controller,'action'=>$action)); ?>
					</h1>
					
				 </div>
				 
				 <div class="menuitem">					
					
					<?php 
					
						$name = 'Statistics';
						$image = 'PNG/Statistics.png';
						$controller = 'courses';
						$action = 'index';
					
						echo $this->Html->link($this->Html->image($image, 
							array('width'=>$width, 'alt'=>__($name), 'border'=>$border)), 
							array('controller'=>$controller, 'action'=>$action), 
							array('escape'=>false));						
					?>
					
					<h1>
						<?php echo $this->Html->link($name, array('controller'=>$controller,'action'=>$action)); ?>
					</h1>
					
				 </div>
				 
				 <div class="menuitem">					
					
					<?php 
					
						$name = 'Logout';
						$image = 'PNG/System/Security1.png';
						$controller = 'users';
						$action = 'logout';
					
						echo $this->Html->link($this->Html->image($image, 
							array('width'=>$width, 'alt'=>__($name), 'border'=>$border)), 
							array('controller'=>$controller, 'action'=>$action), 
							array('escape'=>false));						
					?>
					
					<h1>
						<?php echo $this->Html->link($name, array('controller'=>$controller,'action'=>$action)); ?>
					</h1>
					
				 </div>
				
				<div class="area_right">
				  <div class="bubble_right">
					  <p>Logged as: <b> <?php echo $user['display_name']; ?> </b></p>
				  </div>
				</div>
				 
			<?php } else {
			
			
			
			} ?> &nbsp;
			
			<?php 
			?>
			
			
			
		</div>
		
		
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		
		
		<div id="footer">

		</div>
		
		
	</div>
    
	<?php // echo $this->element('sql_dump'); ?>
	
</body>
</html>
