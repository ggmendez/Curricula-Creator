<?php echo $this->Html->addCrumb(__('My Bodies of Knowledge'), '/bodyKnowledges'); ?>
<?php echo $this->Html->addCrumb($knowledgeArea['BodyKnowledge']['name'], '/bodyKnowledges/view/' . $knowledgeArea['BodyKnowledge']['id']); ?>
<?php echo $this->Html->addCrumb($knowledgeArea['KnowledgeArea']['name'], '/knowledgeAreas/view/' . $knowledgeArea['KnowledgeArea']['id']); ?>
<?php echo $this->Html->addCrumb(__('Add Unit')); ?>

<div class="smallMenu">    
    <?php echo $this->Html->link($this->Html->image('cancel-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Cancel'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Cancel'))), array('controller' => 'knowledge_areas', 'action' => 'view', $knowledgeArea['KnowledgeArea']['id']), array('escape' => false, 'id' => 'cancel-button')); ?>
    <?php echo $this->Html->link($this->Html->image('save-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Save'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Save'))), array('action' => 'edit', $knowledgeArea['KnowledgeArea']['id']), array('escape' => false)); ?>
</div>

<div class="units form">

    
    

    <script>

        $(document).ready(function() {

            $("#cancel-button").click(function(event) {
                if (!confirm('<?php echo __('Are you sure you want to cancel this operation?'); ?>')) {
                    event.preventDefault();
                }
            });


            $globalCounter = 0;
            <?php $globalCounter = 0; ?>


            $("#add-topic").click(function(event) {
                var id = $globalCounter + 1;
                $globalCounter = $globalCounter + 1;

                var inputHtml = '<li style="margin-bottom: 50px;">';
                inputHtml += '<div id="divTopic' + id + 'Name" class="inputsRow">';
                inputHtml += '<div style="margin-bottom: -1em;" class="longField required">';
                inputHtml += '<label style="margin-top: 18px; height: 32px; float:left; margin-right: 0px;"> <?php echo __('Name') ?>:</label>';
                inputHtml += '<input type="text" id="theTopic' + id + 'Name" style="margin-top: 11px; width:60%;" class="inLineInput" name="data[Topic][' + id + '][name]">';
                inputHtml += '<select id="topic_type_id' + id + '" style="margin-top: 11px; height: 32px; float:right; margin-right: 11px;" class="inLineList" name="data[Topic][' + id + '][topic_type_id]">';

                <?php foreach ($topicTypes as $topicType): ?>
                    inputHtml += '<option value="<?php echo $topicType['TopicType']['id'] ?>"><?php echo $topicType['TopicType']['name'] ?></option>';
                <?php endforeach ?>

                inputHtml += '</select>';
                inputHtml += '<label style="margin-top: 18px; height: 32px; float:right; margin-right: 0px;"><?php echo __('Type') ?>:</label>';
                inputHtml += '</div></div>';
                inputHtml += '<img id = "Topic' + id + 'Name" src="../../webroot/img/delete-icon.png" class="delete-topic" width="22" alt="<?php echo __('Remove'); ?>" border="0" style="margin-right: 37px;" rel="rightTooltip" title="<?php echo __('Remove'); ?>">';

                inputHtml += '</li>';

                $('#topicsList').append(inputHtml);
                
                bindTargetFunctions('"Topic' + id + 'Name"');
                
                event.preventDefault();
            });

            $("#topicsList").delegate(".delete-topic", "click", function(event) {
                if (confirm('Are you sure you want to delete topic ' + event.target.id + ' ?')) {
                    $('#div' + event.target.id).parent().remove();
                }
                event.preventDefault();
            });


            $("#add-learning-objective").click(function(event) {
                var id = $globalCounter + 1;
                $globalCounter = $globalCounter + 1;

                var inputHtml = '<li style="margin-bottom: 100px;">';

                inputHtml += '<div id="divLearningObjective' + id + 'Name" class="inputsRow" style="height: 74px; clear:both;">';

                inputHtml += '<div style="margin-bottom: -1em; margin-top: 1px;" class="longField required">';
                inputHtml += '<label style="margin-top: 18px; height: 32px; float:left; margin-right: 0px;"> <?php echo __('Name') ?>:</label>';
                inputHtml += '<input type="text" id="theLearningObjective' + id + 'Name" style="margin-top: 11px; margin-right: 11px; width:86%; float:right;" class="inLineInput" name="data[LearningObjective][' + id + '][description]">';
                inputHtml += '</div>';

                inputHtml += '<div style="margin-bottom: -1em; margin-top: 42px; clear:both;" class="longField required">';
                inputHtml += '<label style="margin-top: 18px; height: 32px; float:left; margin-right: 0px;"><?php echo __('Type') ?>:</label>';
                inputHtml += '<select id="learning_objective_type_id' + id + '" style="margin-top: 11px; height: 32px; float:left; margin-right: 11px;" class="inLineList" name="data[LearningObjective][' + id + '][topic_type_id]">';
                <?php foreach ($topicTypes as $topicType): ?>
                    inputHtml += '<option value="<?php echo $topicType['TopicType']['id'] ?>"><?php echo $topicType['TopicType']['name'] ?></option>';
                <?php endforeach ?>
                inputHtml += '</select>';

                inputHtml += '<label style="margin-top: 18px; height: 32px; float:left; margin-right: 0px;"><?php echo __('Mastery Level') ?>:</label>';
                inputHtml += '<select id="learning_objective_mastery_level_id' + id + '" style="margin-top: 11px; height: 32px; float:left; margin-right: 11px;" class="inLineList" name="data[LearningObjective][' + id + '][mastery_level_id]">';
                <?php foreach ($masteryLevels as $masteryLevel): ?>
                    inputHtml += '<option value="<?php echo $masteryLevel['MasteryLevel']['id'] ?>"><?php echo $masteryLevel['MasteryLevel']['name'] ?></option>';
                <?php endforeach ?>
                inputHtml += '</select>';

                inputHtml += '</div>';
                inputHtml += '</div>';
                
                inputHtml += '<img id = "LearningObjective' + id + 'Name" src="../../webroot/img/delete-icon.png" class="delete-learning-objective" width="22" alt="<?php echo __('Remove'); ?>" border="0" style="margin-right: 37px;" rel="rightTooltip" title="<?php echo __('Remove'); ?>">';

                inputHtml += '</li>';

                $('#learningObjectivesList').append(inputHtml);
                
                bindTargetFunctions('"LearningObjective' + id + 'Name"');
                
                event.preventDefault();

            });

            $("#learningObjectivesList").delegate(".delete-learning-objective", "click", function(event) {
                if (confirm('Are you sure you want to delete Learning Objective ' + event.target.id + ' ?')) {
                    $('#div' + event.target.id).parent().remove();
                }
                event.preventDefault();
            });

        });


    </script>

    <?php echo $this->Form->create('Unit'); ?>
    <fieldset>
        <legend><?php echo __('Add Unit'); ?></legend>
        <?php
        $dataPt = $this->Form->input('name', array('label' => __('Name') . ':', 'div' => false, 'class' => 'inLineInput', 'style' => 'width: 38%;'));
        
        $dataPt .= $this->Form->input('knowledge_area_id', array('type' => 'text', 'value' => $knowledgeArea['KnowledgeArea']['name'] . ' (' . $knowledgeArea['KnowledgeArea']['abbreviation'] . ')', 'enable' => false, 'div' => false, 'label' => __('Knowledge Area') . ':', 'class' => 'inLineShortInput', 'disabled' => 'disabled'));

        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required', 'style' => 'margin-bottom: -1em;'));

        echo $this->Form->input('core_tier_1_hours', array('label' => __('Core-Tier1 hours') . ':', 'class' => 'digitInput', 'maxlength' => '1'));

        echo $this->Form->input('core_tier_2_hours', array('label' => __('Core-Tier2 hours') . ':', 'class' => 'digitInput', 'maxlength' => '1'));
        ?>

        <div class="radio-toolbar">
            <?php
            $options = array(__('Yes') => __('Yes'), __('No') => __('No'));
            $attributes = array('legend' => false, 'class' => 'input required', 'value' => __('Yes'));
//            echo $this->Html->tag('label', __('Includes Electives?') . ':', array('class' => 'required', 'id' => 'radioButtonLegend')) . $this->Form->radio('includes_electives', $options, $attributes);
            ?>
        </div>


        <?php
        ?>




        <div id="unitTopics" class="generalContainer" style="margin-top: -30px;">

            <?php echo $this->Html->tag('label', '<b>' . __('Topics') . ':&nbsp;</b>', array('style' => 'clear:both;')); ?>
            <?php
            $linkText = __('Add Topic');
            $image = 'add-icon.png';
            $width = '24';
            $border = '0';
            echo $this->Html->link($linkText, '', array('class' => 'rightTitle', 'target' => '_blank', 'id' => 'add-topic', 'style' => 'float:right;'));
            echo $this->Html->image($image, array('class' => 'rightIcon', 'width' => $width, 'alt' => $linkText, 'border' => $border));
            ?>                        

            <?php
            echo $this->Html->tag('br');
            echo $this->Html->tag('br');
            ?>

            <ol id="topicsList">

            </ol>

        </div>

        <div id="unitLearningObjectives" class="generalContainer" style="margin-top: 0px;">

            <?php echo $this->Html->tag('label', '<b>' . __('Learning Objectives') . ':&nbsp;</b>', array('style' => 'clear:both;')); ?>
            <?php
            $linkText = __('Add Learning Objective');
            $image = 'add-icon.png';
            $width = '24';
            $border = '0';
            echo $this->Html->link($linkText, '', array('class' => 'rightTitle', 'target' => '_blank', 'id' => 'add-learning-objective', 'style' => 'float:right;'));
            echo $this->Html->image($image, array('class' => 'rightIcon', 'width' => $width, 'alt' => $linkText, 'border' => $border));
            ?>  


            <?php
            echo $this->Html->tag('br');
            echo $this->Html->tag('br');
            ?>

            <ol id="learningObjectivesList">

            </ol>

        </div>


    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<!--<div class="actions">-->
    <!--<h3><?php echo __('Actions'); ?></h3>-->
    <!--<ul>-->
        <!--<li><?php echo $this->Html->link(__('Add Topic'), '', array('target' => '_blank', 'id' => 'add-topic-button')); ?></li>-->
        <!--<li><?php echo $this->Html->link(__('Add Learning Objective'), '', array('target' => '_blank', 'id' => 'add-learning-objective-button')); ?></li>-->
    <!--</ul>-->
<!--</div>-->
