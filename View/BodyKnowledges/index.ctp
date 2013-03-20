<?php echo $this->Html->addCrumb(__('My Bodies of Knowledge')); ?>

<div class="bodyKnowledges index">
    <h2><?php echo __('Bodies of Knowledge'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <!--<th><?php // echo $this->Paginator->sort('id');  ?></th>-->
            <th style="width: 35%;" ><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('description'); ?></th>
            <!--<th class="actions"><?php // echo __('Actions');  ?></th>-->
        </tr>
        <?php foreach ($bodyKnowledges as $bodyKnowledge): ?>
            <tr>
                <!--<td>-->
                <?php // echo $this->Html->link($bodyKnowledge['BodyKnowledge']['id'], array('controller' => 'users', 'action' => 'view', $bodyKnowledge['User']['id'])); ?>
                <!--</td>-->
                <td style="text-align: left;"><?php echo $this->Html->link(h($bodyKnowledge['BodyKnowledge']['name']), array('action' => 'view', $bodyKnowledge['BodyKnowledge']['id']), array('class' => 'simpleLink', 'style' => 'padding-left: 5px;')) ?>&nbsp;</td>


                <?php
                $maxLength = 350;

                $storedDescription = $bodyKnowledge['BodyKnowledge']['description'];
                if (strlen($storedDescription) > $maxLength) {
                    $storedDescription = trim(substr($storedDescription, 0, $maxLength)) . ' [...]';
                }
                ?> 

                <td style="text-align: justify; overflow-y: hidden; height: 10px; "><?php echo h($storedDescription); ?>&nbsp;</td>
                <!--<td class="actions">-->
    <?php // echo $this->Html->link(__('View'), array('action' => 'view', $bodyKnowledge['BodyKnowledge']['id']));  ?>
                <?php // echo $this->Html->link(__('Edit'), array('action' => 'edit', $bodyKnowledge['BodyKnowledge']['id']));  ?>
                <?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bodyKnowledge['BodyKnowledge']['id']), null, __('Are you sure you want to delete # %s?', $bodyKnowledge['BodyKnowledge']['id'])); ?>
                <!--</td>-->
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
        <li><?php echo $this->Html->link(__('New Body of Knowledge'), array('action' => 'add')); ?></li>
        <!--<li><?php // echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'));  ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'));  ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index'));  ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add'));  ?> </li>-->
    </ul>
</div>
