<?php
App::uses('AppController', 'Controller');
/**
 * Outcomes Controller
 *
 * @property Outcome $Outcome
 */
class OutcomesController extends AppController {

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
		$this->Outcome->recursive = 0;
		$this->paginate['order'] = 'Outcome.sort_order';
		$this->set('outcomes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Outcome->id = $id;
		if (!$this->Outcome->exists()) {
			throw new NotFoundException(__('Invalid outcome'));
		}
		$this->set('outcome', $this->Outcome->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Outcome->create();
			if ($this->Outcome->save($this->request->data)) {
				$this->Session->setFlash(__('The outcome has been saved'),'Message');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view',
									  $this->request->data['Outcome']['course_id']));
			} else {
				$this->Session->setFlash(__('The outcome could not be saved. Please, try again.'));
			}
		}
		
		$pos = $this->Outcome->Po->find('list',array(
										'joins'=>array(
												array(
													'table'=>'courses',
													'alias'=>'Course',
													'type'=>'inner',
													'foreignKey'=>false,
													'conditions'=>array('Po.program_id = Course.program_id')
													)),
										'fields'=>array('id','description'),
										'conditions'=>array('Course.id'=>$this->params['url']['course_id'])
										));

		$instructions = $this->Outcome->Instruction->find('list',
										array(
											  'fields'=>array('id','name'),
											  'conditions'=>array('course_id'=>$this->params['url']['course_id'])
											  ));

		$assessments = $this->Outcome->Assessment->find('list',
										array(
											  'fields'=>array('id','name'),
											  'conditions'=>array(
											  					'course_id'=>$this->params['url']['course_id'],
											  					'type'=>1
											  					)
											  ));

		$this->set(compact('pos','instructions','assessments'));

		$this->set('title_for_layout', 'Add New Outcome');        
		$this->layout = 'main';	    			
	}
/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Outcome->id = $id;
		if (!$this->Outcome->exists()) {
			throw new NotFoundException(__('Invalid outcome'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Outcome->save($this->request->data)) {
				$this->Session->setFlash(__('The outcome has been saved'),'Message');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view',
									  $this->request->data['Outcome']['course_id']));
			} else {
				$this->Session->setFlash(__('The outcome could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Outcome->read(null, $id);
		}

		$pos = $this->Outcome->Po->find('list',array(
										'joins'=>array(
												array(
													'table'=>'courses',
													'alias'=>'Course',
													'type'=>'inner',
													'foreignKey'=>false,
													'conditions'=>array('Po.program_id = Course.program_id')
													)),
										'fields'=>array('id','description'),
										'conditions'=>array('Course.id'=>$this->request->data['Outcome']['course_id'])
										));

		$instructions = $this->Outcome->Instruction->find('list',
										array(
											  'fields'=>array('id','name'),
											  'conditions'=>array('course_id'=>$this->request->data['Outcome']['course_id'])
											  ));

		$assessments = $this->Outcome->Assessment->find('list',
										array(
											  'fields'=>array('id','name'),
											  'conditions'=>array(
											  					'course_id'=>$this->request->data['Outcome']['course_id'],
											  					'type'=>1
											  					)
											  ));

		$this->set(compact('pos','instructions','assessments'));

		$this->set('title_for_layout', 'Edit Outcome');        
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
		$this->Outcome->id = $id;
		if (!$this->Outcome->exists()) {
			throw new NotFoundException(__('Invalid outcome'));
		}
		if ($this->Outcome->delete()) {
			$this->Session->setFlash(__('Outcome deleted'),'Message');
			$this->redirect(array('controller' => 'courses', 
								  'action' => 'view',
								  $this->params['url']['course_id']));		}
		$this->Session->setFlash(__('Outcome was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
* reorder method
*
* @return void
*
*/
	public function reorder() {
		foreach ($this->data['outcome'] as $key => $value) {
			$this->Outcome->id = $value;
			$this->Outcome->saveField("sort_order",$key + 1);
		}
	$this->log(print_r($this->data['outcome'],true));
	exit();
	}
}
