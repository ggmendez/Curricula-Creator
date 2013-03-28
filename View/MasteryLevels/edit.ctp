<div class="masteryLevels form">
<?php echo $this->Form->create('MasteryLevel'); ?>
	<fieldset>
		<legend><?php echo __('Edit Mastery Level'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MasteryLevel.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MasteryLevel.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mastery Levels'), array('action' => 'index')); ?></li>
	</ul>
</div>
