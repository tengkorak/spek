<?php
App::uses('AppModel', 'Model');
/**
 * QuestionMark Model
 *
 * @property Content $Content
 * @property Po $Po
 * @property Outcome $Outcome
 * @property Slt $Slt
 */
class QuestionMark extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'questionMarks';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'content_id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Content' => array(
			'className' => 'Content',
			'foreignKey' => 'content_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Po' => array(
			'className' => 'Po',
			'foreignKey' => 'po_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Outcome' => array(
			'className' => 'Outcome',
			'foreignKey' => 'outcome_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Slt' => array(
			'className' => 'Slt',
			'foreignKey' => 'slt_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
