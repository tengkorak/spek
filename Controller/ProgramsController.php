<?php
App::uses('AppController', 'Controller', 'AuthComponent', 'Controller/Component');

/**
 * Programs Controller
 *
 * @property Program $Program
 */
class ProgramsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
public $helpers = array('Js');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Program->recursive = 0;

		$group = $this->Auth->user('group_id');

		if( $group == 2 ) { 		 //If user is RP
			$this->paginate = array(
				'conditions' => array('Course.user_id' => $this->Auth->user('id')),
				'fields' => array(
								'DISTINCT Program.id, Program.name_be, Program.name_bm '
								),			
				'joins' => array(
						array(
							'alias' => 'Course',
							'table' => 'courses',
							'type' => 'INNER',
							'conditions' => 'Program.id = Course.program_id'
						)
				));
		}
		if( $group == 4 ) {			 //If user is Program Coordinator


			$conditions = array("OR" => array(
											  'Course.user_id' => $this->Auth->user('id'),
											  'Program.user_id' => $this->Auth->user('id')
											));

			$this->paginate = array(
				'conditions' => $conditions,
				'fields' => array(
								'DISTINCT Program.id, Program.name_be, Program.name_bm, Program.user_id, Course.user_id'
								),
				'order' => array('Program.user_id' => 'desc'),			
				'joins' => array(
						array(
							'alias' => 'Course',
							'table' => 'courses',
							'type' => 'INNER',
							'conditions' => 'Program.id = Course.program_id'
						)
				));
		}	
	
		$this->set('programs', $this->paginate());

		$this->set('title_for_layout', 'List Programs');        
		$this->layout = 'main';			
	}

/**
*
* search coordinator method
*
*/

	public function searchCoor() {

    	if(!empty($this->request->data)){

			$conditions = array(
							'OR'=>array(
            							'User.username'=>$this->request->data['User']['username'],
            							'User.fullname LIKE '=> '%' . $this->request->data['User']['username'] . '%'
            							)
							);

            $users = $this->Program->User->find('all', array('conditions' => $conditions));
  		 	$this->set('users', $users);
    		
			if($this->request->is('ajax')){ 
    			$this->render('users', 'ajax');
    		}
    	}

		$this->set('title_for_layout', 'Add Coordinator');
		$this->layout = 'main';    	
	}

/**
*
* add coordinator method
*
*/

	public function addCoor($id = null, $program_id = null) {

		$this->Program->id = $program_id;

		if (!$this->Program->exists()) {
			throw new NotFoundException(__('Invalid program'));
		}

		$group_id = $this->Auth->user('group_id');
		$this->request->data['Program']['user_id'] = $id;

		if($group_id == 1) {

			if ($this->Program->save($this->request->data)) {
				$this->Session->setFlash(__('The Pengerusi Program/KPP has been assign succesfully'),'message');
				$this->redirect(array('controller' => 'programs', 
									  'action' => 'view', $program_id,
				));
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.'));
			}

		}
		else {
			$this->Session->setFlash(__('You are not authorized to assign Pengerusi Program/KPP for this course'),'error');

			$this->redirect(array('controller' => 'programs', 
								  'action' => 'view',
								  $program_id));			
		}	
	}


/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {

		$this->Program->Behaviors->load('Containable');

		$this->Program->recursive = 1;

    	$programs = $this->Program->find('first', array(
			'contain' => array('Course' => array('User'),
							   'Peo',
							   'Po',
							   'Faculty',
							   'Level'),
        	'conditions' => array(
        						'Program.id' => $id
        						)
        	));

		$this->set('program', $programs);

		$this->set('title_for_layout', 'View Program');        
		$this->layout = 'main';		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Program->create();
			if ($this->Program->save($this->request->data)) {
				$this->Session->setFlash(__('The program has been saved'),'message');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The program could not be saved. Please, try again.'));
			}
		}
		$faculties = $this->Program->Faculty->find('list');
		$levels = $this->Program->Level->find('list');
		$this->set(compact('faculties', 'levels'));

		$this->set('title_for_layout', 'Add New Program');        
		$this->layout = 'main';			
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Program->id = $id;
		if (!$this->Program->exists()) {
			throw new NotFoundException(__('Invalid program'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Program->save($this->request->data)) {
				$this->Session->setFlash(__('The program has been saved'),'message');
				$this->redirect(array('controller' => 'programs', 
									  'action' => 'view',
									  $this->request->data['Program']['id']));
			} else {
				$this->Session->setFlash(__('The program could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Program->read(null, $id);
		}
		$faculties = $this->Program->Faculty->find('list');
		$levels = $this->Program->Level->find('list');
		$this->set(compact('faculties', 'levels'));

		$this->set('title_for_layout', 'Edit Program');        
		$this->layout = 'main';
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Program->id = $id;
		if (!$this->Program->exists()) {
			throw new NotFoundException(__('Invalid program'));
		}
		if ($this->Program->delete()) {
			$this->Session->setFlash(__('Program deleted'),'message');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Program was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
