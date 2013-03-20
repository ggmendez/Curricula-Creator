<div class="programs view">

    <h2><?php echo h($program['Program']['name']); ?></h2>

    <?php echo $this->Html->tag('br'); ?>
    <?php echo $this->Html->tag('h3', 'Description:'); ?>
    <?php echo $this->Html->tag('div', $program['Program']['description'], array('style' => 'padding-left: 20px; text-align: justify;')); ?>

    <?php
    $courses = $program['Course'];
    if (count($courses) > 0) {
        ?>

        <?php echo $this->Html->tag('br'); ?>
        <?php echo $this->Html->tag('br'); ?>

        <?php echo $this->Html->tag('h3', 'Courses:'); ?>

        <ol>
            <?php
            foreach ($courses as $course):
                echo $this->Html->tag('li', '<span>' . $this->Html->link($course['name'], array('controller' => 'courses', 'action' => 'view', $course['id']), array('style' => 'text-align: justify;')) . '</span>', array('style' => 'text-align: justify;'));
            endforeach;
            ?>
        </ol>

    <?php } ?>


</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Program'), array('action' => 'edit', $program['Program']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Program'), array('action' => 'delete', $program['Program']['id']), null, __('Are you sure you want to delete # %s?', $program['Program']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Programs'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Program'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
    </ul>
</div>
