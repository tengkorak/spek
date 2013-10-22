<?php
App::uses('AppModel', 'Model');
/**
 * Content Model
 *
 * @property Course $Course
 */
class Content extends AppModel {

public $name = 'Content';
public $actsAs = array('Tree');

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
			'order' => '',
			'counterCache' => true			
		),
	);

	public $hasAndBelongsToMany = array(
		'Slt' => 
			array(
				'className' => 'Slt',
				'joinTable' => 'contents_slts',
				'foreignKey' => 'content_id',
				'associationForeignKey' => 'slt_id',
				'unique' => 'keepExisting',
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'limit' => '',
				'offset' => '',
				'finderQuery' => '',
				'deleteQuery' => '',
				'insertQuery' => ''
		),
        'Outcome' =>
          	array(
                'className'              => 'Outcome',
                'joinTable'              => 'contents_outcomes',
                'foreignKey'             => 'content_id',
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
