<?php echo $this->Html->script('jquery-1.9.1.min.js', false); ?>

<?php $globalCounter = count($objectives); ?>

<script>

    $(document).ready(function() {

        $initialId = <?php echo $globalCounter; ?>;

        $("#add-button").click(function(event) {
            var id = $initialId + 1;
            $initialId = $initialId + 1;
            var inputHtml = '<div class="longField required" id="divObjective' + id + 'Description">';
            inputHtml += '<input class="pepe objective" id="theObjective' + id + 'Description" type="text" required="required" name="data[Objective][' + id + '][description]" />';
            inputHtml += '<a id = Objective' + id + 'Description class="delete-button" >Delete</a>';
            inputHtml += '</div>';
            $('#courseObjectives').append(inputHtml);
            event.preventDefault();
        });

        $("#courseObjectives").delegate(".delete-button", "click", function(event) {
            if (confirm('Are you sure you want to delete objective ' + event.target.id + ' ?')) {
                $('#div' + event.target.id).remove();
            }
            event.preventDefault();
        });

    });


</script>



<div class="courses form">

    <?php echo $this->Form->create('Course'); ?>
    <fieldset>
        <legend><?php echo __('Edit Course'); ?></legend>
        <?php
        echo $this->Form->input('id');

        $dataPt = $this->Form->input('name', array('label' => 'Course Name:', 'div' => false, 'class' => 'pepe'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));

        $dataPt = $this->Form->input('justification', array('label' => 'Justification:', 'div' => false, 'class' => 'pepe muchText'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));

        echo $this->Form->input('semester', array('label' => 'Semester:', 'class' => 'digitInput', 'maxlength' => '1'));

        echo $this->Form->input('credits', array('label' => 'Credits:', 'class' => 'digitInput', 'maxlength' => '1'));

        echo $this->Form->input('theory_hours', array('label' => 'Theory hours:', 'class' => 'digitInput', 'maxlength' => '1'));

        echo $this->Form->input('practice_hours', array('label' => 'Practice hours:', 'class' => 'digitInput', 'maxlength' => '1'));

        echo $this->Form->input('lab_hours', array('label' => 'Lab hours:', 'class' => 'digitInput', 'maxlength' => '1'));

        echo $this->Form->input('type_id', array('label' => 'Type:', 'class' => 'list'));

        echo $this->Form->input('area_id', array('label' => 'Area:', 'class' => 'list'));

        echo $this->Form->input('level_id', array('label' => 'Level:', 'class' => 'list'));

        echo $this->Form->input('subject_id', array('label' => 'Subject:', 'class' => 'list'));

        echo $this->Form->input('identifying_number', array('label' => 'Identifying Number:', 'class' => 'digitInput', 'maxlength' => '1'));

        echo $this->Form->input('implementation_strategy_id', array('label' => 'Implementation Strategy:', 'class' => 'list'));
        ?>
        
        <div class="generalContainer">
            <?php echo $this->Html->tag('label', '<b>Axes</b> (clic over <b>all</b> the options you want to select):'); ?>
            <br />
            <br />
            <div class="multipleOptionsPanel">
                <?php echo $this->Form->input('Axis', array('class' => 'squaredTwo', 'div' => false, 'label' => false, 'type' => 'select', 'multiple' => 'checkbox', 'selected' => $selectedAxes)); ?>
            </div>
        </div>    



        <div id="courseObjectives" class="generalContainer">

            <?php echo $this->Html->tag('label', '<b>Objectives:&nbsp;</b>'); ?>

            <?php echo $this->Html->link('Add objective', '', array('target' => '_blank', 'id' => 'add-button')); ?>

            <?php
            if (count($objectives) > 0) {
                echo $this->Html->tag('br');
                echo $this->Html->tag('br');
                $i = 0;
                foreach ($objectives as $objective) {
                    $dataPt = $this->Form->input("Objective.$i.description", array('label' => false, 'div' => false, 'class' => 'pepe objective'));
                    $dataPt .= $this->Form->hidden("Objective.$i.id", array( 'value' => $objective['Objective']['id'] ));
                    $dataPt .= $this->Html->link('Delete', '', array('class' => 'delete-button', 'id' => 'Objective' . $i . 'Description'));
                    echo $this->Html->tag('div', $dataPt, array('class' => 'longField required', 'id' => 'divObjective' . $i . 'Description'));
                    $i++;
                }
            }
            ?>

        </div>

    </fieldset>
    <?php echo $this->Form->end(__('Save changes')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Course.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Course.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?></li>
        <li><?php // echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Levels'), array('controller' => 'levels', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Level'), array('controller' => 'levels', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Subcject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Types'), array('controller' => 'types', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Type'), array('controller' => 'types', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Implementation Strategies'), array('controller' => 'implementation_strategies', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Implementation Strategy'), array('controller' => 'implementation_strategies', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Axes'), array('controller' => 'axes', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Axis'), array('controller' => 'axes', 'action' => 'add')); ?> </li>
    </ul>
</div>
