<?php
App::uses('AppModel', 'Model');
/**
 * Slt Model
 *
 * @property Course $Course
 * @property Content $Content
 */
class Slt extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'week';

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

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Content' => array(
			'className' => 'Content',
			'joinTable' => 'contents_slts',
			'foreignKey' => 'slt_id',
			'associationForeignKey' => 'content_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
