<?php
App::uses('AppModel', 'Model');
/**
 * CourseSubmit Model
 *
 */

class CourseSubmit extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'courseSubmits';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'course_id';

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
		),		
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)	
	);
}
