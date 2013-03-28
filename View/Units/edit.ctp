<?php echo $this->Html->addCrumb('My Bodies of Knowledge', '/bodyKnowledges'); ?>
<?php echo $this->Html->addCrumb($bodyKnowledge['BodyKnowledge']['name'], '/units'); ?>
<?php echo $this->Html->addCrumb($unit['KnowledgeArea']['name'], '/knowledge_areas/view/' . $unit['KnowledgeArea']['id']); ?>
<?php echo $this->Html->addCrumb('Edit ' . $unit['Unit']['name']); ?>

<div class="smallMenu">    
    <?php echo $this->Html->link($this->Html->image('cancel-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Cancel'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Cancel'))), array('controller' => 'units', 'action' => 'view', $unit['Unit']['id']), array('escape' => false, 'id' => 'cancel-button')); ?>
    <?php echo $this->Html->link($this->Html->image('save-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Save'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Save'))), array('action' => 'edit', $unit['Unit']['id']), array('escape' => false, 'id' => 'save-button')); ?>
</div>

<?php
$topics = $unit['Topic'];
$topicsCounter = count($topics);

$learningObjectives = $unit['LearningObjective'];
$learningObjectivesCounter = count($learningObjectives);
?>

<div class="units form">

    

    <script>

        $(document).ready(function() {

            $("#save-button").click(function(event) {
                $('#UnitEditForm').submit();
                event.preventDefault();
            });

            $("#cancel-button").click(function(event) {
                if (!confirm('Are you sure you want to cancel the edition of this Unit?')) {
                    event.preventDefault();
                }
            });
        
        
            $totalTopics = <?php echo $topicsCounter; ?>;
            $totalLearningObjectives = <?php echo $topicsCounter; ?>;
            
            <?php $globalCounter = 0; ?>


            $("#add-topic").click(function(event) {
                var id = $totalTopics + 1;
                $totalTopics = $totalTopics + 1;

                var inputHtml = '<li>';
                inputHtml += '<div id="divTopic' + id + 'Name" class="inputsRow">';
                inputHtml += '<div style="margin-bottom: -1em;" class="longField required">';
                inputHtml += '<label style="margin-top: 18px; height: 32px; float:left; margin-right: 0px;"> <?php echo __('Name') ?>:</label>';
                inputHtml += '<input type="text" id="theTopic' + id + 'Name" style="margin-top: 11px; width:60%;" class="inLineInput" name="data[Topic][' + id + '][name]">';
                inputHtml += '<select id="topic_type_id' + id + '" style="margin-top: 11px; height: 32px; float:right; margin-right: 11px;" class="inLineList" name="data[Topic][' + id + '][topic_type_id]">';

                <?php foreach ($availableTopicTypes as $availableTopicType): ?>
                    inputHtml += '<option value="<?php echo $availableTopicType['TopicType']['id'] ?>"><?php echo $availableTopicType['TopicType']['name'] ?></option>';
                <?php endforeach ?>

                inputHtml += '</select>';
                inputHtml += '<label style="margin-top: 18px; height: 32px; float:right; margin-right: 0px;"><?php echo __('Type') ?>:</label>';
                inputHtml += '</div></div>';
                inputHtml += '<img id = "Topic' + id + 'Name" src="../../webroot/img/delete-icon.png" class="delete-topic" width="22" alt="<?php echo __('Remove') ?>" border="0" style="margin-right: 37px;">';

                inputHtml += '</li>';

                $('#topicsList').append(inputHtml);
                event.preventDefault();
            });

            $("#topicsList").delegate(".delete-topic", "click", function(event) {
                if (confirm('Are you sure you want to delete topic ' + event.target.id + ' ?')) {
                    $('#div' + event.target.id).parent().remove();
                }
                event.preventDefault();
            });


            $("#add-learning-objective").click(function(event) {
                var id = $totalLearningObjectives + 1;
                $totalLearningObjectives = $totalLearningObjectives + 1;

                var inputHtml = '<li style="margin-bottom: 100px;">';

                inputHtml += '<div id="divLearningObjective' + id + 'Name" class="inputsRow" style="height: 76px; clear:both;">';

                inputHtml += '<div style="margin-bottom: -1em; margin-top: 1px;" class="longField required">';
                inputHtml += '<label style="margin-top: 18px; height: 32px; float:left; margin-right: 0px;"> <?php echo __('Name') ?> :</label>';
                inputHtml += '<input type="text" id="theLearningObjective' + id + 'Name" style="margin-top: 11px; margin-right: 11px; width:86%; float:right;" class="inLineInput" name="data[LearningObjective][' + id + '][description]">';
                inputHtml += '</div>';

                inputHtml += '<div style="margin-bottom: -1em; margin-top: 45px; clear:both;" class="longField required">';
                inputHtml += '<label style="margin-top: 18px; height: 32px; float:left; margin-right: 0px;"><?php echo __('Type') ?>:</label>';
                inputHtml += '<select id="learning_objective_type_id' + id + '" style="margin-top: 11px; height: 32px; float:left; margin-right: 11px;" class="inLineList" name="data[LearningObjective][' + id + '][topic_type_id]">';
                <?php foreach ($availableTopicTypes as $availableTopicType): ?>
                    inputHtml += '<option value="<?php echo $availableTopicType['TopicType']['id'] ?>"><?php echo $availableTopicType['TopicType']['name'] ?></option>';
                <?php endforeach ?>
                inputHtml += '</select>';




                inputHtml += '<label style="margin-top: 18px; height: 32px; float:left; margin-right: 0px;"><?php echo __('Mastery Level') ?>:</label>';
                inputHtml += '<select id="learning_objective_mastery_level_id' + id + '" style="margin-top: 11px; height: 32px; float:left; margin-right: 11px;" class="inLineList" name="data[LearningObjective][' + id + '][mastery_level_id]">';
                <?php foreach ($availableMasteryLevels as $availableMasteryLevel): ?>
                    inputHtml += '<option value="<?php echo $availableMasteryLevel['MasteryLevel']['id'] ?>"><?php echo $availableMasteryLevel['MasteryLevel']['name'] ?></option>';
                <?php endforeach ?>
                inputHtml += '</select>';

                inputHtml += '</div>';
                inputHtml += '</div>';

                inputHtml += '<img id = "LearningObjective' + id + 'Name" src="../../webroot/img/delete-icon.png" class="delete-learning-objective" width="22" alt="<?php echo __('Remove') ?>" border="0" style="margin-right: 37px;">';

                inputHtml += '</li>';

                $('#learningObjectivesList').append(inputHtml);
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
        <legend><?php echo __('Edit Unit'); ?></legend>
        <?php
        echo $this->Form->input('id');

        $dataPt = $this->Form->input('name', array('label' => __('Name') . ':', 'div' => false, 'class' => 'inLineInput'));

        $dataPt .= $this->Form->input('knowledge_area_id', array('div' => false, 'label' => __('Knowledge Area') . ':', 'class' => 'inLineList'));

        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required', 'style' => 'margin-bottom: -1em;'));

        echo $this->Form->input('core_tier_1_hours', array('label' => __('Core-Tier1 hours') . ':', 'class' => 'digitInput', 'maxlength' => '1'));

        echo $this->Form->input('core_tier_2_hours', array('label' => __('Core-Tier2 hours') . ':', 'class' => 'digitInput', 'maxlength' => '1'));
        ?>

        <!--<div class="radio-toolbar">-->
            <?php
//            $options = array(__('Yes') => __('Yes'), __('No') => __('No'));
//            $attributes = array('legend' => false, 'class' => 'input required');
//            echo $this->Html->tag('label', __('Includes Electives?') . ':', array('class' => 'required', 'id' => 'radioButtonLegend')) . $this->Form->radio('includes_electives', $options, $attributes);
            ?>
        <!--</div>-->







        <div id="unitTopics" class="generalContainer">

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
            if (count($topics) > 0) {

                echo $this->Html->tag('br');
                echo $this->Html->tag('br');
                $i = 0;
                ?>

                <ol id="topicsList">

                    <?php foreach ($topics as $topic) { ?> 

                        <li id="<?php echo 'liTopic' . $i . 'Name' ?>" style="margin-bottom: 55px;">

                            <?php                            
                            
                            $dataPt = $this->Html->tag('label', __('Name') . ':', array('style' => 'margin-top: 18px; height: 32px; float:left; margin-right: 0px;'));
                            $dataPt .= $this->Form->input("Topic.$i.name", array('label' => false, 'div' => false, 'class' => 'inLineInput', 'style' => 'margin-top: 11px; width:60%;'));
                            $dataPt .= $this->Form->hidden("Topic.$i.id", array('value' => $topic['id']));
                            
                            $dataPt .= $this->Form->input("Topic.$i.topic_type_id", array('label' => false, 'div' => false, 'class' => 'inLineList', 'style' => 'margin-top: 11px; height: 32px; float:right; margin-right: 11px;'));
                            
                            $dataPt .= $this->Html->tag('label', __('Type') . ':', array('style' => 'margin-top: 18px; height: 32px; float:right; margin-right: 0px;'));
                            
                            
                            $dataPt = $this->Html->tag('div', $dataPt, array('class' => 'longField required', 'style' => 'margin-bottom: -1em;'));
                            
                            
                            $dataPt = $this->Html->tag('div', $dataPt, array('class' => 'inputsRow', 'id' => 'divTopic' . $i . 'Name'));
                            
                            
                            $dataPt .= $this->Html->image('delete-icon.png', array('class' => 'delete-topic', 'alt' => __('Delete Topic'), 'border' => '0', 'style' => 'margin-right: 37px;', 'width' => '22', 'id' => 'Topic' . $i . 'Name', 'rel' => 'rightTooltip', 'title' => __('Remove')));
                            
                            echo $dataPt;
                            
                            
                            ?> 

                        </li>

                        <?php
                        $i++;
                    }
                    ?>

                </ol>

                <?php
            }
            ?>

        </div>

        <div id="unitLearningObjectives" class="generalContainer">

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
            if (count($learningObjectives) > 0) {

                echo $this->Html->tag('br');
                echo $this->Html->tag('br');
                $i = 0;
                ?>

                <ol id="learningObjectivesList">

                    <?php foreach ($learningObjectives as $learningObjective) { ?> 

                        <li id="<?php echo 'liLearningObjective' . $i . 'Name'; ?>"  style="margin-bottom: 100px;">

                            <?php
//                            $dataPt = $this->Form->input("LearningObjective.$i.description", array('label' => false, 'div' => false, 'class' => 'pepe learningObjective'));
//                            $dataPt .= $this->Form->hidden("LearningObjective.$i.id", array('value' => $learningObjective['id']));
//                            $dataPt .= '&nbsp';
//                            $dataPt .= $this->Html->link('Delete', '', array('class' => 'delete-learning-objective-button', 'id' => 'LearningObjective' . $i . 'Name'));
//                            echo $this->Html->tag('div', $dataPt, array('class' => 'longField required', 'id' => 'divLearningObjective' . $i . 'Name'));
//                            ?> 
                            
                            
                            
                            
                            <?php
                            
                            
                            
                            $dataPt = $this->Html->tag('label', __('Name') . ':', array('style' => 'margin-top: 18px; height: 32px; float:left; margin-right: 0px;'));
                            $dataPt .= $this->Form->input("LearningObjective.$i.description", array('label' => false, 'div' => false, 'class' => 'inLineInput', 'style' => 'margin-top: 11px; margin-right: 11px; width:86%; float:right;', 'id' => 'theLearningObjective' . $i . 'Description'));
                            $dataPt .= $this->Form->hidden("LearningObjective.$i.id", array('value' => $learningObjective['id']));
                            
                            $dataPt = $this->Html->tag('div', $dataPt, array('class' => 'longField required', 'style' => 'margin-bottom: -1em; margin-top: 1px;'));
                                                                                                                 

                            $secondDiv = $this->Html->tag('label', __('Type') . ':', array('style' => 'margin-top: 18px; height: 32px; float:left; margin-right: 0px;'));
                            $secondDiv .= $this->Form->input("LearningObjective.$i.topic_type_id", array('label' => false, 'div' => false, 'class' => 'inLineList', 'style' => 'margin-top: 11px; height: 32px; float:left; margin-right: 11px;', 'id' => 'theLearningObjective' . $i . 'Type'));

                            $secondDiv .= $this->Html->tag('label', __('Mastery Level') . ':', array('style' => 'margin-top: 18px; height: 32px; float:left; margin-right: 0px;'));
                            $secondDiv .= $this->Form->input("LearningObjective.$i.mastery_level_id", array('label' => false, 'div' => false, 'class' => 'inLineList', 'style' => 'margin-top: 11px; height: 32px; float:left; margin-right: 11px;', 'id' => 'theLearningObjective' . $i . 'Masterylevel'));
                            
                            $secondDiv = $this->Html->tag('div', $secondDiv, array('class' => 'longField required', 'style' => 'margin-bottom: -1em; margin-top: 45px; clear:both;'));
                            
                            $dataPt = $dataPt . $secondDiv;
                            
                            $dataPt = $this->Html->tag('div', $dataPt, array('class' => 'inputsRow', 'style' => 'height: 76px; clear:both;', 'id' => 'divLearningObjective' . $i . 'Name'));
                            
                            $dataPt .= $this->Html->image('delete-icon.png', array('class' => 'delete-learning-objective', 'alt' => __('Delete Learning Objective'), 'border' => '0', 'style' => 'margin-right: 37px;', 'width' => '22', 'id' => 'LearningObjective' . $i . 'Name', 'rel' => 'rightTooltip', 'title' => __('Remove')));
                            
                            echo $dataPt;
                    
                            
                            
                            ?>
                            
                            
                            
                            
                            

                        </li>

                        <?php
                        $i++;
                    }
                    ?>

                </ol>

                <?php
            }
            ?>

        </div>









        <?php
        $topics = $unit['Topic'];
        foreach ($topics as $topic) {
            
        }

        $learningObjectives = $unit['LearningObjective'];
        ?>
    </fieldset>

    <?php echo $this->Form->end(); ?>
</div>
<!--<div class="actions">-->
    <!--<h3><?php echo __('Actions'); ?></h3>-->
    <!--<ul>-->

        <!--<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Unit.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Unit.id'))); ?></li>-->
        <!--<li><?php echo $this->Html->link(__('List Units'), array('action' => 'index')); ?></li>-->
        <!--<li><?php echo $this->Html->link(__('List Knowledge Areas'), array('controller' => 'knowledge_areas', 'action' => 'index')); ?> </li>-->
        <!--<li><?php echo $this->Html->link(__('New Knowledge Area'), array('controller' => 'knowledge_areas', 'action' => 'add')); ?> </li>-->
        <!--<li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?> </li>-->
        <!--<li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li>-->
        <!--<li><?php echo $this->Html->link(__('List Learning Objectives'), array('controller' => 'learning_objectives', 'action' => 'index')); ?> </li>-->
        <!--<li><?php echo $this->Html->link(__('New Learning Objective'), array('controller' => 'learning_objectives', 'action' => 'add')); ?> </li>-->
    <!--</ul>-->
<!--</div>-->
