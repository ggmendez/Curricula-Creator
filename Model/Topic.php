<?php

App::uses('AppModel', 'Model');

/**
 * Topic Model
 *
 * @property Unit $Unit
 */
class Topic extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    public $validate = array(
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
    );

}
