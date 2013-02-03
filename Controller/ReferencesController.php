<?php
App::uses('AppController', 'Controller');
/**
 * References Controller
 *
 * @property Reference $Reference
 */
class ReferencesController extends AppController {

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
		$this->Reference->recursive = 0;
		$this->set('references', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Reference->id = $id;
		if (!$this->Reference->exists()) {
			throw new NotFoundException(__('Invalid reference'));
		}
		$this->set('reference', $this->Reference->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Reference->create();
			if ($this->Reference->save($this->request->data)) {
				$this->Session->setFlash(__('The reference has been saved'),'Message');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view',
									  $this->request->data['Reference']['course_id']));				
			} else {
				$this->Session->setFlash(__('The reference could not be saved. Please, try again.'));
			}
		}
	$this->set('title_for_layout', 'Add Reference');        
	$this->layout = 'main';		
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Reference->id = $id;
		if (!$this->Reference->exists()) {
			throw new NotFoundException(__('Invalid reference'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Reference->save($this->request->data)) {
				$this->Session->setFlash(__('The reference has been saved'),'Message');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view',
									  $this->request->data['Reference']['course_id']));				
			} else {
				$this->Session->setFlash(__('The reference could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Reference->read(null, $id);
		}
//		$courses = $this->Reference->Course->find('list');
//		$this->set(compact('courses'));

	$this->set('title_for_layout', 'Edit Reference');        
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
		$this->Reference->id = $id;
		if (!$this->Reference->exists()) {
			throw new NotFoundException(__('Invalid reference'));
		}
		if ($this->Reference->delete()) {
			$this->Session->setFlash(__('Reference deleted'),'Message');
			$this->redirect(array('controller' => 'courses', 
								  'action' => 'view', $this->params['url']['course_id']));		
		}
		$this->Session->setFlash(__('Reference was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
* reorder method
*
* @return void
*
*/
	public function reorder() {
		foreach ($this->data['reference'] as $key => $value) {
			$this->Reference->id = $value;
			$this->Reference->saveField("sort_order",$key + 1);
		}
	exit();
	}	
}
