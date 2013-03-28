<?php echo $this->Html->addCrumb(__('My Courses'), '/courses'); ?>
<?php echo $this->Html->addCrumb (__('Add Course')); ?>

<div class="smallMenu">    
    <?php echo $this->Html->link($this->Html->image('cancel-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Cancel'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Cancel'))), array('controller' => 'courses', 'action' => 'index'), array('escape' => false, 'id' => 'cancel-button')); ?>
    <?php echo $this->Html->link($this->Html->image('save-icon.png', array('style' => 'margin-left: 15px; float: right;', 'width' => 30, 'alt' => __('Save'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('Save'))), array('controller' => 'courses', 'action' => 'index'), array('escape' => false)); ?>
</div>

<script>

    $(document).ready(function() {

        $("#cancel-button").click(function(event) {
            if (!confirm('<?php echo __('Are you sure you want to cancel this operation?'); ?>')) {
                event.preventDefault();
            }
        });


        $globalCounter = 0;
        
        $("#add-button").click(function(event) {
            var id = $globalCounter + 1;
            $globalCounter = $globalCounter + 1;
            var inputHtml = '<li><div class="longField required" id="divObjective' + id + 'Description">';
            inputHtml += '<input class="pepe objective" id="theObjective' + id + 'Description" type="text" required="required" name="data[Objective][' + id + '][description]" />';
            
            inputHtml += '<img id = "Objective' + id + 'Description" src="../img/delete-icon.png" class="delete-button" width="22" alt="<?php echo __('Remove') ?>" border="0" style="margin-left: 94%; float:left; margin-top: -12px;" rel="rightTooltip" title="<?php echo __('Remove') ?>">';
            
            inputHtml += '</div></li>';
            $('#objectivesList').append(inputHtml);
            
            bindTargetFunctions('"Objective' + id + 'Description"');
            
            event.preventDefault();                
        });

        $("#objectivesList").delegate(".delete-button", "click", function(event) {
            if (confirm('Are you sure you want to delete objective ' + '#li' + event.target.id + ' ?')) {
                $('#div' + event.target.id).parent().remove();
            }
            event.preventDefault();
        });

    });


</script>

<div class="courses form">
    <?php echo $this->Form->create('Course'); ?>

    <fieldset>
        <legend><?php echo __('Add Course'); ?></legend>

        <?php
        $dataPt = $this->Form->input('name', array('label' => __('Name') . ':', 'div' => false, 'class' => 'pepe'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));

        $dataPt = $this->Form->input('justification', array('label' => __('Justification') . ':', 'div' => false, 'class' => 'pepe muchText'));
        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required'));

        echo $this->Form->input('semester', array('label' => __('Semester') . ':', 'class' => 'digitInput', 'maxlength' => '1'));

        echo $this->Form->input('credits', array('label' => __('Credits') . ':', 'class' => 'digitInput', 'maxlength' => '1'));

        echo $this->Form->input('theory_hours', array('label' => __('Theory hours') . ':', 'class' => 'digitInput', 'maxlength' => '1'));

        echo $this->Form->input('practice_hours', array('label' => __('Practice hours') . ':', 'class' => 'digitInput', 'maxlength' => '1'));

        echo $this->Form->input('lab_hours', array('label' => __('Lab hours') . ':', 'class' => 'digitInput', 'maxlength' => '1'));

        echo $this->Form->input('type_id', array('label' => __('Type') . ':', 'class' => 'list'));

        echo $this->Form->input('area_id', array('label' => __('Area') . ':', 'class' => 'list'));

        echo $this->Form->input('level_id', array('label' => __('Level') . ':', 'class' => 'list'));

        echo $this->Form->input('subject_id', array('label' => __('Subject') . ':', 'class' => 'list'));

        echo $this->Form->input('identifying_number', array('label' => __('Identifying Number') . ':', 'class' => 'digitInput', 'maxlength' => '1'));

        echo $this->Form->input('implementation_strategy_id', array('label' => __('Implementation Strategy') . ':', 'class' => 'list'));
        ?>

        <div class="generalContainer">

            <?php echo $this->Html->tag('label', '<b>' . __('Axes') . '</b> (' . __('click over') . ' <b>' . __('all') . '</b> ' . __('the options you want to select') . '):'); ?>

            <div class="multipleOptionsPanel">

                <?php
                echo $this->Form->input('Axis', array('class' => 'squaredTwo', 'div' => false, 'label' => false, 'type' => 'select', 'multiple' => 'checkbox'));
                ?>

            </div>

        </div>

        <div id="courseObjectives" class="generalContainer">


            <?php echo $this->Html->tag('label', '<b>' . __('Objectives') . ':&nbsp;</b>', array('style' => 'clear:both;')); ?>
            <?php
            $linkText = __('Add Objective');
            $image = 'add-icon.png';
            $width = '24';
            $border = '0';
            echo $this->Html->link($linkText, '', array('class' => 'rightTitle', 'target' => '_blank', 'id' => 'add-button', 'style' => 'float:right;'));
            echo $this->Html->image($image, array('class' => 'rightIcon', 'width' => $width, 'alt' => $linkText, 'border' => $border));
            ?>   
            
            <?php echo $this->Html->tag('br');
                echo $this->Html->tag('br');
                ?>
            
            <ol id="objectivesList">
                
            </ol>


            <?php // $dataPt = $this->Form->input('Objective.0.description', array('label' => false, 'div' => false, 'class' => 'pepe'));
//        echo $this->Html->tag('div', $dataPt, array('class' => 'longField required')); ?>





        </div>



    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<!--<div class="actions">-->
    <!--<h3><?php // echo __('Actions'); ?></h3>-->
    <!--<ul>-->

        <!--<li><?php // echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?></li>-->
        <!--<li><?php // echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('List Levels'), array('controller' => 'levels', 'action' => 'index')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('New Level'), array('controller' => 'levels', 'action' => 'add')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('List Types'), array('controller' => 'types', 'action' => 'index')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('New Type'), array('controller' => 'types', 'action' => 'add')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('List Implementation Strategies'), array('controller' => 'implementation_strategies', 'action' => 'index')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('New Implementation Strategy'), array('controller' => 'implementation_strategies', 'action' => 'add')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('List Axes'), array('controller' => 'axes', 'action' => 'index')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('New Axis'), array('controller' => 'axes', 'action' => 'add')); ?> </li>-->
    <!--</ul>-->
<!--</div>-->
