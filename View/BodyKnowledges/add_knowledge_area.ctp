<?php echo $this->Html->addCrumb ('My Bodies of Knowledge', '/bodyKnowledges'); ?>
<?php echo $this->Html->addCrumb ($bodyKnowledge['BodyKnowledge']['name'], '/bodyKnowledges/view/' . $bodyKnowledge['BodyKnowledge']['id']); ?>
<?php echo $this->Html->addCrumb ('Add Knowledge Area'); ?>

<div class="smallMenu">    
    <?php echo $this->Html->link($this->Html->image('cancel-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Cancel'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Cancel'))), array('controller' => 'bodyKnowledges', 'action' => 'view', $bodyKnowledge['BodyKnowledge']['id']), array('escape' => false, 'id' => 'cancel-button')); ?>
    <?php echo $this->Html->link($this->Html->image('save-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Save'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Save'))), array('action' => 'edit', $bodyKnowledge['BodyKnowledge']['id']), array('escape' => false, 'id' => 'save-button')); ?>
</div>



<script>

            $("#save-button").click(function(event) {
                $('#KnowledgeAreaAddKnowledgeAreaForm').submit();
                event.preventDefault();
            });

            $("#cancel-button").click(function(event) {
                if (!confirm('<?php echo __('Are you sure you want to cancel this operation?'); ?>')) {
                    event.preventDefault();
                }
            });

</script>

<div class="knowledgeAreas form">    
    
    <?php echo $this->Form->create('KnowledgeArea'); ?>
    <fieldset>
        <legend><?php echo __('Add Knowledge Area'); ?></legend>
        <?php
        
        
        $dataPt = $this->Form->input('name', array('label' => __('Name') . ':', 'div' => false, 'class' => 'inLineInput'));

        $dataPt .= $this->Form->input('body_knowledge_id', array('type' => 'text', 'value' => $bodyKnowledge['BodyKnowledge']['name'], 'enable' => false, 'div' => false, 'label' => __('Body of Knowledge') . ':', 'class' => 'inLineShortInput', 'disabled' => 'disabled', 'style' => 'width:28%;'));

        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required', 'style' => 'margin-bottom: -1em;'));
        
        echo $this->Form->input('abbreviation', array('label' => __('Abbreviation').':', 'class' => 'digitInput', 'maxlength' => '2'));
        
        $dataPt = $this->Form->input('description', array('label' => __('Description').':', 'div' => false, 'class' => 'pepe veryMuchText'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required', 'style' => 'margin-top: -30px;'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<!--<div class="actions">-->
    <!--<h3><?php echo __('Actions'); ?></h3>-->
    <!--<ul>-->

        <!--<li><?php echo $this->Html->link(__('List Knowledge Areas'), array('action' => 'index')); ?></li>-->
    <!--</ul>-->
<!--</div>-->
