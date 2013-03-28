<div class="programs form">
    <?php echo $this->Form->create('Program'); ?>
    <fieldset>
        <legend><?php echo __('Edit Program'); ?></legend>
        <?php
        echo $this->Form->input('id');

        $dataPt = $this->Form->input('name', array('label' => __('Name') . ':', 'div' => false, 'class' => 'pepe'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));

        $dataPt = $this->Form->input('description', array('label' => __('Description') . ':', 'div' => false, 'class' => 'pepe muchText'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));
        
        ?>

        <div class="generalContainer">
            <?php echo $this->Html->tag('label', __('Courses') . ':', array('class' => 'required')); ?>
            <br />
            <br />
            <div class="multipleOptionsPanel">
                <?php echo $this->Form->input(__('Course'), array('class' => 'squaredTwo', 'div' => false, 'label' => false, 'type' => 'select', 'multiple' => 'checkbox', 'selected' => $selectedCourses)); ?>
            </div>
        </div>
        
        
        
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Program.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Program.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Programs'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
    </ul>
</div>
