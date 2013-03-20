<div class="bodyKnowledges form">
    <?php echo $this->Form->create('BodyKnowledge'); ?>
    <fieldset>
        <legend><?php echo __('Add Body of Knowledge'); ?></legend>
        <?php
        $dataPt = $this->Form->input('name', array('label' => 'Program Name:', 'div' => false, 'class' => 'pepe'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));

        $dataPt = $this->Form->input('description', array('label' => 'Description:', 'div' => false, 'class' => 'pepe muchText'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));
        ?>

        <div class="generalContainer">
            <?php echo $this->Html->tag('label', '<b>Knowledge Areas</b> (clic over <b>all</b> the options you want to select):'); ?>
            <br />
            <br />
            <div class="multipleOptionsPanel">
                <?php echo $this->Form->input('KnowledgeArea', array('class' => 'squaredTwo', 'div' => false, 'label' => false, 'type' => 'select', 'multiple' => 'checkbox')); ?>
            </div>
        </div> 

    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Body of Knowledges'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>
    </ul>
</div>
