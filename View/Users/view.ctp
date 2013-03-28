<?php echo $this->Html->addCrumb('My Profile'); ?>

<div class="smallMenu">
    <?php echo $this->Form->postLink($this->Html->image('delete-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Delete'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Delete'))), array('action' => 'delete', $user['User']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
    <?php echo $this->Html->link($this->Html->image('edit-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Edit'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Edit'))), array('action' => 'edit', $user['User']['id']), array('escape' => false)); ?>
</div>

<div class="users view">
    
    <h2 style="text-align: center;"><?php echo h($user['User']['display_name'] . ' (' . $user['User']['username'] . ')'); ?></h2>

    <?php echo $this->Html->tag('br'); ?>
    <?php echo $this->Html->tag('h3', __('General Information') . ': '); ?>

    <div style="padding-left: 20px;">

        <?php echo $this->Html->tag('b', __('Username') . ': ') . $user['User']['username']; ?>
        
        <?php echo $this->Html->tag('br'); ?>
        <?php echo $this->Html->tag('br'); ?>
        
        <?php echo $this->Html->tag('b', __('Display Name') . ': ') . $user['User']['display_name']; ?>
        
        <?php echo $this->Html->tag('br'); ?>
        <?php echo $this->Html->tag('br'); ?>
        
        <?php echo $this->Html->tag('b', __('Role') . ': ') . $user['User']['role']; ?>
        
        <?php echo $this->Html->tag('br'); ?>
        <?php echo $this->Html->tag('br'); ?>
        
        <?php echo $this->Html->tag('b', __('Bodies of Knowledges created') . ': ') . '2'; ?>
        
        <?php echo $this->Html->tag('br'); ?>
        <?php echo $this->Html->tag('br'); ?>
        
        <?php echo $this->Html->tag('b', __('Courses created') . ': ') . '2'; ?>

        


    </div>
    
</div>
<!--<div class="actions">-->
	<!--<h3><?php // echo __('Actions'); ?></h3>-->
	<!--<ul>-->
		<!--<li><?php // echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>-->
		<!--<li><?php // echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>-->
		<!--<li><?php // echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>-->
		<!--<li><?php // echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>-->
	<!--</ul>-->
<!--</div>-->
