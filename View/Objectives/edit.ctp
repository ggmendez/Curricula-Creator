<div class="objectives form">
<?php echo $this->Form->create('Objective'); ?>
	<fieldset>
		<legend><?php echo __('Edit Objective'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('description');
		echo $this->Form->input('course_id');
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Objective.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Objective.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Objectives'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
