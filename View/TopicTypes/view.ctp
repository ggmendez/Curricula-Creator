<div class="topicTypes view">
<h2><?php  echo __('Topic Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($topicType['TopicType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($topicType['TopicType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Topic Type'), array('action' => 'edit', $topicType['TopicType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Topic Type'), array('action' => 'delete', $topicType['TopicType']['id']), null, __('Are you sure you want to delete # %s?', $topicType['TopicType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Topic Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
