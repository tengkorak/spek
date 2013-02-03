<?php
App::uses('AppModel', 'Model');
/**
 * Group Model
 *
 */
class Group extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

    public $actsAs = array('Acl' => array('type' => 'requester'));

    public $hasMany = array('User');

    public function parentNode() {
        return null;
    }	
}