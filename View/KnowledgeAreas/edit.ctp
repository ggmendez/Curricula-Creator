<?php echo $this->Html->addCrumb('My Bodies of Knowledge', '/bodyKnowledges'); ?>
<?php echo $this->Html->addCrumb($knowledgeArea['BodyKnowledge']['name'], '/bodyKnowledges/view/' . $knowledgeArea['BodyKnowledge']['id']); ?>
<?php echo $this->Html->addCrumb('Edit ' . $knowledgeArea['KnowledgeArea']['name']); ?>

<div class="smallMenu">    
    <?php echo $this->Html->link($this->Html->image('cancel-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Cancel'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Cancel'))), array('controller' => 'knowledge_areas', 'action' => 'view', $knowledgeArea['KnowledgeArea']['id']), array('escape' => false, 'id' => 'cancel-button')); ?>
    <?php echo $this->Html->link($this->Html->image('save-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Save'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Save'))), '', array('escape' => false, 'id' => 'save-button')); ?>
</div>

<div class="knowledgeAreas form">
    
     

    <script>

        $(document).ready(function() {
            
            $("#save-button").click(function(event) {
                $('#KnowledgeAreaEditForm').submit();
                event.preventDefault();
            });
        
            $("#cancel-button").click(function(event) {
                if (!confirm('Are you sure you want to cancel the edition of this Knowledge Area?')) {
                    event.preventDefault();
                }
            });
        
            $("#unitsList").delegate(".delete-unit-from-knowledge-area", "click", function(event) {
                if (confirm('Are you sure you want to delete this unit from this knwoledge area ' + event.target.id + ' ?')) {
                    $('#li' + event.target.id).remove();
                }
                event.preventDefault();
            });
        });


    </script>
    
    
    <?php echo $this->Form->create('KnowledgeArea'); ?>
    <fieldset>
        <legend><?php echo __('Edit Knowledge Area'); ?></legend>
        <?php
        echo $this->Form->input('id');
        $dataPt = $this->Form->input('name', array('label' => __('Name') . ':', 'div' => false, 'class' => 'inLineInput', 'style' => 'width:60%; margin-bottom:0px;'));


        $dataPt .= $this->Form->input('abbreviation', array('label' => false, 'style' => 'float:right; height: 20px; margin-top:-5px; margin-left:10px; margin-bottom:0px;', 'div' => false, 'class' => 'digitInput', 'maxlength' => '2'));

        $dataPt .= $this->Html->tag('label', __('Abreviation') . ':', array('style' => 'float:right; height: 20px; margin-top:0px', 'div' => false));

        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));

        $dataPt = $this->Form->input('description', array('label' => __('Description') . ':', 'div' => false, 'class' => 'pepe veryMuchText'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));
        ?> <div> <?php
            echo $this->Html->tag('label', '<b>' . __('Units') . ':</b>');
            $units = $knowledgeArea['Unit'];
            ?> <ol id="unitsList"  style="margin-top: 35px;"> <?php
            $i = 0;
            foreach ($units as $unit) {
                $dataPt = $this->Form->hidden("Unit.$i.id", array('value' => $unit['id']));
                $dataPt .= $this->Html->tag('span', $unit['name'], array('style' => 'text-align: justify; margin-top: 0px;'));
                $dataPt .= $this->Html->image('delete-icon.png', array('class' => 'delete-unit-from-knowledge-area', 'alt' => __('Remove'), 'border' => '0', 'style' => 'float: left; margin-top: -1px; margin-left:-64px;', 'width' => '22', 'id' => 'Unit' . $i, 'rel' => 'leftTooltip', 'title' => __('Remove')));
                echo $this->Html->tag('li', $dataPt, array('id' => 'liUnit' . $i, 'style' => 'margin-left: 50px; clear:both; margin-top: 18px;'));
                $i ++;
            }
            ?> </ol> 
        </div> 

    </fieldset>

</div>
<!--<div class="actions">-->
    <!--<h3><?php echo __('Actions'); ?></h3>-->
    <!--<ul>-->

        <!--<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('KnowledgeArea.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('KnowledgeArea.id'))); ?></li>-->
        <!--<li><?php echo $this->Html->link(__('List Knowledge Areas'), array('action' => 'index')); ?></li>-->
    <!--</ul>-->
<!--</div>-->
