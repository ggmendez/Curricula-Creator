<?php echo $this->Html->addCrumb (__('My Courses')); ?>




<div class="smallMenu">
    <?php echo $this->Html->link($this->Html->image('add-icon.png', array('style' => 'float: right;', 'width' => 30, 'alt' => __('New'), 'border' => 0, 'rel' => 'tooltip', 'title' => __('New'))), array('controller' => 'courses', 'action' => 'add'), array('escape' => false)); ?>
</div>

<div class="courses index">
    <h2><?php echo __('My Courses'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <!--<th><?php // echo $this->Paginator->sort('id'); ?></th>-->
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('code'); ?></th>
            <th><?php echo $this->Paginator->sort('semester'); ?></th>
            <th><?php echo $this->Paginator->sort('credits'); ?></th>
            <!--<th><?php // echo $this->Paginator->sort('identifying_number'); ?></th>-->
            <!--<th><?php // echo $this->Paginator->sort('area_id'); ?></th>-->
            <!--<th><?php // echo $this->Paginator->sort('level_id'); ?></th>-->
            <!--<th><?php // echo $this->Paginator->sort('subject_id'); ?></th>-->
            <th><?php echo $this->Paginator->sort('type_id'); ?></th>
            <!--<th><?php // echo $this->Paginator->sort('implementation_strategy_id'); ?></th>-->
            <th><?php echo $this->Paginator->sort('theory_hours'); ?></th>
            <th><?php echo $this->Paginator->sort('practice_hours'); ?></th>
            <th><?php echo $this->Paginator->sort('lab_hours'); ?></th>
            <!--<th><?php // echo $this->Paginator->sort('syllabus_file'); ?></th>-->
            <!--<th><?php // echo $this->Paginator->sort('created'); ?></th>-->
            <!--<th><?php // echo $this->Paginator->sort('modified'); ?></th>-->
            <!--<th><?php // echo $this->Paginator->sort('user_id'); ?></th>-->
            <!--<th class="actions"><?php // echo __('Actions'); ?></th>-->
        </tr>
        <?php foreach ($courses as $course): ?>
            <tr>
<!--                <td><?php // echo h($course['Course']['id']); ?>&nbsp;</td>-->
                
                <td style="text-align: left;"><?php echo $this->Html->link(h($course['Course']['name']), array('action' => 'view', $course['Course']['id']), array('class' => 'simpleLink', 'style' => 'padding-left: 10px;', 'rel' => 'tooltip', 'title' => __('Clic to view this course'))); ?>&nbsp;</td>
                
                
                
                
                <td style="width: 40px;"><?php echo h($course['Course']['code']); ?>&nbsp;</td>
                <td style="width: 40px;"><?php echo h($course['Course']['semester']); ?>&nbsp;</td>
                <td style="width: 40px;"><?php echo h($course['Course']['credits']); ?>&nbsp;</td>
                <!--<td><?php // echo h($course['Course']['identifying_number']); ?>&nbsp;</td>-->
                <!--<td><?php // echo $this->Html->link($course['Area']['name'], array('controller' => 'areas', 'action' => 'view', $course['Area']['id'])); ?></td>-->
                <!--<td><?php // echo $this->Html->link($course['Level']['name'], array('controller' => 'levels', 'action' => 'view', $course['Level']['id'])); ?></td>-->
                <!--<td><?php // echo $this->Html->link($course['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $course['Subject']['id'])); ?></td>-->
                
                <!--<td><?php // echo $this->Html->link($course['Type']['name'], array('controller' => 'types', 'action' => 'view', $course['Type']['id'])); ?></td>-->
                <td style="width: 40px;"><?php echo h($course['Type']['name']); ?>&nbsp;</td>
                
                
                <!--<td><?php // echo $this->Html->link($course['ImplementationStrategy']['name'], array('controller' => 'implementation_strategies', 'action' => 'view', $course['ImplementationStrategy']['id'])); ?></td>-->                
                <td style="width: 100px;"><?php echo h($course['Course']['theory_hours']); ?>&nbsp;</td>
                <td style="width: 100px;"><?php echo h($course['Course']['practice_hours']); ?>&nbsp;</td>
                <td style="width: 100px;"><?php echo h($course['Course']['lab_hours']); ?>&nbsp;</td>
                <!--<td><?php // echo h($course['Course']['syllabus_file']); ?>&nbsp;</td>-->
                <!--<td><?php // echo h($course['Course']['created']); ?>&nbsp;</td>-->                
                <!--<td><?php // echo h($course['Course']['modified']); ?>&nbsp;</td>-->
                <!--<td><?php // echo $this->Html->link($course['User']['username'], array('controller' => 'users', 'action' => 'view', $course['User']['id'])); ?></td>-->
                <!--<td class="actions">-->
                    <?php // echo $this->Html->link(__('View'), array('action' => 'view', $course['Course']['id'])); ?>
                    <?php // echo $this->Html->link(__('Edit'), array('action' => 'edit', $course['Course']['id'])); ?>
                    <?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $course['Course']['id']), null, __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?>
                <!--</td>-->
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>


<!--<div class="actions">-->
    <!--<h3><?php // echo __('Actions'); ?></h3>-->
    <!--<ul>-->
        <!--<li><?php echo $this->Html->link(__('New Course'), array('action' => 'add')); ?></li>-->
        <!--<li><?php // echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>-->

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


