<?php

App::uses('AppModel', 'Model');

/**
 * KnowledgeArea Model
 *
 */
class KnowledgeArea extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';

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
            'numeric' => array(
                'rule' => array('numeric'),
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
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'abbreviation' => array(
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
    
    public $hasMany = array(
        'Unit' => array(
            'className' => 'Unit',
            'foreignKey' => 'knowledge_area_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'dependent' => true
        ),        
    );
    
    public $belongsTo = array(
        'BodyKnowledge' => array(
            'className' => 'BodyKnowledge',
            'foreignKey' => 'body_knowledge_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );

}
