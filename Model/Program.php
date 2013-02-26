<?php
App::uses('AppModel', 'Model');
/**
 * Program Model
 *
 * @property Faculty $Faculty
 * @property Level $Level
 * @property Course $Course
 * @property Peo $Peo
 * @property Po $Po
 */
class Program extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name_be';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Faculty' => array(
			'className' => 'Faculty',
			'foreignKey' => 'faculty_id',
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
		),		
		'Level' => array(
			'className' => 'Level',
			'foreignKey' => 'level_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'program_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'semester',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Peo' => array(
			'className' => 'Peo',
			'foreignKey' => 'program_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Po' => array(
			'className' => 'Po',
			'foreignKey' => 'program_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function isCoordinator($course, $user) {
    return $this->field('id', array('id' => $course, 'user_id' => $user)) === $course;
	}


}
