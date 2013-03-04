<div class="objectives view">
<h2><?php  echo __('Objective'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($objective['Objective']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($objective['Objective']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($objective['Course']['name'], array('controller' => 'courses', 'action' => 'view', $objective['Course']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Objective'), array('action' => 'edit', $objective['Objective']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Objective'), array('action' => 'delete', $objective['Objective']['id']), null, __('Are you sure you want to delete # %s?', $objective['Objective']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Objectives'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Objective'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
