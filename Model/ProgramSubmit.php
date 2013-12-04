<?php
App::uses('AppModel', 'Model');
/**
 * CourseSubmit Model
 *
 */

class ProgramSubmit extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'programSubmits';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'program_id';

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
