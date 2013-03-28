<?php echo $this->Html->addCrumb(__('My Bodies of Knowledge'), '/bodyKnowledges'); ?>
<?php echo $this->Html->addCrumb($bodyKnowledge['BodyKnowledge']['name']); ?>

<div class="smallMenu">
    <?php echo $this->Form->postLink($this->Html->image('delete-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Delete'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Delete'))), array('action' => 'delete', $bodyKnowledge['BodyKnowledge']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $bodyKnowledge['BodyKnowledge']['id'])); ?>
    <?php echo $this->Html->link($this->Html->image('edit-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Edit'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Edit'))), array('action' => 'edit', $bodyKnowledge['BodyKnowledge']['id']), array('escape' => false)); ?>
    <?php echo $this->Html->link($this->Html->image('previous-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Go back'), 'title' => __('Go back'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Go back'))), array('controller' => 'bodyKnowledges', 'action' => 'index'), array('escape' => false)); ?>
</div>

<div class="bodyKnowledges view">

    <?php // debug ($storedIDs); ?>

    <?php // debug ($recievedIDs); ?>

    <?php // debug ($removedIDs); ?>

    <?php // debug ($requestData); ?>

    <h2><?php echo __(h($bodyKnowledge['BodyKnowledge']['name'])); ?></h2>
    <?php echo $this->Html->tag('br'); ?>
    <?php echo $this->Html->tag('br'); ?>

    <?php echo $this->Html->tag('h3', __('Description') . ':'); ?>
    <?php echo $this->Html->tag('div', nl2br(h($bodyKnowledge['BodyKnowledge']['description'])), array('style' => 'padding-left: 20px; text-align: justify;')); ?>
    <?php echo $this->Html->tag('br'); ?>
    <?php echo $this->Html->tag('br'); ?>

    <?php
    echo $this->Html->tag('h3', __('Knowledge Areas') . ':', array('style' => 'float:left;'));
    $linkText = __('Add Knowledge Area');
    $controller = 'bodyKnowledges';
    $action = 'add_knowledge_area/' . $bodyKnowledge['BodyKnowledge']['id'];
    $image = 'add-icon.png';
    $width = '24';
    $border = '0';
    echo $this->Html->link($linkText, array('controller' => $controller, 'action' => $action), array('class' => 'rightTitle'));
    echo $this->Html->link($this->Html->image($image, array('class' => 'rightIcon', 'width' => $width, 'alt' => $linkText, 'border' => $border)), array(), array('escape' => false));
    ?>


    <ol style="clear: both;">
        <?php
        $knowledgeAreas = $bodyKnowledge['KnowledgeArea'];
        foreach ($knowledgeAreas as $knowledgeArea):
            echo $this->Html->tag('li', '<span>' . $this->Html->link($knowledgeArea['name'] . ' (' . $knowledgeArea['abbreviation'] . ')', array('controller' => 'knowledgeAreas', 'action' => 'view', $knowledgeArea['id']), array('class' => 'simpleLink', 'style' => 'text-align: justify;', 'rel' => 'tooltip', 'title' => 'Click to view')) . '</span>', array('style' => 'text-align: justify;'));
        endforeach;
        ?>
    </ol>
</div>
<!--<div class="actions">-->
    <!--<h3><?php echo __('Actions'); ?></h3>-->
    <!--<ul>-->
        <!--<li><?php echo $this->Html->link(__('Edit Body of Knowledge'), array('action' => 'edit', $bodyKnowledge['BodyKnowledge']['id'])); ?> </li>-->
        <!--<li><?php echo $this->Html->link(__('Add Knowledge Area'), array('action' => 'add_knowledge_area', $bodyKnowledge['BodyKnowledge']['id'])); ?> </li>-->
        <!--<li><?php echo $this->Form->postLink(__('Delete Body of Knowledge'), array('action' => 'delete', $bodyKnowledge['BodyKnowledge']['id']), null, __('Are you sure you want to delete # %s?', $bodyKnowledge['BodyKnowledge']['id'])); ?> </li>-->
        <!--<li><?php echo $this->Html->link(__('My Bodies of Knowledge'), array('action' => 'index')); ?> </li>-->
        <!--<li><?php echo $this->Html->link(__('New Body of Knowledge'), array('action' => 'add')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'));  ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'));  ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index'));  ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add'));  ?> </li>-->
    <!--</ul>-->
<!--</div>-->
