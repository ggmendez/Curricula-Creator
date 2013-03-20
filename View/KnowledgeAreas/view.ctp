<?php // debug($knowledgeArea);                  ?>

<?php echo $this->Html->addCrumb('My Bodies of Knowledge', '/bodyKnowledges'); ?>
<?php echo $this->Html->addCrumb($knowledgeArea['BodyKnowledge']['name'], '/bodyKnowledges/view/' . $knowledgeArea['BodyKnowledge']['id']); ?>
<?php echo $this->Html->addCrumb($knowledgeArea['KnowledgeArea']['name']); ?>

<div class="knowledgeAreas view">

    <?php // debug($requestData); ?>
    <?php // debug($knowledgeArea); ?>
    
    
    <?php // debug ($storedIDs); ?>
    
    <?php // debug ($recievedIDs); ?>

    <?php // debug ($removedIDs); ?>
    
    <?php // debug ($requestData); ?>

    <?php echo $this->Html->script('jquery-1.9.1.min.js', false); ?>

    <script>

        $(document).ready(function() {

            $globalCounter = 0;

            $("#editKnowledgeAreaDescription").click(function(event) {
                $('#theDescription').empty();

<?php
$data = array(
    'description' => $knowledgeArea['KnowledgeArea']['description']
);
?>

                var phpData = <?php echo json_encode($data) ?>;
                var currentDescription = phpData.description;



                var inputHtml = '<div style="clear:both;">';
                inputHtml += '<?php echo $this->Form->create('KnowledgeArea', array('action' => 'updateDescription' . '/' . $knowledgeArea['KnowledgeArea']['id'])); ?>';
                inputHtml += '<fieldset>';
                inputHtml += '<?php echo $this->Form->input('id', array('value' => $knowledgeArea['KnowledgeArea']['id'])); ?>';
                inputHtml += '<?php echo $this->Html->tag('div', $this->Form->input('description', array('id' => 'descriptionTextArea', 'label' => false, 'div' => false, 'class' => 'pepe muchText')), array('class' => 'longField required')); ?>';
                inputHtml += '</fieldset>';
                inputHtml += '<div class="submit liveSubmit">';
                inputHtml += '<div><?php echo $this->Form->submit(__('Save'), array('name' => 'ok', 'div' => false)); ?></div>';
                inputHtml += '<div><?php echo $this->Form->submit(__('Cancel'), array('name' => 'cancel', 'div' => false)); ?></div>';
                inputHtml += '</div>';
                inputHtml += '</div>';

                $('#theDescription').append(inputHtml);
                $('#descriptionTextArea').text(currentDescription);

                event.preventDefault();
            });

        });


    </script>


    <h2><?php echo h($knowledgeArea['KnowledgeArea']['name']) . ' (' . h($knowledgeArea['KnowledgeArea']['abbreviation']) . ')'; ?></h2>

    <?php
    $totalCore1 = $core_tier_1_hours[0][0]['core_tier_1_hours'];
    $totalCore2 = $core_tier_2_hours[0][0]['core_tier_2_hours'];

    if (!$totalCore1) {
        $totalCore1 = 0;
    }

    if (!$totalCore2) {
        $totalCore2 = 0;
    }
    ?>

    <h4 style="text-align: center; color: #000"><?php echo '[<b>' . h($totalCore1) . '</b> Core-Tier-1 hours, <b>' . h($totalCore2) . '</b> Core-Tier-2 hours]'; ?></h4>

<?php echo $this->Html->tag('br'); ?>

    <?php echo $this->Html->tag('h3', __('Belongs to') . ':', array('style' => 'float:left;')); ?>
    <div style="margin-left: 135px; vertical-align: middle; margin-top: 6px;">
    <?php echo $this->Html->link($knowledgeArea['BodyKnowledge']['name'], array('controller' => 'body_knowledges', 'action' => 'view', $knowledgeArea['BodyKnowledge']['id'])); ?>
    </div>

<?php echo $this->Html->tag('br'); ?>
    <?php echo $this->Html->tag('br'); ?>


    <!--DESCRIPTION-->


<?php
if (empty($knowledgeArea['KnowledgeArea']['description'])) {
    echo $this->Html->tag('h3', __('Description') . ' :');
}
?>

    <?php
    if (empty($knowledgeArea['KnowledgeArea']['description'])) {
        $icon = 'add-icon';
        $alt = __('Add a description');
        $text = __('Add a description');
        $tag = 'h4';
        $theClass = 'leftIcon';
    } else {
        $icon = 'edit-icon';
        $alt = __('Edit description');
        $text = __('Description') . ':';
        $tag = 'h3';
        $theClass = 'rightIcon';
    }
    ?>


<?php
if (empty($knowledgeArea['KnowledgeArea']['description'])) {
    echo $this->Html->image($icon . '.png', array('class' => $theClass, 'alt' => $alt, 'border' => '0'));
    ?> 
        <a target="_blank"> 
        <?php echo $this->Html->tag($tag, '<b>' . $text . '</b>', array('id' => 'editKnowledgeAreaDescription', 'style' => 'cursor: pointer;')); ?>
        </a> 
        <?php } else { ?> 
        <a target="_blank">
        <?php echo $this->Html->image($icon . '.png', array('id' => 'editKnowledgeAreaDescription', 'class' => $theClass, 'alt' => $alt, 'border' => '0', 'style' => 'cursor: pointer;', 'after' => 'Edit')); ?>
        </a> 
            <?php
            echo $this->Html->tag($tag, $text);
        }
        ?>

    <div id="theDescription" style="clear:both;"> 
<?php
if (!empty($knowledgeArea['KnowledgeArea']['description'])) {
    echo $this->Html->tag('div', nl2br(h($knowledgeArea['KnowledgeArea']['description'])), array('id' => 'theDescription', 'style' => 'padding-left: 20px; text-align: justify;'));
}
?>
    </div>

<?php echo $this->Html->tag('br'); ?>
    <?php echo $this->Html->tag('br'); ?>



    <!--UNITS-->

<?php
echo $this->Html->tag('h3', __('Units') . ':', array('style' => 'float:left;'));

$linkText = __('Add Unit');
$image = 'add-icon.png';
$controller = 'knowledgeAreas';
$action = 'add_unit/' . $knowledgeArea['KnowledgeArea']['id'];
$width = '24';
$border = '0';

echo $this->Html->link($linkText, array('controller' => $controller, 'action' => $action), array('class' => 'rightTitle'));
echo $this->Html->link($this->Html->image($image, array('class' => 'rightIcon', 'width' => $width, 'alt' => $linkText, 'border' => $border)), array('controller' => $controller, 'action' => $action), array('escape' => false));

$units = $knowledgeArea['Unit'];
if (empty($units)) {
    ?> <div class="noElements"> <?php echo __('This Knowledge Area has no Units yet.'); ?> </div> <?php
    } else {


        $cont = 1;
        ?>

        <table cellpadding="0" cellspacing="0" style="padding-left: 10px;" >
            <tr>
                <th><?php echo __('Name'); ?></th>
                <th style="width: 110px;"><?php echo __('Core-Tier1 hours'); ?></th>
                <th style="width: 110px;"><?php echo __('Core-Tier2 hours'); ?></th>
                <th style="width: 110px;"><?php echo __('Includes Electives'); ?></th>
            </tr>
    <?php foreach ($units as $unit): ?>

                <tr>                
                    <td style="text-align: left; padding-left: 10px;"><?php echo '<b>' . $cont++ . '.</b> ' . $this->Html->link($knowledgeArea['KnowledgeArea']['abbreviation'] . '/' . $unit['name'], array('controller' => 'units', 'action' => 'view', $unit['id']), array('class' => 'simpleLink')); ?>&nbsp;</td>
                    <td><?php echo h($unit['core_tier_1_hours']); ?>&nbsp;</td>
                    <td><?php echo h($unit['core_tier_2_hours']); ?>&nbsp;</td>
                    <td><?php echo h($unit['includes_electives']); ?>&nbsp;</td>
                </tr>

    <?php endforeach; ?>
        </table>

<?php } ?> 




</div>



<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Knowledge Area'), array('action' => 'edit', $knowledgeArea['KnowledgeArea']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Add Unit'), array('action' => 'add_unit', $knowledgeArea['KnowledgeArea']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Knowledge Area'), array('action' => 'delete', $knowledgeArea['KnowledgeArea']['id']), null, __('Are you sure you want to delete # %s?', $knowledgeArea['KnowledgeArea']['id'])); ?> </li>
        <!--<li><?php // echo $this->Html->link(__('List Knowledge Areas'), array('action' => 'index')); ?> </li>-->
        <!--<li><?php // echo $this->Html->link(__('New Knowledge Area'), array('action' => 'add')); ?> </li>-->
    </ul>
</div>
