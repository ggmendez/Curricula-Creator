<?php // debug($requestData);       ?>

<?php // debug($unit);  ?>

<?php // debug($bodyKnowledge); ?>

<?php echo $this->Html->addCrumb('My Bodies of Knowledge', '/bodyKnowledges'); ?>
<?php echo $this->Html->addCrumb($bodyKnowledge['BodyKnowledge']['name'], '/bodyKnowledges/view/' . $bodyKnowledge['BodyKnowledge']['id']); ?>
<?php echo $this->Html->addCrumb($unit['KnowledgeArea']['name'], '/knowledge_areas/view/' . $unit['KnowledgeArea']['id']); ?>
<?php echo $this->Html->addCrumb($unit['Unit']['name']); ?>

<div class="units view">

    <?php // debug ($requestData); ?>

    <h2><?php echo h($unit['Unit']['name']); ?></h2>
    <h4 style="text-align: center; color: #000"><?php echo '[<b>' . h($unit['Unit']['core_tier_1_hours']) . '</b> Core-Tier1 hours, <b>' . h($unit['Unit']['core_tier_2_hours']) . '</b> Core-Tier2 hours]'; ?></h4>

    <?php echo $this->Html->tag('br'); ?>

    <!--TOPICS-->

    <?php
    echo $this->Html->tag('h3', __('Topics') . ':', array('style' => 'float:left;'));

    $linkText = __('Add Topic');
    $image = 'add-icon.png';
    $width = '24';
    $border = '0';
    echo $this->Html->link($linkText, array('action' => 'add_topic/' . $unit['Unit']['id']), array('class' => 'rightTitle'));
    echo $this->Html->link($this->Html->image($image, array('class' => 'rightIcon', 'width' => $width, 'alt' => $linkText, 'border' => $border)), array('action' => 'add_topic/' . $unit['Unit']['id']), array('escape' => false));

    $topics = $unit['Topic'];

    if (empty($topics)) {
        ?> <div class="noElements"> <?php echo __('This Unit has no Topics yet.'); ?> </div> <?php
    } else {

        $groupedTopics = array();
        foreach ($topicTypes as $topicType):
            $theTopics = array();
            foreach ($topics as $topic):
                if ($topic['topic_type_id'] == $topicType['TopicType']['id']) {
                    array_push($theTopics, $topic);
                }
            endforeach;
            $groupedTopics[$topicType['TopicType']['name']] = $theTopics;
        endforeach;

        foreach ($topicTypes as $topicType):
            $topicsGroup = $groupedTopics[$topicType['TopicType']['name']];
            if (!empty($topicsGroup)) {
                echo $this->Html->tag('h4', $topicType['TopicType']['name'] . ':', array('style' => 'clear: both; margin-left: 20px;'));
                ?> <ol> <?php
                    foreach ($topicsGroup as $topic) {
                        echo $this->Html->tag('li', '<span>' . $topic['name'] . '</span>', array('style' => 'text-align: justify; margin-left: 30px;'));
                    }
                    ?> </ol> <?php
                echo $this->Html->tag('br');
            }
        endforeach;

        echo $this->Html->tag('br');
        echo $this->Html->tag('br');
    }
    ?>

    <span style="clear:both; marging-top:20px;"></span>

    <?php
    echo $this->Html->tag('h3', __('Learning Objectives') . ':', array('style' => 'float:left;'));
    $linkText = __('Add Learning Objective');
    $image = 'add-icon.png';
    $width = '24';
    $border = '0';
    echo $this->Html->link($linkText, array('action' => 'add_learning_objective/' . $unit['Unit']['id']), array('class' => 'rightTitle'));
    echo $this->Html->link($this->Html->image($image, array('class' => 'rightIcon', 'width' => $width, 'alt' => $linkText, 'border' => $border)), array('action' => 'add_learning_objective/' . $unit['Unit']['id']), array('escape' => false));


    $learningObjectives = $unit['LearningObjective'];

    if (empty($learningObjectives)) {
        ?> <div class="noElements"> <?php echo __('This Unit has no Learning Objectives yet.'); ?> </div> <?php
    } else {

        $groupedLearningObjectives = array();
        foreach ($topicTypes as $topicType):
            $theLearningObjectives = array();
            foreach ($learningObjectives as $learningObjective):
                if ($learningObjective['topic_type_id'] == $topicType['TopicType']['id']) {
                    array_push($theLearningObjectives, $learningObjective);
                }
            endforeach;
            $groupedLearningObjectives[$topicType['TopicType']['name']] = $theLearningObjectives;
        endforeach;

        $indexedMasteryLevels = array();
        foreach ($masteryLevels as $masteryLevel):
            $indexedMasteryLevels[$masteryLevel['MasteryLevel']['id']] = $masteryLevel;
        endforeach;

//    debug($masteryLevels);
//    debug($indexedMasteryLevels);
//    debug($learningObjective);

        foreach ($topicTypes as $topicType):
            $learningObjectivesGroup = $groupedLearningObjectives[$topicType['TopicType']['name']];
            if (!empty($learningObjectivesGroup)) {
                echo $this->Html->tag('h4', $topicType['TopicType']['name'] . ':', array('style' => 'clear: both; margin-left: 20px;'));
                ?> <ol> <?php
                    foreach ($learningObjectivesGroup as $learningObjective) {
                        echo $this->Html->tag('li', '<span>' . $learningObjective['description'] . ' <b>[</b><i>' . $indexedMasteryLevels[$learningObjective['mastery_level_id']]['MasteryLevel']['name'] . '</i><b>]</b> </span>', array('style' => 'text-align: justify; margin-left: 30px;'));
                    }
                    ?> </ol> <?php
                echo $this->Html->tag('br');
            }
        endforeach;
    }
    ?>



</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Unit'), array('action' => 'edit', $unit['Unit']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Add Topic'), array('action' => 'add_topic', $unit['Unit']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Add Learning Objective'), array('action' => 'add_learning_objective', $unit['Unit']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Unit'), array('action' => 'delete', $unit['Unit']['id']), null, __('Are you sure you want to delete # %s?', $unit['Unit']['id'])); ?> </li>
        
        <li><?php // echo $this->Html->link(__('List Units'), array('action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Unit'), array('action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Knowledge Areas'), array('controller' => 'knowledge_areas', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Knowledge Area'), array('controller' => 'knowledge_areas', 'action' => 'add')); ?> </li>
    </ul>
</div>
