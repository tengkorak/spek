<?php
App::uses('AppController', 'Controller');
/**
 * QuestionTypes Controller
 *
 * @property QuestionType $QuestionType
 */
class QuestionTypesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->QuestionType->recursive = 0;
		$this->set('questionTypes', $this->paginate());
	}

/**
 * jsu method
 *
 * @param string $id
 * @return void
 */
	public function jsu($id = null) {

		$this->QuestionType->Behaviors->load('Containable');
		
    	$questionTypes = $this->QuestionType->find('all', array(
			'contain' => array('Content' => array('Slt',
												  'Outcome' => array('Po')
												  )
							   ),
			'fields' => array(
							 'QuestionType.*, Content.description'
								),
        	'conditions' => array(
        						'QuestionType.course_id' => $id,
        						'QuestionType.jsu' => 1
        						),
  	     	'order' => array(
        					'QuestionType.content_id ASC'
        					)

        	));

    	$occurences = $this->QuestionType->find('all', array(
			'fields' => array(
							 'content_id, COUNT(*) c'
								),
        	'conditions' => array(
        						'QuestionType.course_id' => $id,
        						'QuestionType.jsu' => 1
        						),
        	'group' => 'QuestionType.content_id',
  	     	'order' => array(
        					'QuestionType.content_id ASC'
        					)

        	));

		$this->set(compact('questionTypes','occurences'));
		$this->set('title_for_layout', 'View JSU');        
		$this->layout = 'main';
	}


	public function jsub($id = null) {

		$this->QuestionType->Behaviors->load('Containable');
		
    	$questionTypes = $this->QuestionType->find('all', array(
			'contain' => array('Content' => array('Slt',
												  'Outcome' => array('Po')
												  )
							   ),
			'fields' => array(
							 'QuestionType.*, Content.description'
								),
        	'conditions' => array(
        						'QuestionType.course_id' => $id,
        						'QuestionType.jsu' => 2
        						),
  	     	'order' => array(
        					'QuestionType.content_id ASC'
        					)

        	));

    	$occurences = $this->QuestionType->find('all', array(
			'fields' => array(
							 'content_id, COUNT(*) c'
								),
        	'conditions' => array(
        						'QuestionType.course_id' => $id,
        						'QuestionType.jsu' => 2
        						),
        	'group' => 'QuestionType.content_id',
  	     	'order' => array(
        					'QuestionType.content_id ASC'
        					)

        	));

		$this->set(compact('questionTypes','occurences'));
		$this->set('title_for_layout', 'View JSU');        
		$this->layout = 'main';
	}

	public function jsup($id = null) {

		$this->QuestionType->Behaviors->load('Containable');
		
    	$questionTypes = $this->QuestionType->find('all', array(
			'contain' => array('Content' => array('Slt',
												  'Outcome' => array('Po')
												  )
							   ),
			'fields' => array(
							 'QuestionType.*, Content.description'
								),
        	'conditions' => array(
        						'QuestionType.course_id' => $id,
        						'QuestionType.jsu' => 3
        						),
  	     	'order' => array(
        					'QuestionType.content_id ASC'
        					)

        	));

    	$occurences = $this->QuestionType->find('all', array(
			'fields' => array(
							 'content_id, COUNT(*) c'
								),
        	'conditions' => array(
        						'QuestionType.course_id' => $id,
        						'QuestionType.jsu' => 3
        						),
        	'group' => 'QuestionType.content_id',
  	     	'order' => array(
        					'QuestionType.content_id ASC'
        					)

        	));

		$this->set(compact('questionTypes','occurences'));
		$this->set('title_for_layout', 'View JSU');        
		$this->layout = 'main';
	}	
/**
 * add method
 *
 * @return void
 */
	public function add($id = null, $jsu = null) {
		if ($this->request->is('post')) {

			$this->request->data['QuestionType']['jsu'] = $jsu;

			$this->QuestionType->create();
			if ($this->QuestionType->save($this->request->data)) {
				$this->Session->setFlash(__('The question type has been saved'),'message');

				if($jsu == 1)
					$view = 'jsu';
				else if($jsu == 2)
					$view = 'jsub';
				else if($jsu == 3)
					$view = 'jsup';

				$this->redirect(array('action' => $view,$id));
			} else {
				$this->Session->setFlash(__('The question type could not be saved. Please, try again.'));
			}
		}

		$this->QuestionType->Content->recursive = 0;

    	$contents = $this->QuestionType->Content->find('list', array(
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
		$this->QuestionType->id = $id;
		if (!$this->QuestionType->exists()) {
			throw new NotFoundException(__('Invalid question type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QuestionType->save($this->request->data)) {
				$this->Session->setFlash(__('The question type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question type could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->QuestionType->read(null, $id);
		}
		$contents = $this->QuestionType->Content->find('list');
		$pos = $this->QuestionType->Po->find('list');
		$outcomes = $this->QuestionType->Outcome->find('list');
		$slts = $this->QuestionType->Slt->find('list');
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
		$this->QuestionType->id = $id;
		if (!$this->QuestionType->exists()) {
			throw new NotFoundException(__('Invalid question type'));
		}
		if ($this->QuestionType->delete()) {
			$this->Session->setFlash(__('Question type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Question type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
