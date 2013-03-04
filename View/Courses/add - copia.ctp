<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('Add Course'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('credits', array('class' => 'digitInput'));
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
		echo $this->Form->input('syllabus_file');
		//echo $this->Form->input('Axis');
		echo $this->Form->input('Axis', array(
    'type' => 'select',
    'multiple' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

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
		<li><?php echo $this->Html->link(__('New Implementation Strategy'), array	('controller' => 'implementation_strategies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Axes'), array('controller' => 'axes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Axis'), array('controller' => 'axes', 'action' => 'add')); ?> </li>
	</ul>
</div>
