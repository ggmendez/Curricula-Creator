<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php echo $this->Form->input('username', array('maxlength' => 10, 'class' => 'pepe loginElement',));
        echo $this->Form->input('password', array('maxlength' => 20, 'class' => 'pepe loginElement',));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>