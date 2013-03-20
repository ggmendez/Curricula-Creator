<?php // debug($unit);  ?>
<?php // debug($knowledgeArea);  ?>


<?php echo $this->Html->addCrumb('My Bodies of Knowledge', '/bodyKnowledges'); ?>
<?php echo $this->Html->addCrumb($knowledgeArea['BodyKnowledge']['name'], '/bodyKnowledges/view/' . $knowledgeArea['BodyKnowledge']['id']); ?>
<?php echo $this->Html->addCrumb($unit['KnowledgeArea']['name'], '/knowledgeAreas/view/' . $knowledgeArea['KnowledgeArea']['id']); ?>
<?php echo $this->Html->addCrumb($unit['Unit']['name'], '/units/view/' . $unit['Unit']['id']); ?>
<?php echo $this->Html->addCrumb(__('Add Learning Objective')); ?>

<div class="learningObjectives form">
    <?php echo $this->Form->create('LearningObjective'); ?>
    <fieldset>
        <legend><?php echo __('Add Learning Objective'); ?></legend>
        <?php

        $dataPt = $this->Form->input('description', array('label' => __('Description') . ':', 'div' => false, 'class' => 'inLineInput', 'style' => 'width: 45%;'));

        $dataPt .= $this->Form->input('unit_id', array('type' => 'text', 'value' => $unit['Unit']['name'], 'enable' => false, 'div' => false, 'label' => __('Unit') . ':', 'class' => 'inLineShortInput', 'disabled' => 'disabled', 'style' => 'width:28%;'));

        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required', 'style' => 'margin-bottom: -1em;'));
        
        
        $dataPt = $this->Form->input('topic_type_id', array('div' => false, 'label' => __('Type') . ':', 'class' => 'inLineList'));                
        
        $dataPt = $this->Form->input('topic_type_id', array('div' => false, 'label' => __('Type') . ':', 'class' => 'inLineList', 'style' => 'margin-right: 50px;'));
        
        $dataPt .= $this->Form->input('mastery_level_id', array('div' => false, 'label' => __('Mastery Level') . ':', 'class' => 'inLineList'));
        
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required', 'style' => 'margin-bottom: -1em;'));
        
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Save')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Learning Objectives'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>
    </ul>
</div>
