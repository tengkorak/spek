<?php
App::uses('AppController', 'Controller');
/**
 * Slts Controller
 *
 * @property Slt $Slt
 */
class SltsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Slt->recursive = 0;
		$this->set('slts', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {

    	$slts = $this->Slt->find('all', array(
        	'conditions' => array(
        						'Slt.course_id' => $id
        						),
        	'order' => array(
        					'Slt.week ASC'
        					)
    		));

		$this->set(compact('slts'));
		$this->set('title_for_layout', 'View Student Learning Time (SLT)');        
		$this->layout = 'main';
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {

		if ($this->request->is('post')) {
		
			$this->Slt->create();
		
			if ($this->Slt->save($this->request->data)) {
				$this->Session->setFlash(__('The slt has been saved'),'message');
				$this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The slt could not be saved. Please, try again.'));
			}
		}

    	$contents = $this->Slt->Content->find('list', array(
        	'fields' => array(
        					'Content.id',
        					'Content.description'
        					),
        	'conditions' => array(
        						'Content.course_id' => $id,
        						'Content.parent_id' => 0
        						)
    		));

		$this->set(compact('contents'));
		$this->set('title_for_layout', 'Add New Student Learning Time (SLT)');        
		$this->layout = 'main';		
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Slt->id = $id;

		if (!$this->Slt->exists()) {
			throw new NotFoundException(__('Invalid slt'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Slt->save($this->request->data)) {
				$this->Session->setFlash(__('The slt has been saved'),'message');
				$this->redirect(array('action' => 'view',$this->request->data['Slt']['course_id']));			
			} else {
				$this->Session->setFlash(__('The slt could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Slt->read(null, $id);
		}

    	$contents = $this->Slt->Content->find('list', array(
        	'fields' => array(
        					'Content.id',
        					'Content.description'
        					),
        	'conditions' => array(
        						'Content.course_id' => $this->request->data['Slt']['course_id'],
        						'Content.parent_id' => 0
        						)
    		));
		
		$this->set(compact('contents'));
		$this->set('title_for_layout', 'Edit Student Learning Time (SLT)');        
		$this->layout = 'main';		

	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null, $course_id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Slt->id = $id;
		if (!$this->Slt->exists()) {
			throw new NotFoundException(__('Invalid slt'));
		}
		if ($this->Slt->delete()) {
			$this->Session->setFlash(__('Slt deleted'),'message');
			$this->redirect(array('action' => 'view',$course_id));			
		}
		$this->Session->setFlash(__('Slt was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
