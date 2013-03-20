<?php

App::uses('AppModel', 'Model');

/**
 * Unit Model
 *
 */
class Unit extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
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
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'core_tier_1_hours' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'core_tier_2_hours' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'knowledge_area_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'includes_electives' => array(
            'notempty' => array(
                'rule' => array('notempty'),
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
        'KnowledgeArea' => array(
            'className' => 'KnowledgeArea',
            'foreignKey' => 'knowledge_area_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasMany = array(
        'Topic' => array(
            'className' => 'Topic',
            'foreignKey' => 'unit_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'dependent' => true
        ),
        'LearningObjective' => array(
            'className' => 'LearningObjective',
            'foreignKey' => 'unit_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'dependent' => true
        ),
    );

}
