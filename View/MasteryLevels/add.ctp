<div class="masteryLevels form">
<?php echo $this->Form->create('MasteryLevel'); ?>
	<fieldset>
		<legend><?php echo __('Add Mastery Level'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mastery Levels'), array('action' => 'index')); ?></li>
	</ul>
</div>
