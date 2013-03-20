<?php echo $this->Html->addCrumb('My Bodies of Knowledge', '/bodyKnowledges'); ?>
<?php echo $this->Html->addCrumb($knowledgeArea['BodyKnowledge']['name'], '/bodyKnowledges/view/' . $knowledgeArea['BodyKnowledge']['id']); ?>
<?php echo $this->Html->addCrumb('Edit ' . $knowledgeArea['KnowledgeArea']['name']); ?>

<div class="knowledgeAreas form">
    
     <?php echo $this->Html->script('jquery-1.9.1.min.js', false); ?>

    <script>

        $(document).ready(function() {
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
        $dataPt = $this->Form->input('name', array('label' => 'Name:', 'div' => false, 'class' => 'inLineInput', 'style' => 'width:60%; margin-bottom:0px;'));


        $dataPt .= $this->Form->input('abbreviation', array('label' => false, 'style' => 'float:right; height: 20px; margin-top:-5px; margin-left:10px; margin-bottom:0px;', 'div' => false, 'class' => 'digitInput', 'maxlength' => '2'));

        $dataPt .= $this->Html->tag('label', __('Abreviation') . ':', array('style' => 'float:right; height: 20px; margin-top:0px', 'div' => false));

        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));

        $dataPt = $this->Form->input('description', array('label' => 'Description:', 'div' => false, 'class' => 'pepe veryMuchText'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));
        ?> <div> <?php
            echo $this->Html->tag('label', '<b>' . __('Units') . ':</b>');
            $units = $knowledgeArea['Unit'];
            ?> <ol id="unitsList"  style="margin-top: 35px;"> <?php
            $i = 0;
            foreach ($units as $unit) {
                $dataPt = $this->Form->hidden("Unit.$i.id", array('value' => $unit['id']));
                $dataPt .= $this->Html->tag('span', $unit['name'], array('style' => 'text-align: justify; margin-top: 0px;'));
                $dataPt .= $this->Html->image('delete-icon.png', array('class' => 'delete-unit-from-knowledge-area', 'alt' => __('Delete Topic'), 'border' => '0', 'style' => 'float: left; margin-top: -1px; margin-left:-53px;', 'width' => '22', 'id' => 'Unit' . $i));
                echo $this->Html->tag('li', $dataPt, array('id' => 'liUnit' . $i, 'style' => 'margin-left: 50px; clear:both; margin-top: 18px;'));
                $i ++;
            }
            ?> </ol> 
        </div> 


    </fieldset>

    <div class="submit">
        <?php echo $this->Form->submit(__('Submit', true), array('name' => 'ok', 'div' => false)); ?>        
        <?php echo $this->Form->submit(__('Cancel', true), array('name' => 'cancel', 'div' => false)); ?>
    </div>

</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('KnowledgeArea.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('KnowledgeArea.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Knowledge Areas'), array('action' => 'index')); ?></li>
    </ul>
</div>
