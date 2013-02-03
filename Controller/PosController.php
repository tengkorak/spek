<?php
App::uses('AppController', 'Controller');
/**
 * Pos Controller
 *
 * @property Po $Po
 */
class PosController extends AppController {

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
		$this->Po->recursive = 1;
		$this->set('pos', $this->paginate());
	}

	public function popeo($id = null) {
		$this->Po->recursive = 1;

		$peos = $this->Po->Peo->find('list',array(
												 'fields'=>array('id','description'),
												 'conditions'=>array('program_id'=>$id)
												));
		$pos = $this->Po->find('all',array(
											'fields'=>array('id','description'),
											'conditions'=>array('program_id'=>$id)
											));
		$this->set(compact('peos','pos'));

		$this->set('title_for_layout', 'View Po/Peo Matrix');        
		$this->layout = 'main';				
	}

	public function poloki($id = null) {
		$this->Po->recursive = 1;

		$peos = $this->Po->Peo->find('list',array(
												 'fields'=>array('id','description'),
												 'conditions'=>array('program_id'=>$id)
												));
		$pos = $this->Po->find('all',array(
											'conditions'=>array('program_id'=>$id)
											));
		$this->set(compact('peos','pos'));

		$this->set('title_for_layout', 'View Po/Peo Matrix');        
		$this->layout = 'main';				
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Po->id = $id;
		if (!$this->Po->exists()) {
			throw new NotFoundException(__('Invalid po'));
		}
		$this->set('po', $this->Po->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Po->create();
			if ($this->Po->save($this->request->data)) {
				$this->Session->setFlash(__('The po has been saved'),'Message');
				$this->redirect(array('controller' => 'programs', 
									  'action' => 'view',
									  $this->request->data['Po']['program_id']));
				} else {
				$this->Session->setFlash(__('The po could not be saved. Please, try again.'));
			}
		}
		$program_id = $this->params['url']['program_id'];

		$peos = $this->Po->Peo->find('list', array('conditions' => 
									 			   array('Peo.program_id' => $program_id),
									 			  'fields' => array('Peo.id', 'Peo.description')
									 			  )
									);
		$this->set(compact('peos'));

		// $pos = $this->Outcome->Po->find('list',array('fields'=>array('id','description')));
		// $this->set(compact('pos'));
		$this->set('title_for_layout', 'Add New Program Outcome');        
		$this->layout = 'main';		
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Po->id = $id;
		if (!$this->Po->exists()) {
			throw new NotFoundException(__('Invalid po'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Po->save($this->request->data)) {
				$this->Session->setFlash(__('The po has been saved'),'Message');
				$this->redirect(array('controller' => 'programs', 
									  'action' => 'view',
									  $this->request->data['Po']['program_id']));
			} else {
				$this->Session->setFlash(__('The po could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Po->read(null, $id);
		}
		
		$program_id = $this->params['url']['program_id'];

		$peos = $this->Po->Peo->find('list', array('conditions' => 
									 			   array('Peo.program_id' => $program_id),
									 			  'fields' => array('Peo.id', 'Peo.description')
									 			  )
									);
		$this->set(compact('peos'));

		$this->set('title_for_layout', 'Edit Program Outcome');        
		$this->layout = 'main';	
//		$programs = $this->Po->Program->find('list');
//		$this->set(compact('programs'));
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
		$this->Po->id = $id;
		if (!$this->Po->exists()) {
			throw new NotFoundException(__('Invalid po'));
		}
		if ($this->Po->delete()) {
			$this->Session->setFlash(__('Po deleted'),'Message');
			$this->redirect(array('controller' => 'programs', 
								  'action' => 'view',
								  $this->params['url']['program_id']));		
			}
		$this->Session->setFlash(__('Po was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
