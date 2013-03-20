<?php echo $this->Html->addCrumb('My Courses', '/courses'); ?>
<?php echo $this->Html->addCrumb ($course['Course']['name']); ?>

<div class="courses view">

    
    <?php // debug ($requestData); ?>
    <?php // debug ($course); ?>


    <h2><?php echo h($course['Course']['code'] . ' - ' . $course['Course']['name'] . ' (' . $course['Type']['name'] . ')'); ?></h2>

    <?php echo $this->Html->tag('br'); ?>
    <?php echo $this->Html->tag('h3', 'General Information:'); ?>

    <div style="padding-left: 20px;">

        <?php echo $this->Html->tag('b', 'Credits: ') . $course['Course']['credits']; ?>
        &nbsp;
        <?php echo $this->Html->tag('b', 'Semester: ') . $course['Course']['semester']; ?>
        &nbsp;
        <?php echo $this->Html->tag('b', 'Level: ') . $course['Level']['name']; ?>

        <?php echo $this->Html->tag('br'); ?>
        <?php echo $this->Html->tag('br'); ?>

        <?php echo $this->Html->tag('b', 'Area: ') . $course['Area']['name']; ?>
        &nbsp;
        <?php echo $this->Html->tag('b', 'Subject: ') . $course['Subject']['name']; ?>    

        <?php echo $this->Html->tag('br'); ?>
        <?php echo $this->Html->tag('br'); ?>


        <?php echo $this->Html->tag('b', 'Time distribution: &nbsp; Theory: ') . $course['Course']['theory_hours'] . ' hours'; ?>
        &nbsp;
        <?php echo $this->Html->tag('b', 'Practice: ') . $course['Course']['practice_hours'] . ' hours'; ?>
        &nbsp;    
        <?php echo $this->Html->tag('b', 'Lab: ') . $course['Course']['lab_hours'] . ' hours'; ?>
        &nbsp;

        <?php echo $this->Html->tag('br'); ?>
        <?php echo $this->Html->tag('br'); ?>


        <?php echo $this->Html->tag('b', 'Implementation Strategy: ') . $course['ImplementationStrategy']['name']; ?>

        <?php echo $this->Html->tag('br'); ?>
        <?php echo $this->Html->tag('br'); ?>

        <?php
        $axesString = '';
        $axes = $course['Axis'];
        if (count($axes) > 0) {
            foreach ($axes as $axis):
                $axesString = $axesString . ' ' . $axis['name'] . ' - ';
            endforeach;
        }
        
        $axesString = substr($axesString, 0, -3);
        
        ?>
        <?php echo $this->Html->tag('b', 'Axes: ') . ' ' . $axesString; ?>



    </div>

    <?php echo $this->Html->tag('br'); ?>
    <?php echo $this->Html->tag('br'); ?>

    <?php echo $this->Html->tag('h3', 'Justification:'); ?>
    <?php echo $this->Html->tag('div', $course['Course']['justification'], array('style' => 'padding-left: 20px; text-align: justify;')); ?>

    <?php
    $objectives = $course['Objective'];
    if (count($objectives) > 0) {
        ?>

        <?php echo $this->Html->tag('br'); ?>
        <?php echo $this->Html->tag('br'); ?>

        <?php echo $this->Html->tag('h3', 'General Objectives:'); ?>

        <ol>
            <?php
            foreach ($objectives as $objective):
                echo $this->Html->tag('li', '<span>' . $objective['description'] . '</span>', array('style' => 'text-align: justify;'));
            endforeach;
            ?>
        </ol>

    <?php } ?>


<!--    <?php
    $axes = $course['Axis'];
    if (count($axes) > 0) {
        ?>

        <?php echo $this->Html->tag('br'); ?>
        <?php echo $this->Html->tag('br'); ?>

        <?php echo $this->Html->tag('h3', 'Axes:'); ?>

        <ol>
            <?php
            foreach ($axes as $axis):
                echo $this->Html->tag('li', $axis['name']);
            endforeach;
            ?>
        </ol>

    <?php } ?>    -->


    <?php echo $this->Html->tag('br'); ?>

    <br />

    <dl>
            <!--<dt><?php echo __('Id'); ?></dt>-->
            <!--<dd><?php echo h($course['Course']['id']); ?>&nbsp;</dd>-->		
        <!--<dt><?php echo __('Code'); ?></dt>-->
        <!--<dd><?php echo h($course['Course']['code']); ?>&nbsp;</dd>-->

        <!--<dt><?php echo __('Semester'); ?></dt>-->
        <!--<dd><?php echo h($course['Course']['semester']); ?>&nbsp;</dd>-->

        <!--<dt><?php echo __('Credits'); ?></dt>-->
        <!--<dd><?php echo h($course['Course']['credits']); ?>&nbsp;</dd>-->

        <!--<dt><?php echo __('Theory Hours'); ?></dt>-->
        <!--<dd><?php echo h($course['Course']['theory_hours']); ?>&nbsp;</dd>-->
        <!--<dt><?php echo __('Practice Hours'); ?></dt>-->
        <!--<dd><?php echo h($course['Course']['practice_hours']); ?>&nbsp;</dd>-->
        <!--<dt><?php echo __('Lab Hours'); ?></dt>-->
        <!--<dd><?php echo h($course['Course']['lab_hours']); ?>&nbsp;</dd>-->

        <!--<dt><?php echo __('Type'); ?></dt>-->
        <!--<dd><?php echo $this->Html->link($course['Type']['name'], array('controller' => 'types', 'action' => 'view', $course['Type']['id'])); ?>&nbsp;</dd>-->



        <!--<dt><?php echo __('Area'); ?></dt>-->
        <!--<dd><?php echo $this->Html->link($course['Area']['name'], array('controller' => 'areas', 'action' => 'view', $course['Area']['id'])); ?>&nbsp;</dd>-->
        <!--<dt><?php echo __('Level'); ?></dt>-->
        <!--<dd><?php echo $this->Html->link($course['Level']['name'], array('controller' => 'levels', 'action' => 'view', $course['Level']['id'])); ?>&nbsp;</dd>-->
        <!--<dt><?php echo __('Subject'); ?></dt>-->
        <!--<dd><?php echo $this->Html->link($course['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $course['Subject']['id'])); ?>&nbsp;</dd>-->        

        <!--<dt><?php echo __('Identifying Number'); ?></dt>-->
        <!--<dd><?php echo h($course['Course']['identifying_number']); ?>&nbsp;</dd>-->

        <!--<dt><?php echo __('Implementation Strategy'); ?></dt>-->
        <!--<dd><?php echo $this->Html->link($course['ImplementationStrategy']['name'], array('controller' => 'implementation_strategies', 'action' => 'view', $course['ImplementationStrategy']['id'])); ?>&nbsp;</dd>-->


        <!--<dt><?php echo __('Created'); ?></dt>-->
        <!--<dd><?php echo h($course['Course']['created']); ?>&nbsp;</dd>-->
        <!--<dt><?php echo __('Modified'); ?></dt>-->
        <!--<dd><?php echo h($course['Course']['modified']); ?>&nbsp;</dd>-->
        <!--<dt><?php // echo __('User');               ?></dt>-->
        <!--<dd><?php // echo $this->Html->link($course['User']['username'], array('controller' => 'users', 'action' => 'view', $course['User']['id']));               ?>&nbsp;</dd>-->
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Course'), array('action' => 'edit', $course['Course']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Course'), array('action' => 'delete', $course['Course']['id']), null, __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Course'), array('action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Levels'), array('controller' => 'levels', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Level'), array('controller' => 'levels', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
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
<!--<div class="related">
    <h3><?php echo __('Related Axes'); ?></h3>
    <?php if (!empty($course['Axis'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Name'); ?></th>
                <th><?php echo __('Code'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($course['Axis'] as $axis):
                ?>
                <tr>
                    <td><?php echo $axis['id']; ?></td>
                    <td><?php echo $axis['name']; ?></td>
                    <td><?php echo $axis['code']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'axes', 'action' => 'view', $axis['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'axes', 'action' => 'edit', $axis['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'axes', 'action' => 'delete', $axis['id']), null, __('Are you sure you want to delete # %s?', $axis['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Axis'), array('controller' => 'axes', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>-->
