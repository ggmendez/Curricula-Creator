<div class="axesCourses view">
<h2><?php  echo __('Axes Course'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($axesCourse['AxesCourse']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Axis Id'); ?></dt>
		<dd>
			<?php echo h($axesCourse['AxesCourse']['axis_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course Id'); ?></dt>
		<dd>
			<?php echo h($axesCourse['AxesCourse']['course_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Axes Course'), array('action' => 'edit', $axesCourse['AxesCourse']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Axes Course'), array('action' => 'delete', $axesCourse['AxesCourse']['id']), null, __('Are you sure you want to delete # %s?', $axesCourse['AxesCourse']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Axes Courses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Axes Course'), array('action' => 'add')); ?> </li>
	</ul>
</div>
