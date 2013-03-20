<div class="units form">
    
    <?php echo $this->Html->script('jquery-1.9.1.min.js', false); ?>

    <script>

        $(document).ready(function() {

            $globalCounter = 0;

            $("#add-topic").click(function(event) {
                var id = $globalCounter + 1;
                $globalCounter = $globalCounter + 1;
                var inputHtml = '<li><div class="longField required" id="divTopic' + id + 'Name">';
                inputHtml += '<input class="pepe objective" id="theTopic' + id + 'Name" type="text" required="required" name="data[Topic][' + id + '][name]" />';
                inputHtml += '&nbsp;<a id = Topic' + id + 'Name class="delete-topic" >Delete</a>';
                inputHtml += '</div></li>';
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
                var id = $globalCounter + 1;
                $globalCounter = $globalCounter + 1;
                var inputHtml = '<li><div class="longField required" id="divLearningObjective' + id + 'Description">';
                inputHtml += '<input class="pepe objective" id="theLearningObjective' + id + 'Description" type="text" required="required" name="data[LearningObjective][' + id + '][description]" />';
                inputHtml += '&nbsp;<a id = LearningObjective' + id + 'Description class="delete-learningObjective" >Delete</a>';
                inputHtml += '</div></li>';
                $('#learningObjectivesList').append(inputHtml);
                event.preventDefault();
            });
            
            $("#learningObjectivesList").delegate(".delete-learningObjective", "click", function(event) {
                if (confirm('Are you sure you want to delete learning objective ' + event.target.id + ' ?')) {
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
        $dataPt = $this->Form->input('name', array('label' => __('Name') . ':', 'div' => false, 'class' => 'inLineInput'));

        $dataPt .= $this->Form->input('knowledge_area_id', array('div' => false, 'label' => __('Knowledge Area') . ':', 'class' => 'inLineList'));

        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required', 'style' => 'margin-bottom: -1em;'));

        echo $this->Form->input('core_tier_1_hours', array('label' => __('Core-Tier1 hours') . ':', 'class' => 'digitInput', 'maxlength' => '1'));

        echo $this->Form->input('core_tier_2_hours', array('label' => __('Core-Tier2 hours') . ':', 'class' => 'digitInput', 'maxlength' => '1'));
        ?>

        <div class="radio-toolbar">
            <?php
            $options = array(__('Yes') => __('Yes'), __('No') => __('No'));
            $attributes = array('legend' => false, 'class' => 'input required', 'value' => __('Yes'));
            echo $this->Html->tag('label', __('Includes Electives?') . ':', array('class' => 'required', 'id' => 'radioButtonLegend')) . $this->Form->radio('includes_electives', $options, $attributes);
            ?>
        </div>


        <?php
        ?>


        <div id="unitTopics" class="generalContainer">

            <?php echo $this->Html->tag('label', '<b>' . __('Topics') . ':&nbsp;</b>'); ?>
            <?php echo $this->Html->link(__('Add Topic'), '', array('target' => '_blank', 'id' => 'add-topic')); ?>

            <?php
            echo $this->Html->tag('br');
            echo $this->Html->tag('br');
            ?>

            <ol id="topicsList">

            </ol>

        </div>
        
        <div id="unitLearningObjectives" class="generalContainer">

            <?php echo $this->Html->tag('label', '<b>' . __('Learning Objectives') . ':&nbsp;</b>'); ?>
            <?php echo $this->Html->link(__('Add Learning Objective'), '', array('target' => '_blank', 'id' => 'add-learning-objective')); ?>

            <?php
            echo $this->Html->tag('br');
            echo $this->Html->tag('br');
            ?>

            <ol id="learningObjectivesList">

            </ol>

        </div>


    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Units'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Knowledge Areas'), array('controller' => 'knowledge_areas', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Knowledge Area'), array('controller' => 'knowledge_areas', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Learning Objectives'), array('controller' => 'learning_objectives', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Learning Objective'), array('controller' => 'learning_objectives', 'action' => 'add')); ?> </li>
    </ul>
</div>
