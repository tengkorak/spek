<?php
App::uses('AppModel', 'Model');
/**
 * Po Model
 *
 * @property Program $Program
 */
class Po extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'description';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Program' => array(
			'className' => 'Program',
			'foreignKey' => 'program_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);	

	public $hasAndBelongsToMany = array(
        'Outcome' =>
          	  array(
                'className'              => 'Outcome',
                'joinTable'              => 'outcomes_pos',
                'foreignKey'             => 'po_id',
                'associationForeignKey'  => 'outcome_id',
                'unique'                 => true,
                'conditions'             => '',
                'fields'                 => '',
                'order'                  => '',
                'limit'                  => '',
                'offset'                 => '',
                'finderQuery'            => '',
                'deleteQuery'            => '',
                'insertQuery'            => ''
            ),
         'Peo' =>
          	  array(
                'className'              => 'Peo',
                'joinTable'              => 'peos_pos',
                'foreignKey'             => 'po_id',
                'associationForeignKey'  => 'peo_id',
                'unique'                 => true,
                'conditions'             => '',
                'fields'                 => '',
                'order'                  => '',
                'limit'                  => '',
                'offset'                 => '',
                'finderQuery'            => '',
                'deleteQuery'            => '',
                'insertQuery'            => ''
            )        
    );
}
