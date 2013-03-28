<?php echo $this->Html->addCrumb('My profile', '/users/view/' . $user['User']['id']); ?>
<?php echo $this->Html->addCrumb ('Editing ' . $user['User']['display_name'] . '\'s Profile'); ?>

<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Edit My Profile'); ?></legend>
        <?php
        echo $this->Form->input('id');
//		echo $this->Form->input('username');

        $dataPt = $this->Form->input('display_name', array('label' => __('Display Name') . ':', 'div' => false, 'class' => 'pepe'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));




        echo $this->Form->input('password', array('class' => 'inLineInput'));
//        echo $this->Form->input('role');
        ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<!--<div class="actions">-->
    <!--<h3><?php echo __('Actions'); ?></h3>-->
    <!--<ul>-->

        <!--<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>-->
        <!--<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>-->
    <!--</ul>-->
<!--</div>-->
