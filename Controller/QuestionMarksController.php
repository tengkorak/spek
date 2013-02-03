<?php
App::uses('AppController', 'Controller');
/**
 * QuestionMarks Controller
 *
 * @property QuestionMark $QuestionMark
 */
class QuestionMarksController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->QuestionMark->recursive = 0;
		$this->set('questionMarks', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->QuestionMark->id = $id;
		if (!$this->QuestionMark->exists()) {
			throw new NotFoundException(__('Invalid question mark'));
		}
		$this->set('questionMark', $this->QuestionMark->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QuestionMark->create();
			if ($this->QuestionMark->save($this->request->data)) {
				$this->Session->setFlash(__('The question mark has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question mark could not be saved. Please, try again.'));
			}
		}
		$contents = $this->QuestionMark->Content->find('list');
		$pos = $this->QuestionMark->Po->find('list');
		$outcomes = $this->QuestionMark->Outcome->find('list');
		$slts = $this->QuestionMark->Slt->find('list');
		$this->set(compact('contents', 'pos', 'outcomes', 'slts'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->QuestionMark->id = $id;
		if (!$this->QuestionMark->exists()) {
			throw new NotFoundException(__('Invalid question mark'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QuestionMark->save($this->request->data)) {
				$this->Session->setFlash(__('The question mark has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question mark could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->QuestionMark->read(null, $id);
		}
		$contents = $this->QuestionMark->Content->find('list');
		$pos = $this->QuestionMark->Po->find('list');
		$outcomes = $this->QuestionMark->Outcome->find('list');
		$slts = $this->QuestionMark->Slt->find('list');
		$this->set(compact('contents', 'pos', 'outcomes', 'slts'));
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
		$this->QuestionMark->id = $id;
		if (!$this->QuestionMark->exists()) {
			throw new NotFoundException(__('Invalid question mark'));
		}
		if ($this->QuestionMark->delete()) {
			$this->Session->setFlash(__('Question mark deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Question mark was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
