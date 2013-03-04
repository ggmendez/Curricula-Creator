<div class="programs view">
<h2><?php  echo __('Program'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($program['Program']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($program['Program']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($program['Program']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Program'), array('action' => 'edit', $program['Program']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Program'), array('action' => 'delete', $program['Program']['id']), null, __('Are you sure you want to delete # %s?', $program['Program']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Programs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Program'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Courses'); ?></h3>
	<?php if (!empty($program['Course'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Credits'); ?></th>
		<th><?php echo __('Identifying Number'); ?></th>
		<th><?php echo __('Area Id'); ?></th>
		<th><?php echo __('Level Id'); ?></th>
		<th><?php echo __('Subject Id'); ?></th>
		<th><?php echo __('Type Id'); ?></th>
		<th><?php echo __('Implementation Strategy Id'); ?></th>
		<th><?php echo __('Semester'); ?></th>
		<th><?php echo __('Theory Hours'); ?></th>
		<th><?php echo __('Practice Hours'); ?></th>
		<th><?php echo __('Lab Hours'); ?></th>
		<th><?php echo __('Syllabus File'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($program['Course'] as $course): ?>
		<tr>
			<td><?php echo $course['id']; ?></td>
			<td><?php echo $course['name']; ?></td>
			<td><?php echo $course['credits']; ?></td>
			<td><?php echo $course['identifying_number']; ?></td>
			<td><?php echo $course['area_id']; ?></td>
			<td><?php echo $course['level_id']; ?></td>
			<td><?php echo $course['subject_id']; ?></td>
			<td><?php echo $course['type_id']; ?></td>
			<td><?php echo $course['implementation_strategy_id']; ?></td>
			<td><?php echo $course['semester']; ?></td>
			<td><?php echo $course['theory_hours']; ?></td>
			<td><?php echo $course['practice_hours']; ?></td>
			<td><?php echo $course['lab_hours']; ?></td>
			<td><?php echo $course['syllabus_file']; ?></td>
			<td><?php echo $course['created']; ?></td>
			<td><?php echo $course['modified']; ?></td>
			<td><?php echo $course['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'courses', 'action' => 'view', $course['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'courses', 'action' => 'edit', $course['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'courses', 'action' => 'delete', $course['id']), null, __('Are you sure you want to delete # %s?', $course['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
