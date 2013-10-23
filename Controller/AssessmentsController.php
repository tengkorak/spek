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
	public function add($id = null, $pid = null) {
		if ($this->request->is('post')) {
			
			if($this->request->data['Assessment']['type'] == 2) {

			$final = $this->Assessment->find('count', array(
											 'conditions' => array(
											 'Assessment.type' => 2,
											 'Assessment.course_id' => $this->request->data['Assessment']['course_id'])
											 ));

			if($final > 0) {
				$this->Session->setFlash(__('Error! Course could not have 2 Final Exams'),'error');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view',
									  $this->request->data['Assessment']['course_id'], $pid));				
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
				$this->Session->setFlash(__('Total assessment percentage has exceeded 100%.'),'error');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view',
									  $this->request->data['Assessment']['course_id'],$pid));				
			}
			else {
			$total = $total['0']['0']['total'] + $this->request->data['Assessment']['percentage'];

			$user_id = $this->Auth->user('id');

			if($this->Assessment->Course->isResourcePerson($this->request->data['Assessment']['course_id'],$user_id)) {
			
				$this->Assessment->create();

				if ($this->Assessment->save($this->request->data)) {

					if($total < 100) {
						$this->Session->setFlash(__('Reminder: Total percentage is still less than 100%.'),'Notice');
					}
					else {
						$this->Session->setFlash(__('The assessment has been saved'),'Message');					
					}
					$this->redirect(array('controller' => 'courses', 
										  'action' => 'view',
										  $this->request->data['Assessment']['course_id'],$pid));
				} else {
					$this->Session->setFlash(__('The assessment could not be saved. Please, try again.'));
				}
			}
			else {
					$this->Session->setFlash(__('Sorry but only RP is authorized to add new course assessment.'),'message');

					$this->redirect(array('controller' => 'courses', 
										  'action' => 'view',
										  $this->request->data['Assessment']['course_id'],$pid));				
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
	public function edit($id = null,  $cid = null, $pid = null) {
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
									  $this->request->data['Assessment']['course_id'],$pid));				
			}
			else {
				$this->request->data['Assessment']['name'] = 'Final';
			}
			
			}

			$user_id = $this->Auth->user('id');

			if($this->Assessment->Course->isResourcePerson($this->request->data['Assessment']['course_id'],$user_id)) {			

				if ($this->Assessment->save($this->request->data)) {
					$this->Session->setFlash(__('The assessment has been saved'),'Message');
					$this->redirect(array('controller' => 'courses', 
										  'action' => 'view',
										  $this->request->data['Assessment']['course_id'],$pid));
				} else {
					$this->Session->setFlash(__('The assessment could not be saved. Please, try again.'));
				}
			}
			else {
					$this->Session->setFlash(__('Sorry but only RP is authorized to edit course assessment.'),'message');

					$this->redirect(array('controller' => 'courses', 
										  'action' => 'view',
										  $this->request->data['Assessment']['course_id'],$pid));				
			}			
		} else {
			$this->request->data = $this->Assessment->read(null, $id);
		}

		$this->set('title_for_layout', 'Edit Course Assessment');        
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
		$this->Assessment->id = $id;
		if (!$this->Assessment->exists()) {
			throw new NotFoundException(__('Invalid assessment'));
		}

		$user_id = $this->Auth->user('id');

		if($this->Assessment->Course->isResourcePerson($cid,$user_id)) {

			if ($this->Assessment->delete()) {
				$this->Session->setFlash(__('Assessment deleted'),'message');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view', $cid, $pid
									  ));		
			}
		} else {
			$this->Session->setFlash(__('Sorry but only RP is authorized to delete course assessment.'),'message');

			$this->redirect(array('controller' => 'courses', 
								  'action' => 'view',
								  $cid, $pid
								  ));				
		}

		$this->Session->setFlash(__('Assessment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
