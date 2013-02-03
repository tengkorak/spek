<?php
App::uses('AppController', 'Controller');
/**
 * Assessments Controller
 *
 * @property Assessment $Assessment
 */
class AssessmentsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Assessment->recursive = 0;
		$this->set('assessments', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Assessment->id = $id;
		if (!$this->Assessment->exists()) {
			throw new NotFoundException(__('Invalid assessment'));
		}
		$this->set('assessment', $this->Assessment->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			if($this->request->data['Assessment']['type'] == 2) {

			$final = $this->Assessment->find('count', array(
											 'conditions' => array(
											 'Assessment.type' => 2,
											 'Assessment.course_id' => $this->request->data['Assessment']['course_id'])
											 ));

			if($final > 0) {
				$this->Session->setFlash(__('Error! Course could not have 2 Final Exams'),'Message');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view',
									  $this->request->data['Assessment']['course_id']));				
			}
			else {
				$this->request->data['Assessment']['name'] = 'Final';
			}
			
			}
			
			$total = $this->Assessment->find('all',
										array('fields'=>array('SUM(Assessment.percentage) AS total'),
											'conditions'=>array('Assessment.course_id'=>$this->request->data['Assessment']['course_id'])
											 ));

			if($total['0']['0']['total'] + $this->request->data['Assessment']['percentage'] > 100) {
				$this->Session->setFlash(__('Total assessment percentage has exceeded 100%.'),'Error');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view',
									  $this->request->data['Assessment']['course_id']));				
			}
			else {
			$total = $total['0']['0']['total'] + $this->request->data['Assessment']['percentage'];

			$this->Assessment->create();

			if ($this->Assessment->save($this->request->data)) {

				if($total < 100) {
					$this->Session->setFlash(__('Total percentage is less than 100%.'),'Notice');
				}
				else {
					$this->Session->setFlash(__('The assessment has been saved'),'Message');					
				}
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view',
									  $this->request->data['Assessment']['course_id']));
			} else {
				$this->Session->setFlash(__('The assessment could not be saved. Please, try again.'));
			}
			}
		}

		$this->set('title_for_layout', 'Add Assessment');        
		$this->layout = 'main';				
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Assessment->id = $id;
		if (!$this->Assessment->exists()) {
			throw new NotFoundException(__('Invalid assessment'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {

			if($this->request->data['Assessment']['type'] == 2) {

			$final = $this->Assessment->find('count', array(
											 'conditions' => array(
											 'Assessment.type' => 2,
											 'Assessment.course_id' => $this->request->data['Assessment']['course_id'])
											 ));

			if($final > 0) {
				$this->Session->setFlash(__('Error! Course could not have 2 Final Exams'),'Message');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view',
									  $this->request->data['Assessment']['course_id']));				
			}
			else {
				$this->request->data['Assessment']['name'] = 'Final';
			}
			
			}

			if ($this->Assessment->save($this->request->data)) {
				$this->Session->setFlash(__('The assessment has been saved'),'Message');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view',
									  $this->request->data['Assessment']['course_id']));
			} else {
				$this->Session->setFlash(__('The assessment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Assessment->read(null, $id);
		}
		$this->set('title_for_layout', 'Edit Assessment');        
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
		$this->Assessment->id = $id;
		if (!$this->Assessment->exists()) {
			throw new NotFoundException(__('Invalid assessment'));
		}
		if ($this->Assessment->delete()) {
			$this->Session->setFlash(__('Assessment deleted'),'Message');
			$this->redirect(array('controller' => 'courses', 
								  'action' => 'view', $this->params['url']['course_id']));		
		}
		$this->Session->setFlash(__('Assessment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
