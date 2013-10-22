<?php
App::uses('AppModel', 'Model');
/**
 * Instruction Model
 *
 * @property Course $Course
 */
class Instruction extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
            'counterCache' => true
		)
	);

	public $hasAndBelongsToMany = array(
        'Outcome' =>
          	  array(
                'className'              => 'Outcome',
                'joinTable'              => 'instructions_outcomes',
                'foreignKey'             => 'instruction_id',
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
            )
    );
}
