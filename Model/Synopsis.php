<?php
App::uses('AppModel', 'Model');
/**
 * Synopsis Model
 *
 * @property Course $Course
 */
class Synopsis extends AppModel {
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
		)
	);
}
