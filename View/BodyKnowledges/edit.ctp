<?php echo $this->Html->addCrumb ('My Bodies of Knowledge', '/bodyKnowledges'); ?>
<?php echo $this->Html->addCrumb ('Edit ' . $bodyKnowledge['BodyKnowledge']['name']); ?>

<div class="bodyKnowledges form">

    <?php echo $this->Html->script('jquery-1.9.1.min.js', false); ?>

    <?php $globalCounter = count($bodyKnowledge['KnowledgeArea']); ?>

    <script>

        $(document).ready(function() {

            $initialId = <?php echo $globalCounter; ?>;

            $("#add-knowledge-area").click(function(event) {
                var id = $initialId + 1;
                $initialId = $initialId + 1;
                var inputHtml = '<li><div class="required inputsRow" id="divKnowledgeArea' + id + 'Name">';
                inputHtml += '<label for="theKnowledgeArea' + id + 'Name"><?php echo __('Name') . ':' ?></label>';
                inputHtml += '<input style="width: 63%;" id="theKnowledgeArea' + id + 'Name" type="text" required="required" name="data[KnowledgeArea][' + id + '][name]" />';

                inputHtml += '<input style="width: 40px; float:right;" id="theKnowledgeArea' + id + 'Abbreviation" type="text" required="required" name="data[KnowledgeArea][' + id + '][abbreviation]" />';
                inputHtml += '<label style="float:right;" for="theKnowledgeArea' + id + 'Abbreviation"><?php echo __('Abbreviation') . ':' ?></label>';
                inputHtml += '</div>';
                inputHtml += '<a id = KnowledgeArea' + id + 'Name class="delete-knowledge-area" >Delete</a>';
                inputHtml += '</div>';
                $('#knowledgeAreasList').append(inputHtml);
                event.preventDefault();
            });
            
            $("#add-knowledge-area-button").click(function(event) {
                var id = $initialId + 1;
                $initialId = $initialId + 1;
                var inputHtml = '<li><div class="required inputsRow" id="divKnowledgeArea' + id + 'Name">';
                inputHtml += '<label for="theKnowledgeArea' + id + 'Name"><?php echo __('Name') . ':' ?></label>';
                inputHtml += '<input style="width: 63%;" id="theKnowledgeArea' + id + 'Name" type="text" required="required" name="data[KnowledgeArea][' + id + '][name]" />';

                inputHtml += '<input style="width: 40px; float:right;" id="theKnowledgeArea' + id + 'Abbreviation" type="text" required="required" name="data[KnowledgeArea][' + id + '][abbreviation]" />';
                inputHtml += '<label style="float:right;" for="theKnowledgeArea' + id + 'Abbreviation"><?php echo __('Abbreviation') . ':' ?></label>';
                inputHtml += '</div>';
                inputHtml += '<a id = KnowledgeArea' + id + 'Name class="delete-knowledge-area" >Delete</a>';
                inputHtml += '</div>';
                $('#knowledgeAreasList').append(inputHtml);
                event.preventDefault();
            });

            $("#knowledgeAreasList").delegate(".delete-knowledge-area", "click", function(event) {
                if (confirm('Are you sure you want to delete this knowledge area ' + event.target.id + ' ?')) {
                    $('#div' + event.target.id).parent().remove();
                }
                event.preventDefault();
            });
        });


    </script>

    <?php echo $this->Form->create('BodyKnowledge'); ?>
    <fieldset>
        <legend><?php echo __('Edit Body of Knowledge'); ?></legend>
        <?php
        echo $this->Form->input('id');
        $dataPt = $this->Form->input('name', array('label' => 'Program Name:', 'div' => false, 'class' => 'pepe'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));

        $dataPt = $this->Form->input('description', array('label' => 'Description:', 'div' => false, 'class' => 'pepe muchText'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));
        ?>

        <div id="theKnowledgeAreas" class="generalContainer">

            <?php echo $this->Html->tag('label', '<b>' . __('Knowledge Areas') . ':&nbsp;</b>'); ?>
            <?php echo $this->Html->link(__('Add Knowledge Area'), '', array('target' => '_blank', 'id' => 'add-knowledge-area', 'style' => 'float:right;')); ?>

            <?php
            echo $this->Html->tag('br');
            echo $this->Html->tag('br');
            ?>

            <?php $knowledgeAreas = $bodyKnowledge['KnowledgeArea'] ?> 

            <ol id="knowledgeAreasList">

                <?php
                $i = 0;
                foreach ($knowledgeAreas as $knowledgeArea) {
                    ?> 
                    <li>
                        <?php
                        $dataPt = $this->Html->tag('label', __('Name') . ':', array('div' => false, 'for' => 'theKnowledgeArea' . $i . 'Name'));
                        $dataPt .= $this->Form->hidden("KnowledgeArea.$i.id", array('value' => $knowledgeArea['id']));
                        $dataPt .= $this->Form->input("KnowledgeArea.$i.name", array('type' => 'text', 'label' => false, 'div' => false, 'id' => 'theKnowledgeArea' . $i . 'Name', 'name' => 'data[KnowledgeArea][' . $i . '][name]', 'style' => 'width: 63%;'));
                        $dataPt .= $this->Form->input("KnowledgeArea.$i.abbreviation", array('type' => 'text', 'label' => false, 'div' => false, 'id' => 'theKnowledgeArea' . $i . 'Abbreviation', 'name' => 'data[KnowledgeArea][' . $i . '][abbreviation]', 'style' => 'width: 40px; float:right;'));
                        $dataPt .= $this->Html->tag('label', __('Abbreviation') . ':', array('div' => false, 'style' => 'float:right;', 'for' => 'theKnowledgeArea' . $i . 'Abbreviation'));
                        $dataPt = $this->Html->tag('div', $dataPt, array('class' => 'required inputsRow', 'id' => 'divKnowledgeArea' . $i . 'Name'));

                        echo $dataPt .= $this->Html->link(__('Delete'), '', array('class' => 'delete-knowledge-area', 'id' => 'KnowledgeArea' . $i . 'Name'));
                        ?>
                    </li>
                    
                    
                    <?php
                    
                    $i++;
                }
                ?>


            </ol>

        </div>

    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Add Knowledge Area'), '', array('target' => '_blank', 'id' => 'add-knowledge-area-button')); ?></li>
        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BodyKnowledge.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BodyKnowledge.id'))); ?></li>
        <li><?php echo $this->Html->link(__('My Bodies of Knowledge'), array('action' => 'index')); ?> </li>
        <!--<li><?php // echo $this->Html->link(__('List Body of Knowledges'), array('action' => 'index')); ?></li>-->
        <!--<li><?php // echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>-->
    </ul>
</div>
