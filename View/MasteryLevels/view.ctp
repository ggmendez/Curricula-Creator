<div class="masteryLevels view">
<h2><?php  echo __('Mastery Level'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($masteryLevel['MasteryLevel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($masteryLevel['MasteryLevel']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mastery Level'), array('action' => 'edit', $masteryLevel['MasteryLevel']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mastery Level'), array('action' => 'delete', $masteryLevel['MasteryLevel']['id']), null, __('Are you sure you want to delete # %s?', $masteryLevel['MasteryLevel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mastery Levels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mastery Level'), array('action' => 'add')); ?> </li>
	</ul>
</div>
