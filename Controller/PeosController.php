<?php
App::uses('AppController', 'Controller');
/**
 * Peos Controller
 *
 * @property Peo $Peo
 */
class PeosController extends AppController {

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
		$this->Peo->recursive = 0;
		$this->set('peos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Peo->id = $id;
		if (!$this->Peo->exists()) {
			throw new NotFoundException(__('Invalid peo'));
		}
		$this->set('peo', $this->Peo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Peo->create();
			if ($this->Peo->save($this->request->data)) {
				$this->Session->setFlash(__('The program objective has been saved'),'Message');
				$this->redirect(array('controller' => 'programs', 
									  'action' => 'view',
									  $this->request->data['Peo']['program_id']));
			} else {
				$this->Session->setFlash(__('The peo could not be saved. Please, try again.'));
			}
		}
		$programs = $this->Peo->Program->find('list');
		$this->set(compact('programs'));

		$this->set('title_for_layout', 'Add Program Objective');        
		$this->layout = 'main';
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Peo->id = $id;
		if (!$this->Peo->exists()) {
			throw new NotFoundException(__('Invalid peo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Peo->save($this->request->data)) {
				$this->Session->setFlash(__('The program objetive has been saved'),'Message');
				$this->redirect(array('controller' => 'programs', 
									  'action' => 'view',
									  $this->request->data['Peo']['program_id']));
			} else {
				$this->Session->setFlash(__('The peo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Peo->read(null, $id);
		}
		$programs = $this->Peo->Program->find('list');
		$this->set(compact('programs'));

		$this->set('title_for_layout', 'Edit Program Objective');        
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
		$this->Peo->id = $id;
		if (!$this->Peo->exists()) {
			throw new NotFoundException(__('Invalid peo'));
		}
		if ($this->Peo->delete()) {
			$this->Session->setFlash(__('Peo deleted'),'Message');
			$this->redirect(array('controller' => 'programs', 
								  'action' => 'view',
								  $this->params['url']['program_id']));
		}
		$this->Session->setFlash(__('Peo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
