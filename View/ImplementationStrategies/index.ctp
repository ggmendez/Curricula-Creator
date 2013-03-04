<div class="implementationStrategies index">
	<h2><?php echo __('Implementation Strategies'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($implementationStrategies as $implementationStrategy): ?>
	<tr>
		<td><?php echo h($implementationStrategy['ImplementationStrategy']['id']); ?>&nbsp;</td>
		<td><?php echo h($implementationStrategy['ImplementationStrategy']['name']); ?>&nbsp;</td>
		<td><?php echo h($implementationStrategy['ImplementationStrategy']['code']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $implementationStrategy['ImplementationStrategy']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $implementationStrategy['ImplementationStrategy']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $implementationStrategy['ImplementationStrategy']['id']), null, __('Are you sure you want to delete # %s?', $implementationStrategy['ImplementationStrategy']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Implementation Strategy'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
