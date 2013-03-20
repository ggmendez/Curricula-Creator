<div class="learningObjectives index">

    <?php

    function findKnowledgeAreaById($knoledgeAreas, $idToFind) {
        foreach ($knoledgeAreas as $knoledgeArea):
            if ($knoledgeArea['KnowledgeArea']['id'] == $idToFind) {
                return $knoledgeArea;
            }
        endforeach;
    }
    ?>

    <h2><?php echo __('Learning Objectives'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <!--<th><?php echo $this->Paginator->sort('id'); ?></th>-->
            <th><?php echo $this->Paginator->sort('description'); ?></th>
            <th><?php echo $this->Paginator->sort('unit_id'); ?></th>
            <th><?php echo $this->Paginator->sort('knowledge_area_id'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($learningObjectives as $learningObjective): ?>
            <tr>
                <!--<td><?php echo h($learningObjective['LearningObjective']['id']); ?>&nbsp;</td>-->
                <td style="text-align: justify;" ><?php echo h($learningObjective['LearningObjective']['description']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($learningObjective['Unit']['name'], array('controller' => 'units', 'action' => 'view', $learningObjective['Unit']['id'])); ?>
                </td>
                <td>
                    <?php
                    $theKnowledgeArea = findKnowledgeAreaById($knowledgeAreas, $learningObjective['Unit']['knowledge_area_id']);
                    echo $this->Html->link($theKnowledgeArea['KnowledgeArea']['name'], array('controller' => 'knowledgeAreas', 'action' => 'view', $learningObjective['Unit']['knowledge_area_id']));
                    ?>
                </td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $learningObjective['LearningObjective']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $learningObjective['LearningObjective']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $learningObjective['LearningObjective']['id']), null, __('Are you sure you want to delete # %s?', $learningObjective['LearningObjective']['id'])); ?>
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
        <li><?php echo $this->Html->link(__('New Learning Objective'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>
    </ul>
</div>
