<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo __('Curricula Creator') . ':'; ?>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('curricula');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>

        <?php echo $this->Html->script('jquery-1.9.1.min.js'); ?>
        <?php echo $this->Html->script('tooltips.js'); ?>




    </head>
    <body>



        <div id="container">
            <div id="header">

                <div id="logo">
                    <?php echo $this->Html->image('PNG/Product-documentation128.png', array('width' => '90', 'alt' => __('Curricula Creator'), 'border' => '0', 'style' => 'margin-right: 10px;')); ?> 
                </div>

                <div class="area_left">
                    <div class="bubble_left">
                        <p><b> <?php echo __('Curricula Creator'); ?> </b></p>
                    </div>
                </div>



                <?php
                $user = AuthComponent::user();

                $width = 64;
                $border = 0;

                if (!empty($user)) {
                    ?>

                    <!--<div class="menuitem">-->
                    <?php
//						$name = 'Home';
//						$image = 'PNG/Home.png';
//						$controller = 'courses';
//						$action = 'index';
//					
//						echo $this->Html->link($this->Html->image($image, 
//							array('width'=>$width, 'alt'=>__($name), 'border'=>$border)), 
//							array('controller'=>$controller, 'action'=>$action), 
//							array('escape'=>false));						
                    ?>

                    <!--<h1>-->
                    <?php // echo $this->Html->link($name, array('controller'=>$controller,'action'=>$action));  ?>
                    <!--</h1>-->

                    <!--</div>-->

                    <div class="menuitem">					

                        <?php
                        $name = __('Home');
                        $image = 'Home.png';
                        echo $this->Html->link($this->Html->image($image, array('width' => $width, 'alt' => __($name), 'border' => $border)), '/', array('escape' => false));
                        ?>

                        
                        
                        <h1> 
                            <?php echo $this->Html->link($name, array('controller' => 'pages', 'action' => 'display', 'home')); ?>
                        </h1>


                    </div>
                    
                    <div class="menuitem">					

                        <?php
                        $name = __('Courses');
                        $image = 'Courses.png';
                        $controller = 'courses';
                        $action = 'index';

                        echo $this->Html->link($this->Html->image($image, array('width' => $width, 'alt' => __($name), 'border' => $border)), array('controller' => $controller, 'action' => $action), array('escape' => false));
                        ?>

                        <h1>
                            <?php echo $this->Html->link($name, array('controller' => $controller, 'action' => $action)); ?>
                        </h1>


                    </div>



                    <div class="menuitem">

                        <?php
                        $name = __('Bodies of Knowledge');
                        $image = 'bodyKnowledge.png';
                        $controller = 'bodyKnowledges';
                        $action = 'index';

                        echo $this->Html->link($this->Html->image($image, array('width' => $width, 'alt' => __($name), 'border' => $border)), array('controller' => $controller, 'action' => $action), array('escape' => false));
                        ?>

                        <h1>
                            <?php echo $this->Html->link($name, array('controller' => $controller, 'action' => $action)); ?>
                        </h1>

                    </div>

                    <div class="menuitem">

                        <?php
                        $name = __('Study Programs');
                        $image = 'studyPrograms.png';
                        $controller = 'programs';
                        $action = 'index';

                        echo $this->Html->link($this->Html->image($image, array('width' => $width, 'alt' => __($name), 'border' => $border)), array('controller' => $controller, 'action' => $action), array('escape' => false));
                        ?>

                        <h1>
                            <?php echo $this->Html->link($name, array('controller' => $controller, 'action' => $action)); ?>
                        </h1>


                    </div>

                    <!--<div class="menuitem">-->					

                    <?php
//						$name = 'Statistics';
//						$image = 'PNG/Statistics.png';
//						$controller = 'courses';
//						$action = 'index';
//					
//						echo $this->Html->link($this->Html->image($image, 
//							array('width'=>$width, 'alt'=>__($name), 'border'=>$border)), 
//							array('controller'=>$controller, 'action'=>$action), 
//							array('escape'=>false));						
                    ?>

                    <!--<h1>-->
                    <?php // echo $this->Html->link($name, array('controller'=>$controller,'action'=>$action));  ?>
                    <!--</h1>-->

                    <!--</div>-->

                    <div class="menuitem">					

                        <?php
                        $name = __('Logout');
                        $image = 'PNG/System/Security1.png';
                        $controller = 'users';
                        $action = 'logout';

                        echo $this->Html->link($this->Html->image($image, array('width' => $width, 'alt' => __($name), 'border' => $border)), array('controller' => $controller, 'action' => $action), array('escape' => false));
                        ?>

                        <h1>
                            <?php echo $this->Html->link($name, array('controller' => $controller, 'action' => $action)); ?>
                        </h1>

                    </div>


                    <div class="menuitem" style="float: right;">

                        <?php
                        $name = $user['display_name'];
                        $image = 'PNG/User.png';
                        $controller = 'users';
                        $action = 'edit';

                        echo $this->Html->link($this->Html->image($image, array('width' => $width, 'alt' => __($name), 'border' => $border)), array('controller' => $controller, 'action' => $action, $user['id']), array('escape' => false));
                        ?>

                        <h1>
                            <?php echo $this->Html->link($name, array('controller' => $controller, 'action' => $action, $user['id'])); ?>
                        </h1>


                    </div>





                    <?php
                } else {
                    
                }
                ?> &nbsp;

                <?php ?>



            </div> 

            <div style="padding: 10px 20px 35px 20px; margin-top: -10px; margin-bottom: -28px;">

                <?php echo $this->Session->flash(); ?>

                <div class="crumbs">
                    <?php
                    echo $this->Html->getCrumbs(' > ', array(
                        'text' => $this->Html->image('Home.png', array('width' => '20px;', 'style' => 'margin-bottom: -3px;')),
                        'url' => array('controller' => 'pages', 'action' => 'display', 'home'),
                        'escape' => false
                    ));
                    ?>
                </div>
            </div>

            <div id="languageBar">
                <?php echo $this->Html->tag('label', __('Language') . ':', array('style' => 'color: #000; margin-top: 2px;')); ?>
                <?php echo $this->Form->postLink($this->Html->image('../img/usa2.png', array('border' => '0', 'width' => '24', 'rel' => 'tooltip', 'title' => __('English'))), array('controller' => 'App', 'action' => 'changeLanguage', 'eng'/* . '____' . $this->here */), array('escape' => false)); ?>
                <?php echo $this->Form->postLink($this->Html->image('../img/spa2.png', array('border' => '0', 'width' => '24', 'rel' => 'tooltip', 'title' => __('Spanish'))), array('controller' => 'App', 'action' => 'changeLanguage', 'spa'/* . '____' . $this->here */), array('escape' => false)); ?>

            </div>


            <div id="content">
                <?php echo $this->fetch('content'); ?>
            </div>


            <div id="footer">

            </div>


        </div>

        <?php // echo $this->element('sql_dump');    ?>

    </body>
</html>
