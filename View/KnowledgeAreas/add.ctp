<div class="knowledgeAreas form">
    <?php echo $this->Form->create('KnowledgeArea'); ?>
    <fieldset>
        <legend><?php echo __('Add Knowledge Area'); ?></legend>
        <?php
        $dataPt = $this->Form->input('name', array('label' => __('Name').':', 'div' => false, 'class' => 'pepe'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));

        echo $this->Form->input('abbreviation', array('label' => __('Abbreviation').':', 'class' => 'digitInput', 'maxlength' => '2'));
        
        $dataPt = $this->Form->input('description', array('label' => __('Description').':', 'div' => false, 'class' => 'pepe veryMuchText'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Knowledge Areas'), array('action' => 'index')); ?></li>
    </ul>
</div>
