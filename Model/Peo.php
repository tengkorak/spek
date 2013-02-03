<?php
App::uses('AppModel', 'Model');
/**
 * Peo Model
 *
 * @property Program $Program
 */
class Peo extends AppModel {
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
		'Program' => array(
			'className' => 'Program',
			'foreignKey' => 'program_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasAndBelongsToMany = array(
        'Po' =>
            array(
                'className'              => 'Po',
                'joinTable'              => 'peos_pos',
                'foreignKey'             => 'peo_id',
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
            )
    );
}
