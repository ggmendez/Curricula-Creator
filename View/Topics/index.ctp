<div class="topics index">

    <?php

    function findKnowledgeAreaById($knoledgeAreas, $idToFind) {
        foreach ($knoledgeAreas as $knoledgeArea):
            if ($knoledgeArea['KnowledgeArea']['id'] == $idToFind) {
                return $knoledgeArea;
            }
        endforeach;
    }
    ?>

    <h2><?php echo __('Topics'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <!--<th><?php echo $this->Paginator->sort('id'); ?></th>-->			
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('unit_id'); ?></th>
            <th><?php echo $this->Paginator->sort('knowledge_area_id'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($topics as $topic): ?>
            <tr>
                <!--<td><?php echo h($topic['Topic']['id']); ?>&nbsp;</td>-->
                <td style="text-align: justify;"><?php echo h($topic['Topic']['name']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($topic['Unit']['name'], array('controller' => 'units', 'action' => 'view', $topic['Unit']['id'])); ?>
                </td>
                <td>
                    <?php
                    $theKnowledgeArea = findKnowledgeAreaById($knowledgeAreas, $topic['Unit']['knowledge_area_id']);
                    echo $this->Html->link($theKnowledgeArea['KnowledgeArea']['name'], array('controller' => 'knowledgeAreas', 'action' => 'view', $topic['Unit']['knowledge_area_id']));
                    ?>
                </td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $topic['Topic']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $topic['Topic']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $topic['Topic']['id']), null, __('Are you sure you want to delete # %s?', $topic['Topic']['id'])); ?>
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
        <li><?php echo $this->Html->link(__('New Topic'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>
    </ul>
</div>
