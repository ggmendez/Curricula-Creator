<div class="axesCourses form">
<?php echo $this->Form->create('AxesCourse'); ?>
	<fieldset>
		<legend><?php echo __('Add Axes Course'); ?></legend>
	<?php
		echo $this->Form->input('axis_id');
		echo $this->Form->input('course_id');
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Axes Courses'), array('action' => 'index')); ?></li>
	</ul>
</div>
