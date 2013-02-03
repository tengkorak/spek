<?php
App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

/**
 * Faculties Controller
 *
 * @property Faculty $Faculty
 */
class FacultiesController extends AppController {

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
		$this->Faculty->recursive = 0;
		$this->set('faculties', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Faculty->id = $id;
		if (!$this->Faculty->exists()) {
			throw new NotFoundException(__('Invalid faculty'));
		}
		$this->set('faculty', $this->Faculty->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Faculty->create();
			if ($this->Faculty->save($this->request->data)) {
				$this->Session->setFlash(__('The faculty has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The faculty could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Faculty->id = $id;
		if (!$this->Faculty->exists()) {
			throw new NotFoundException(__('Invalid faculty'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Faculty->save($this->request->data)) {
				$this->Session->setFlash(__('The faculty has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The faculty could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Faculty->read(null, $id);
		}
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
		$this->Faculty->id = $id;
		if (!$this->Faculty->exists()) {
			throw new NotFoundException(__('Invalid faculty'));
		}
		if ($this->Faculty->delete()) {
			$this->Session->setFlash(__('Faculty deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Faculty was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
