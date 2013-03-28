<div class="learningObjectives form">
<?php echo $this->Form->create('LearningObjective'); ?>
	<fieldset>
		<legend><?php echo __('Edit Learning Objective'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('description');
		echo $this->Form->input('unit_id');
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('LearningObjective.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('LearningObjective.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Learning Objectives'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>
	</ul>
</div>
