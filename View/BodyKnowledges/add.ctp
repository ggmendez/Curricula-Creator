<?php echo $this->Html->addCrumb(__('Bodies of Knowledge'), '/bodyKnowledges'); ?>
<?php echo $this->Html->addCrumb(__('Create New Body of Knowledge')); ?>

<div class="smallMenu">
    <?php echo $this->Html->link($this->Html->image('cancel-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Cancel'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Cancel'))), array('controller' => 'bodyKnowledges', 'action' => 'index'), array('escape' => false, 'id' => 'cancel-button')); ?>
    <?php echo $this->Html->link($this->Html->image('save-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Save'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Save'))), '', array('escape' => false, 'id' => 'save-button')); ?>
</div>

<div class="bodyKnowledges form">

    <script>

        $(document).ready(function() {

        $("#save-button").click(function(event) {
                $('#BodyKnowledgeAddForm').submit();
                event.preventDefault();
            });
            
        
        $("#cancel-button").click(function(event) {
                if (!confirm('<?php echo __('Are you sure you want to cancel this operation?'); ?>')) {
                    event.preventDefault();
                }
            });


            $globalCounter = 0;

            $("#add-knowledge-area").click(function(event) {
                var id = $globalCounter + 1;
                $globalCounter = $globalCounter + 1;
                var inputHtml = '<li style="margin-bottom: 180px;"><div class="required inputsRow" id="divKnowledgeArea' + id + 'Name" style="height:155px; clear:both;">';
                inputHtml += '<label for="theKnowledgeArea' + id + 'Name"><?php echo __('Name') . ':'; ?></label>';
                inputHtml += '<input style="width: 63%;" id="theKnowledgeArea' + id + 'Name" type="text" required="required" name="data[KnowledgeArea][' + id + '][name]" />';

                inputHtml += '<input style="width: 40px; float:right;" id="theKnowledgeArea' + id + 'Abbreviation" type="text" required="required" name="data[KnowledgeArea][' + id + '][abbreviation]" />';
                inputHtml += '<label style="float:right;" for="theKnowledgeArea' + id + 'Abbreviation"><?php echo __('Abbreviation') . ':'; ?></label>';

                inputHtml += '<label for="theKnowledgeArea' + id + 'Description" style="clear:both; margin-top: 20px;"><?php echo __('Description') . ':'; ?></label>';
                inputHtml += '<textarea id="theKnowledgeArea' + id + 'Description"  rows="3" cols="30" name="data[KnowledgeArea][' + id + '][description]"></textarea>';
                inputHtml += '</div>';

                inputHtml += '<img id = "KnowledgeArea' + id + 'Name" src="../img/delete-icon.png" class="remove-button" width="22" alt="<?php echo __('Remove'); ?>" border="0" style="float:right; margin-right: 4%;" rel="rightTooltip" title="<?php echo __('Remove'); ?>">';

                inputHtml += '</div>';
                inputHtml += '</li>';
                
                $('#knowledgeAreasList').append(inputHtml);
                
                bindTargetFunctions('"KnowledgeArea' + id + 'Name"');
                
                event.preventDefault();
            });

            $("#knowledgeAreasList").delegate(".remove-button", "click", function(event) {
                if (confirm('Are you sure you want to delete this knowledge area ' + event.target.id + ' ?')) {
                    $('#div' + event.target.id).parent().remove();
                }
                event.preventDefault();
            });
        });


    </script>

    <?php echo $this->Form->create('BodyKnowledge'); ?>
    <fieldset>
        <legend><?php echo __('Create New Body of Knowledge'); ?></legend>
        <?php
        $dataPt = $this->Form->input('name', array('label' => __('Name') . ':', 'div' => false, 'class' => 'pepe'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));

        $dataPt = $this->Form->input('description', array('label' => __('Description') . ':', 'div' => false, 'class' => 'pepe muchText'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));
        ?>        

        <div id="theKnowledgeAreas" class="generalContainer">

            <?php echo $this->Html->tag('label', '<b>' . __('Knowledge Areas') . ':&nbsp;</b>', array('style' => 'clear:both;')); ?>




            <?php
            $linkText = __('Add Knowledge Area');
            $image = 'add-icon.png';
            $width = '24';
            $border = '0';
            echo $this->Html->link($linkText, '', array('class' => 'rightTitle', 'target' => '_blank', 'id' => 'add-knowledge-area', 'style' => 'float:right;'));
            echo $this->Html->image($image, array('class' => 'rightIcon', 'width' => $width, 'alt' => $linkText, 'border' => $border));
            ?>

            <br />


            <?php // echo $this->Html->link(__('Add Knowledge Area'), '', array('target' => '_blank', 'id' => 'add-knowledge-area', 'style' => 'float:right;'));  ?>

            <?php
            echo $this->Html->tag('br');
            echo $this->Html->tag('br');
            ?>

            <ol id="knowledgeAreasList">

            </ol>

        </div>

    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<!--<div class="actions">-->
    <!--<h3><?php echo __('Actions'); ?></h3>-->
    <!--<ul>-->

        <!--<li><?php echo $this->Html->link(__('List Body of Knowledges'), array('action' => 'index')); ?></li>-->
        <!--<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>-->
        <!--<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>-->
        <!--<li><?php echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>-->
        <!--<li><?php echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>-->
    <!--</ul>-->
<!--</div>-->
