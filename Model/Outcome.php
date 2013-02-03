<?php
App::uses('AppModel', 'Model');
/**
 * Outcome Model
 *
 * @property Course $Course
 */
class Outcome extends AppModel {
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
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasAndBelongsToMany = array(
        'Po' =>
            array(
                'className'              => 'Po',
                'joinTable'              => 'outcomes_pos',
                'foreignKey'             => 'outcome_id',
                'associationForeignKey'  => 'po_id',
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
        'Instruction' =>
            array(
                'className'              => 'Instruction',
                'joinTable'              => 'instructions_outcomes',
                'foreignKey'             => 'outcome_id',
                'associationForeignKey'  => 'instruction_id',
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
        'Assessment' =>
            array(
                'className'              => 'Assessment',
                'joinTable'              => 'assessments_outcomes',
                'foreignKey'             => 'outcome_id',
                'associationForeignKey'  => 'assessment_id',
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
        'Content' =>
            array(
                'className'              => 'Outcome',
                'joinTable'              => 'contents_outcomes',
                'foreignKey'             => 'outcome_id',
                'associationForeignKey'  => 'content_id',
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
