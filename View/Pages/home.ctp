<?php echo $this->Html->addCrumb('Home'); ?>

<div class="view" style="overflow-y: auto;">

    <div style="width: 80%; margin-left: 14%;">
        <div class="tall_box">
            <div class="facade">
                <?php
                $name = __('Courses');
                $image = 'Courses.png';
                $controller = 'courses';
                $action = 'index';
                $border = 0;
                echo $this->Html->link($this->Html->image($image, array('alt' => __($name), 'border' => $border, 'class' => 'homeIcon')), array('controller' => $controller, 'action' => $action), array('escape' => false));
                ?>
                <h1>
                    <?php echo $this->Html->link($name, array('controller' => $controller, 'action' => $action), array('class' => 'simpleLink')); ?>
                </h1>
            </div>
        </div>
        <div class="tall_box">
            <div class="facade">
                <?php
                $name = __('Study Programs');
                $image = 'studyPrograms.png';
                $controller = 'programs';
                $action = 'index';
                echo $this->Html->link($this->Html->image($image, array('alt' => __($name), 'border' => $border, 'class' => 'homeIcon')), array('controller' => $controller, 'action' => $action), array('escape' => false));
                ?>
                <h1>
                    <?php echo $this->Html->link($name, array('controller' => $controller, 'action' => $action), array('class' => 'simpleLink')); ?>
                </h1>
            </div>
        </div>
        <div class="tall_box">
            <div class="facade">
                <?php
                $name = __('Bodies of Knowledge');
                $image = 'bodyKnowledge.png';
                $controller = 'bodyKnowledges';
                $action = 'index';
                echo $this->Html->link($this->Html->image($image, array('alt' => __($name), 'border' => $border, 'class' => 'homeIcon')), array('controller' => $controller, 'action' => $action), array('escape' => false));
                ?>
                <h1>
                    <?php echo $this->Html->link($name, array('controller' => $controller, 'action' => $action), array('class' => 'simpleLink')); ?>
                </h1>
            </div>
        </div>
        <div class="tall_box">
            <div class="facade">
                <?php
                $name = __('Institutions');
                $image = 'institutions.png';
                $controller = 'bodyKnowledges';
                $action = 'index';
                echo $this->Html->link($this->Html->image($image, array('alt' => __($name), 'border' => $border, 'class' => 'homeIcon')), array('controller' => $controller, 'action' => $action), array('escape' => false));
                ?>
                <h1>
                    <?php echo $this->Html->link($name, array('controller' => $controller, 'action' => $action), array('class' => 'simpleLink')); ?>
                </h1>
            </div>
        </div>
        <div class="tall_box">
            <div class="facade">
                <?php
                $name = __('Statistics');
                $image = 'statistics.png';
                $controller = 'bodyKnowledges';
                $action = 'index';
                echo $this->Html->link($this->Html->image($image, array('alt' => __($name), 'border' => $border, 'class' => 'homeIcon')), array('controller' => $controller, 'action' => $action), array('escape' => false));
                ?>
                <h1>
                    <?php echo $this->Html->link($name, array('controller' => $controller, 'action' => $action), array('class' => 'simpleLink')); ?>
                </h1>
            </div>
        </div>
        <div class="tall_box">
            <div class="facade">
                <?php
                $name = __('Preferences');
                $image = 'settings.png';
                $controller = 'bodyKnowledges';
                $action = 'index';

                echo $this->Html->link($this->Html->image($image, array('alt' => __($name), 'border' => $border, 'class' => 'homeIcon')), array('controller' => $controller, 'action' => $action), array('escape' => false));
                ?>

                <h1>
                    <?php echo $this->Html->link($name, array('controller' => $controller, 'action' => $action), array('class' => 'simpleLink')); ?>
                </h1>
            </div>
        </div>
    </div>
</div>