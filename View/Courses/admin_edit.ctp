<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Course'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('justification');
		echo $this->Form->input('code');
		echo $this->Form->input('credits');
		echo $this->Form->input('identifying_number');
		echo $this->Form->input('area_id');
		echo $this->Form->input('level_id');
		echo $this->Form->input('subject_id');
		echo $this->Form->input('type_id');
		echo $this->Form->input('implementation_strategy_id');
		echo $this->Form->input('semester');
		echo $this->Form->input('theory_hours');
		echo $this->Form->input('practice_hours');
		echo $this->Form->input('lab_hours');
		echo $this->Form->input('user_id');
		echo $this->Form->input('Axis');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Course.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Course.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Levels'), array('controller' => 'levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Level'), array('controller' => 'levels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Types'), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type'), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Implementation Strategies'), array('controller' => 'implementation_strategies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Implementation Strategy'), array('controller' => 'implementation_strategies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Objectives'), array('controller' => 'objectives', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Objective'), array('controller' => 'objectives', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Axes'), array('controller' => 'axes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Axis'), array('controller' => 'axes', 'action' => 'add')); ?> </li>
	</ul>
</div>
