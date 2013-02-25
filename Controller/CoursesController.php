<?php
App::uses('AppController', 'Controller');
/**
 * Courses Controller
 *
 * @property Course $Course
 */
class CoursesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
public $helpers = array('Js');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Course->recursive = 0;
		$this->set('courses', $this->paginate());

		$this->set('title_for_layout', 'List Course');        
		$this->layout = 'main';	    			
	}



	public function searchRp() {

    	if(!empty($this->request->data)){

			$conditions = array(
							'OR'=>array(
            							'User.username'=>$this->request->data['User']['username'],
            							'User.fullname LIKE '=> '%' . $this->request->data['User']['username'] . '%'
            							)
							);

            $users = $this->Course->User->find('all', array('conditions' => $conditions));
  		 	$this->set('users', $users);
    		
			if($this->request->is('ajax')){ 
    			$this->render('users', 'ajax');
    		}
    	}

		$this->set('title_for_layout', 'Add Resource Person');        
		$this->layout = 'main';    	
	}

	public function addRp($id = null, $course_id = null) {

		$this->Course->id = $course_id;

		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}

		$group_id = $this->Auth->user('group_id');
		$user_id = $this->Auth->user('id');			
		$this->request->data['Course']['user_id'] = $id;

		if($group_id == 1 || $this->Course->Program->isCoordinator($course_id, $user_id)) {

			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('The RP has been assign succesfully'),'message');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view', $course_id,
				));
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.'));
			}

		}
		else {
			$this->Session->setFlash(__('You are not authorized to assign Resource Person for this course'),'error');

			$this->redirect(array('controller' => 'courses', 
								  'action' => 'view',
								  $course_id));			
		}	
	}

	public function copo($id = null) {
		$this->Course->recursive = -1;

		$programs = $this->Course->find('first', array(
												'conditions'=>array('Course.id'=>$id)
												// 'fields'=>array('program_id')
												)
										);

		$program_id = $programs['Course']['program_id'];

		$this->Course->recursive = 1;

		$outcomes = $this->Course->Outcome->find('all',array(
												 'fields'=>array('id','description'),
												 'conditions'=>array('course_id'=>$id)
												));

		$pos = $this->Course->Program->Po->find('list',array(
											'fields'=>array('id','description'),
											'conditions'=>array('program_id'=>$program_id)
											));

		$this->set(compact('programs','outcomes','pos'));

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

		$this->Course->id = $id;
		
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		
		$this->set('course', $this->Course->read(null, $id));

		$nodelist = $this->Course->Content->generateTreeList(
											 array('Content.course_id'=>$id
												  ),null,null,'&nbsp;&nbsp;&nbsp;');

		// $categories = $this->Category->generatetreelist(null,null,null,"|-- ");
    
    	$nodelist_array = array();
    
    	foreach($nodelist as $k => $v)
    	{
        $nodelist_array[$k] = $this->Course->Content->find('first', array('conditions' => array('Content.id' => $k)));
        $nodelist_array[$k]["Content"]["path"] = $v;
    	}

    	$this->set(compact('nodelist','nodelist_array'));
		
		$this->set('title_for_layout', 'View Course');        
		$this->layout = 'main';	    	
	}

/**
 * viewPdf method
 *
 * @param string $id
 * @return void
 */

	public function viewPdf($id = null) {
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		$this->set('course', $this->Course->read(null, $id));

		$nodelist = $this->Course->Content->generateTreeList(
											 array('Content.course_id'=>$id
												  ),null,null,'&nbsp;&nbsp;&nbsp;');

		// $categories = $this->Category->generatetreelist(null,null,null,"|-- ");
    
    	$nodelist_array = array();
    
    	foreach($nodelist as $k => $v)
    	{
        $nodelist_array[$k] = $this->Course->Content->find('first', array('conditions' => array('Content.id' => $k)));
        $nodelist_array[$k]["Content"]["path"] = $v;
    	}

    	$this->set(compact('nodelist','nodelist_array'));
		
		$this->set('title_for_layout', 'View Pdf Course');        
		$this->layout = 'pdf';
		$this->render();	    	
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Course->create();
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('The course has been saved'),'Manage');

				if( $this->request->data['Course']['program_id'] != '') {
					$this->redirect(array('controller' => 'programs', 
									  'action' => 'view',
									  $this->request->data['Course']['program_id']));
				}
				else {
					$this->redirect(array('controller' => 'courses', 
									  'action' => 'index'));					
				}
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.'));
			}
		}
		$faculties = $this->Course->Faculty->find('list');
		$programs = $this->Course->Program->find('list');
		$levels = $this->Course->Level->find('list');
		$this->set(compact('faculties', 'programs', 'levels'));

		$this->set('title_for_layout', 'Add New Course');        
		$this->layout = 'main';				
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('The course has been saved'),'Manage');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view', $id,
			));
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Course->read(null, $id);
		}
		$faculties = $this->Course->Faculty->find('list');
		$programs = $this->Course->Program->find('list');
		$levels = $this->Course->Level->find('list');
		$this->set(compact('faculties', 'programs', 'levels'));

		$this->set('title_for_layout', 'Edit Course');        
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
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		if ($this->Course->delete()) {
			$this->Session->setFlash(__('Course deleted'),'Manage');
			$this->redirect(array('controller' => 'programs', 
								  'action' => 'view', $this->params['url']['program_id']));
		}
		$this->Session->setFlash(__('Course was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
