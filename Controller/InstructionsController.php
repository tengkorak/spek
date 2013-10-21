<?php
App::uses('AppController', 'Controller');
/**
 * Instructions Controller
 *
 * @property Instruction $Instruction
 */
class InstructionsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
 // public $helpers = array('Ajax');
public $helpers = array('Js');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Instruction->recursive = 0;
		$this->set('instructions', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Instruction->id = $id;
		if (!$this->Instruction->exists()) {
			throw new NotFoundException(__('Invalid instruction'));
		}
		$this->set('instruction', $this->Instruction->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Instruction->create();
			if ($this->Instruction->save($this->request->data)) {
				$this->Session->setFlash(__('The instruction has been saved'),'message');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view',
									  $this->request->data['Instruction']['course_id']));
			} else {
				$this->Session->setFlash(__('The instruction could not be saved. Please, try again.'));
			}
		}
		// $courses = $this->Instruction->Course->find('list');
		// $this->set(compact('courses'));

		$this->set('title_for_layout', 'Add New Instruction');        
		$this->layout = 'main';				
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Instruction->id = $id;
		if (!$this->Instruction->exists()) {
			throw new NotFoundException(__('Invalid instruction'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Instruction->save($this->request->data)) {
				$this->Session->setFlash(__('The instruction has been saved'),'Message');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view',
									  $this->request->data['Instruction']['course_id']));
			} else {
				$this->Session->setFlash(__('The instruction could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Instruction->read(null, $id);
		}
		// $courses = $this->Instruction->Course->find('list');
		// $this->set(compact('courses'));

		$this->set('title_for_layout', 'Edit Sysnopsis');        
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
		$this->Instruction->id = $id;
		if (!$this->Instruction->exists()) {
			throw new NotFoundException(__('Invalid instruction'));
		}
		if ($this->Instruction->delete()) {
			$this->Session->setFlash(__('Instruction deleted'),'Message');
			$this->redirect(array('controller' => 'courses', 
								  'action' => 'view',
								  $this->params['url']['course_id']));		}
		$this->Session->setFlash(__('Instruction was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
* reorder method
*
* @return void
*
*/
	public function reorder() {
		foreach ($this->data['instruction'] as $key => $value) {
			$this->Instruction->id = $value;
			$this->Instruction->saveField("sort_order",$key + 1);
		}
	$this->log(print_r($this->data['instruction'],true));
	exit();
	}


}
