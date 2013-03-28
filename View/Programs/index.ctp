<?php echo $this->Html->addCrumb(__('My Study Programs')); ?>

<div class="smallMenu">
    <?php echo $this->Html->link($this->Html->image('add-icon.png', array('style' => 'float: right;', 'width' => 30, 'alt' => __('New'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('New'))), array('controller' => 'programs', 'action' => 'add'), array('escape' => false)); ?>
</div>

<div class="programs index">
	<h2><?php echo __('My Study Programs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<!--<th><?php // echo $this->Paginator->sort('id'); ?></th>-->
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<!--<th><?php // echo $this->Paginator->sort('description'); ?></th>-->
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($programs as $program): ?>
	<tr>
		<!--<td><?php // echo h($program['Program']['id']); ?>&nbsp;</td>-->
		<td style="text-align: left;"><?php echo h($program['Program']['name']); ?>&nbsp;</td>
		<!--<td><?php // echo h($program['Program']['description']); ?>&nbsp;</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $program['Program']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $program['Program']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $program['Program']['id']), null, __('Are you sure you want to delete # %s?', $program['Program']['id'])); ?>
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