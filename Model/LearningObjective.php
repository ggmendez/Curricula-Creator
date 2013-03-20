<?php

App::uses('AppModel', 'Model');

/**
 * LearningObjective Model
 *
 * @property Unit $Unit
 */
class LearningObjective extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'description';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'description' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'unit_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Unit' => array(
            'className' => 'Unit',
            'foreignKey' => 'unit_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'TopicType' => array(
            'className' => 'TopicType',
            'foreignKey' => 'topic_type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'MasteryLevel' => array(
            'className' => 'MasteryLevel',
            'foreignKey' => 'mastery_level_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );

}
