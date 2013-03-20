<div class="learningObjectives view">
<h2><?php  echo __('Learning Objective'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($learningObjective['LearningObjective']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($learningObjective['LearningObjective']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unit'); ?></dt>
		<dd>
			<?php echo $this->Html->link($learningObjective['Unit']['name'], array('controller' => 'units', 'action' => 'view', $learningObjective['Unit']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Learning Objective'), array('action' => 'edit', $learningObjective['LearningObjective']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Learning Objective'), array('action' => 'delete', $learningObjective['LearningObjective']['id']), null, __('Are you sure you want to delete # %s?', $learningObjective['LearningObjective']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Learning Objectives'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Learning Objective'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>
	</ul>
</div>
