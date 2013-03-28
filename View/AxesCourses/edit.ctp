<div class="axesCourses form">
<?php echo $this->Form->create('AxesCourse'); ?>
	<fieldset>
		<legend><?php echo __('Edit Axes Course'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('axis_id');
		echo $this->Form->input('course_id');
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AxesCourse.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AxesCourse.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Axes Courses'), array('action' => 'index')); ?></li>
	</ul>
</div>
