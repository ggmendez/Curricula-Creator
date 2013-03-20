<div class="units index">
    <h2><?php echo __('Units'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
                        <!--<th><?php // echo $this->Paginator->sort('id');  ?></th>-->
            <!--<th><?php // echo $this->Paginator->sort('user_id'); ?></th>-->
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('knowledge_area_id'); ?></th>
            <th><?php echo $this->Paginator->sort('hours'); ?></th>
            <th><?php echo $this->Paginator->sort('core_tier_1_hours'); ?></th>
            <th><?php echo $this->Paginator->sort('core_tier_2_hours'); ?></th>
            <th><?php echo $this->Paginator->sort('includes_electives'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($units as $unit): ?>
            <tr>
                    <!--<td><?php // echo h($unit['Unit']['id']);  ?>&nbsp;</td>-->
                <!--<td><?php // echo h($unit['Unit']['user_id']); ?>&nbsp;</td>-->
                <td><?php echo h($unit['Unit']['name']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($unit['KnowledgeArea']['name'], array('controller' => 'knowledge_areas', 'action' => 'view', $unit['KnowledgeArea']['id'])); ?>
                </td>
                <td><?php echo h($unit['Unit']['hours']); ?>&nbsp;</td>
                <td><?php echo h($unit['Unit']['core_tier_1_hours']); ?>&nbsp;</td>
                <td><?php echo h($unit['Unit']['core_tier_2_hours']); ?>&nbsp;</td>
                <td><?php echo h($unit['Unit']['includes_electives']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $unit['Unit']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $unit['Unit']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $unit['Unit']['id']), null, __('Are you sure you want to delete # %s?', $unit['Unit']['id'])); ?>
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
        <li><?php echo $this->Html->link(__('New Unit'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Knowledge Areas'), array('controller' => 'knowledge_areas', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Knowledge Area'), array('controller' => 'knowledge_areas', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Learning Objectives'), array('controller' => 'learning_objectives', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Learning Objective'), array('controller' => 'learning_objectives', 'action' => 'add')); ?> </li>
    </ul>
</div>
