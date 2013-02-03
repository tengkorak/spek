<?php
App::uses('AppModel', 'Model');
/**
 * QuestionType Model
 *
 * @property Content $Content
 * @property Po $Po
 * @property Outcome $Outcome
 * @property Slt $Slt
 */
class QuestionType extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'questionTypes';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'content_id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed


	/*
	$this->unbindModel(array(
	    'belongsTo' => array('Content')
	));
	 
	$this->bindModel(array(
	    'hasOne' => array(
	        'Content' => array(
	            'foreignKey' => false,
	            'conditions' => array('Content.id = QuestionType.content_id')
	        ),
	        'Outcome' => array(
	            'foreignKey' => false,
	            'conditions' => array('Outcome.id = Content.id')
	        ),
	        'Po' => array(
	            'foreignKey' => false,
	            'conditions' => array('Po.id = Outcome.id')
	        )
	    )
	));
	*/

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
		'Content' => array(
			'className' => 'Content',
			'foreignKey' => 'content_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)	
	);
}
