<?php
App::uses('AppController', 'Controller');
/**
 * Synopses Controller
 *
 * @property Synopsis $Synopsis
 */
class SynopsesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
 // public $helpers = array('Ajax');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Synopsis->recursive = 0;
		$this->set('synopses', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Synopsis->id = $id;
		if (!$this->Synopsis->exists()) {
			throw new NotFoundException(__('Invalid synopsis'));
		}
		$this->set('synopsis', $this->Synopsis->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null, $pid = null) {
		if ($this->request->is('post')) {

		$this->Synopsis->Course->recursive = -1;

		$user_id = $this->Auth->user('id');

		if($this->Synopsis->Course->isResourcePerson($this->request->data['Synopsis']['course_id'],$user_id)) {
				$this->Synopsis->create();
				if ($this->Synopsis->save($this->request->data)) {
					$this->Session->setFlash(__('The synopsis has been saved'),'message');
				
					$this->redirect(array('controller' => 'courses', 
										  'action' => 'view',
										  $this->request->data['Synopsis']['course_id'],$pid));
				} else {
					$this->Session->setFlash(__('The synopsis could not be saved. Please, try again.'));
				}
			}
			else {
					$this->Session->setFlash(__('Sorry but only RP is authorized to add new course description.'),'message');

					$this->redirect(array('controller' => 'courses', 
										  'action' => 'view',
										  $this->request->data['Synopsis']['course_id'],$pid));				
			}
		}
		$this->set('title_for_layout', 'Add New Sysnopsis');        
		$this->layout = 'main';		
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $cid = null, $pid = null) {
		$this->Synopsis->id = $id;

		if (!$this->Synopsis->exists()) {
			throw new NotFoundException(__('Invalid synopsis'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

		$user_id = $this->Auth->user('id');

		if($this->Synopsis->Course->isResourcePerson($this->request->data['Synopsis']['course_id'],$user_id)) {

			if ($this->Synopsis->save($this->request->data)) {
				$this->Session->setFlash(__('The synopsis has been saved'),'message');
				$this->redirect(array('controller' => 'courses', 
								  'action' => 'view', $this->request->data['Synopsis']['course_id'], $pid
								  ));					
			} else {
				$this->Session->setFlash(__('The synopsis could not be saved. Please, try again.'));
			}
		} 
		else 	{
					$this->Session->setFlash(__('Sorry but only RP is authorized to add new course description.'),'message');

					$this->redirect(array('controller' => 'courses', 
										  'action' => 'view',
										  $this->request->data['Synopsis']['course_id'], $pid));				
				}
		}
		else {
			$this->request->data = $this->Synopsis->read(null, $id);
		}

		$this->set('title_for_layout', 'Edit Synopsis');        
		$this->layout = 'main';		
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null, $cid = null, $pid = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Synopsis->id = $id;
		if (!$this->Synopsis->exists()) {
			throw new NotFoundException(__('Invalid synopsis'));
		}

		$user_id = $this->Auth->user('id');

		if($this->Synopsis->Course->isResourcePerson($cid,$user_id)) {
			if ($this->Synopsis->delete()) {
				$this->Session->setFlash(__('Synopsis deleted'),'Message');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view', $cid, $pid
									  ));		
				}
		}
		else {
			$this->Session->setFlash(__('Sorry but only RP is authorized to delete course description.'),'message');

			$this->redirect(array('controller' => 'courses', 
								  'action' => 'view',
								  $cid, $pid
								  ));				
		}		

		$this->Session->setFlash(__('Synopsis was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
