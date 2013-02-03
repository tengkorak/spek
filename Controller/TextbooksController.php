<?php
App::uses('AppController', 'Controller');
/**
 * Textbooks Controller
 *
 * @property Textbook $Textbook
 */
class TextbooksController extends AppController {

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
		$this->Textbook->recursive = 0;
		$this->set('textbooks', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Textbook->id = $id;
		if (!$this->Textbook->exists()) {
			throw new NotFoundException(__('Invalid textbook'));
		}
		$this->set('textbook', $this->Textbook->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Textbook->create();
			if ($this->Textbook->save($this->request->data)) {
				$this->Session->setFlash(__('The textbook has been saved'),'Message');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view',
									  $this->request->data['Textbook']['course_id']));				
			} else {
				$this->Session->setFlash(__('The textbook could not be saved. Please, try again.'));
			}
		}

	$this->set('title_for_layout', 'Add Textbook');        
	$this->layout = 'main';
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Textbook->id = $id;
		if (!$this->Textbook->exists()) {
			throw new NotFoundException(__('Invalid textbook'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Textbook->save($this->request->data)) {
				$this->Session->setFlash(__('The textbook has been saved'),'Message');
				$this->redirect(array('controller' => 'courses', 
								  'action' => 'view', $this->request->data['Textbook']['course_id']
								  ));					
			} else {
				$this->Session->setFlash(__('The textbook could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Textbook->read(null, $id);
		}
	$this->set('title_for_layout', 'Edit Textbook');        
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
		$this->Textbook->id = $id;
		if (!$this->Textbook->exists()) {
			throw new NotFoundException(__('Invalid textbook'));
		}
		if ($this->Textbook->delete()) {
			$this->Session->setFlash(__('Textbook deleted'),'Message');
			$this->redirect(array('controller' => 'courses', 
								  'action' => 'view', $this->params['url']['course_id']));		
		}
		$this->Session->setFlash(__('Textbook was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
* reorder method
*
* @return void
*
*/
	public function reorder() {
		foreach ($this->data['texbook'] as $key => $value) {
			$this->Textbook->id = $value;
			$this->Textbook->saveField("sort_order",$key + 1);
		}
	$this->log(print_r($this->data['textbook'],true));
	exit();
	}	
}
