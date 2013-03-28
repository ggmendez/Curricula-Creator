<?php echo $this->Html->addCrumb (__('My Bodies of Knowledge'), '/bodyKnowledges'); ?>
<?php echo $this->Html->addCrumb (__('Edit') . ' ' . $bodyKnowledge['BodyKnowledge']['name']); ?>

<div class="smallMenu">    
    <?php echo $this->Html->link($this->Html->image('cancel-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Cancel'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Cancel'))), array('controller' => 'bodyKnowledges', 'action' => 'view', $bodyKnowledge['BodyKnowledge']['id']), array('escape' => false, 'id' => 'cancel-button')); ?>
    <?php echo $this->Html->link($this->Html->image('save-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Save'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Save'))), array('action' => 'edit', $bodyKnowledge['BodyKnowledge']['id']), array('escape' => false, 'id' => 'save-button')); ?>
</div>

<div class="bodyKnowledges form">

    

    <?php $globalCounter = count($bodyKnowledge['KnowledgeArea']); ?>

    <script>

        $(document).ready(function() {
          
        
            $("#save-button").click(function(event) {
                $('#BodyKnowledgeEditForm').submit();
                event.preventDefault();
            });

            $("#cancel-button").click(function(event) {
                if (!confirm('Are you sure you want to cancel the edition of this Body of Knowledge?')) {
                    event.preventDefault();
                }
            });

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
//                    $('#div' + event.target.id).parent().remove();
                    $('#li' + event.target.id).remove();
                    $(event.target.id).remove_tooltip();
                    
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
        $dataPt = $this->Form->input('name', array('label' => __('Name') . ':', 'div' => false, 'class' => 'pepe'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));

        $dataPt = $this->Form->input('description', array('label' => __('Description') . ':', 'div' => false, 'class' => 'pepe muchText'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));
        ?>
        
        <?php $knowledgeAreas = $bodyKnowledge['KnowledgeArea'] ?> 
        
        
        <div> <?php
            echo $this->Html->tag('label', '<b>' . __('Knowledge Areas') . ':</b>');            
            ?> <ol id="knowledgeAreasList"  style="margin-top: 35px;"> <?php
            $i = 0;
            foreach ($knowledgeAreas as $knowledgeArea) {
                $dataPt = $this->Html->image('delete-icon.png', array('class' => 'delete-knowledge-area', 'alt' => __('Delete Topic'), 'border' => '0', 'style' => 'float: left; margin-top: -1px; margin-left:-64px;', 'width' => '22', 'id' => 'KnowledgeArea' . $i, 'rel' => 'leftTooltip', 'title' => __('Remove')));
                $dataPt .= $this->Form->hidden("KnowledgeArea.$i.id", array('value' => $knowledgeArea['id']));
                $dataPt .= $this->Html->tag('span', $knowledgeArea['name'], array('style' => 'text-align: justify; margin-top: 0px;'));
                echo $this->Html->tag('li', $dataPt, array('id' => 'liKnowledgeArea' . $i, 'style' => 'margin-left: 50px; clear:both; margin-top: 18px;'));
                $i ++;
            }
            ?> </ol> 
        </div> 

        <!--<div id="theKnowledgeAreas" class="generalContainer">-->
            
            <?php // echo $this->Html->tag('label', '<b>' . __('Knowledge Areas') . ':&nbsp;</b>', array('style' => 'clear:both;')); ?>
            
            <?php
//            $linkText = __('Add Knowledge Area');
//            $image = 'add-icon.png';
//            $width = '24';
//            $border = '0';
//            echo $this->Html->link($linkText, '', array('class' => 'rightTitle', 'target' => '_blank', 'id' => 'add-knowledge-area', 'style' => 'float:right;'));
//            echo $this->Html->image($image, array('class' => 'rightIcon', 'width' => $width, 'alt' => $linkText, 'border' => $border));
            ?>

            <?php
//            echo $this->Html->tag('br');
//            echo $this->Html->tag('br');
            ?>

            

            <!--<ol id="knowledgeAreasList">-->

                <?php
                $i = 0;
//                foreach ($knowledgeAreas as $knowledgeArea) {
                    ?> 
                    <!--<li>-->
                        <?php
//                        $dataPt = $this->Html->tag('label', __('Name') . ':', array('div' => false, 'for' => 'theKnowledgeArea' . $i . 'Name'));
//                        $dataPt .= $this->Form->hidden("KnowledgeArea.$i.id", array('value' => $knowledgeArea['id']));
//                        $dataPt .= $this->Form->input("KnowledgeArea.$i.name", array('type' => 'text', 'label' => false, 'div' => false, 'id' => 'theKnowledgeArea' . $i . 'Name', 'name' => 'data[KnowledgeArea][' . $i . '][name]', 'style' => 'width: 63%;'));
//                        $dataPt .= $this->Form->input("KnowledgeArea.$i.abbreviation", array('type' => 'text', 'label' => false, 'div' => false, 'id' => 'theKnowledgeArea' . $i . 'Abbreviation', 'name' => 'data[KnowledgeArea][' . $i . '][abbreviation]', 'style' => 'width: 40px; float:right;'));
//                        $dataPt .= $this->Html->tag('label', __('Abbreviation') . ':', array('div' => false, 'style' => 'float:right;', 'for' => 'theKnowledgeArea' . $i . 'Abbreviation'));
//                        $dataPt = $this->Html->tag('div', $dataPt, array('class' => 'required inputsRow', 'id' => 'divKnowledgeArea' . $i . 'Name'));
//                        $dataPt .= $this->Html->image('delete-icon.png', array('id' => 'KnowledgeArea' . $i . 'Name', 'class' => 'delete-knowledge-area', 'alt' => __('Remove'), 'border' => '0', 'style' => 'margin-right: 37px;', 'width' => '22', 'rel' => 'rightTooltip', 'title' => __('Remove')));                       
//                        echo $dataPt;

                        ?>
                    <!--</li>-->
                    
                    
                    <?php
                    
//                    $i++;
//                }
                ?>


            <!--</ol>-->

        <!--</div>-->

    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<!--<div class="actions">-->
    <!--<h3><?php echo __('Actions'); ?></h3>-->
    <!--<ul>-->

        <!--<li><?php // echo $this->Html->link(__('Add Knowledge Area'), '', array('target' => '_blank', 'id' => 'add-knowledge-area-button')); ?></li>-->
        <!--<li><?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BodyKnowledge.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BodyKnowledge.id'))); ?></li>-->
        <!--<li><?php // echo $this->Html->link(__('My Bodies of Knowledge'), array('action' => 'index')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('List Body of Knowledges'), array('action' => 'index')); ?></li>-->
        <!--<li><?php // echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>-->
    <!--</ul>-->
<!--</div>-->
