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
	public function add() {
		if ($this->request->is('post')) {

			$this->Synopsis->Course->recursive = -1;

		    $id = $this->Auth->user('id');

		    $valid = $this->Synopsis->Course->find('first', array(
								'conditions' => array(
													'Course.user_id' => $id,
													'Course.id'=> $this->request->data['Synopsis']['course_id']
													)
								)
		    );

		    if(!empty($valid)) {
				$this->Synopsis->create();
				if ($this->Synopsis->save($this->request->data)) {
					$this->Session->setFlash(__('The synopsis has been saved'),'Message');
				
					$this->redirect(array('controller' => 'courses', 
										  'action' => 'view',
										  $this->request->data['Synopsis']['course_id']));
				} else {
					$this->Session->setFlash(__('The synopsis could not be saved. Please, try again.'));
				}
			}
			else {
					$this->Session->setFlash(__('You are not authorized to add new synopsis for this course'),'Message');

					$this->redirect(array('controller' => 'courses', 
										  'action' => 'view',
										  $this->request->data['Synopsis']['course_id']));				
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
	public function edit($id = null) {
		$this->Synopsis->id = $id;
		if (!$this->Synopsis->exists()) {
			throw new NotFoundException(__('Invalid synopsis'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {


			if ($this->Synopsis->save($this->request->data)) {
				$this->Session->setFlash(__('The synopsis has been saved'),'Message');
				$this->redirect(array('controller' => 'courses', 
								  'action' => 'view', $this->request->data['Synopsis']['course_id']
								  ));					
			} else {
				$this->Session->setFlash(__('The synopsis could not be saved. Please, try again.'));
			}
		} else {
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
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Synopsis->id = $id;
		if (!$this->Synopsis->exists()) {
			throw new NotFoundException(__('Invalid synopsis'));
		}
		if ($this->Synopsis->delete()) {
			$this->Session->setFlash(__('Synopsis deleted'),'Message');
			$this->redirect(array('controller' => 'courses', 
								  'action' => 'view', $this->params['url']['course_id']));		
			}
		$this->Session->setFlash(__('Synopsis was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
