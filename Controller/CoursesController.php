<?php
App::uses('AppController', 'Controller','AuthComponent', 'Controller/Component');
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
		$program_id = $this->request->data['Course']['program_id'];

		if($group_id == 1 || $this->Course->Program->isCoordinator($program_id, $user_id)) {

			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('The RP has been assign succesfully'),'message');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view', $course_id
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

	public function view($id = null, $pid = null) {

		$this->Course->id = $id;
		
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		
    	$this->Course->unbindModel(
        	array(
        		  'hasAndBelongsToMany' => array('Program')
        		  )
    	);		

    	$courses = $this->Course->read(null, $id);

    	if($courses['Course']['submitted'] == 3) {
			$this->Session->setFlash(__('Your course submission has been disapproved. 
										Please click <a href="/courses/reason/' . $id . '/' . $pid .'"> here </a> to
										see the reason'),'Error');
    	}

		$this->set('course', $courses);

		$this->Course->Program->recursive = -1;
		$this->set('program', $this->Course->Program->read(null, $pid));

		$nodelist = $this->Course->Content->generateTreeList(
											 array('Content.course_id'=>$id
												  ),null,null,'&nbsp;&nbsp;&nbsp;');
    
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
 * submit method
 *
 * @param string $id
 * @return void
 */

	public function submit($id = null, $pid = null) {

		$this->Course->id = $id;
		$user_id = $this->Auth->user('id');			
		
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}

		$this->Course->CourseSubmit->create();

		$data = array();
		$data['Course']['id'] = $id;
		$data['Course']['submitted'] = 1;
		$data['CourseSubmit']['course_id'] = $id;
		$data['CourseSubmit']['user_id'] = $user_id;

		if( $this->Course->save($data)) {

			$this->Course->CourseSubmit->save($data);

			$this->Session->setFlash(__('The course has been succesfully submitted!'),'message');
				$this->redirect(array('controller' => 'courses', 
									  'action' => 'view', $id, $pid
				));			
		}
		
		$this->set('title_for_layout', 'View Course Information');
		$this->layout = 'main'; 	
	}

/**
 * reason method
 *
 * @param string $id
 * @return void
 */

	public function reason($id = null, $pid = null) {

    	$this->Course->CourseReject->unbindModel(
        	array(
        		  'belongsTo' => array('Course')
        		  )
    	);

		$rejects = $this->Course->CourseReject->find('all', array(
																 'fields' => array(
																 				   'CourseReject.created',
																 				   'CourseReject.reason',
																 				   'User.fullname'
																 				   ),
																 'conditions'=>array('CourseReject.course_id'=>$id)
																));

		$this->set('rejects', $rejects);
		
		$this->set('title_for_layout', 'View Course Disapproval Information');
		$this->layout = 'main'; 	
	}

/**
 * reject method
 *
 * @param string $id
 * @return void
 */

	public function reject($id = null, $pid = null) {

		if ($this->request->is('post')) {
			
			$this->Course->id = $id;
			$user_id = $this->Auth->user('id');		

			if (!$this->Course->exists()) {
				throw new NotFoundException(__('Invalid course'));
			}

			$this->Course->CourseReject->create();

			$data = array();
			$data['Course']['id'] = $id;
			$data['Course']['submitted'] = 3;
			$data['CourseReject']['course_id'] = $id;
			$data['CourseReject']['user_id'] = $user_id;	
			$data['CourseReject']['reason'] = $this->request->data['CourseReject']['reason'];			

			if( $this->Course->save($data)) {

				$this->Course->CourseReject->save($data);

				$this->Session->setFlash(__('The course has been disapproved'),'message');
					$this->redirect(array('controller' => 'programs', 
										  'action' => 'view', $pid
					));			
			}								
		}
		
		$this->set('title_for_layout', 'Reason to reject course submission');
		$this->layout = 'main'; 	
	}
/**
 * check method
 *
 * @param string $id
 * @return void
 */

	public function check($id = null, $pid = null) {

		$this->Course->id = $id;
		$user_id = $this->Auth->user('id');			
		
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}

		$this->Course->recursive = -1;
		
		$courses = $this->Course->find('all', array(
												'conditions'=>array('Course.id'=>$id)
										));

    	$this->Course->CourseSubmit->unbindModel(
        	array(
        		  'belongsTo' => array('Course')
        		  )
    	);

		$submits = $this->Course->CourseSubmit->find('all', array(
																 'fields' => array(
																 				   'CourseSubmit.created',
																 				   'User.fullname'
																 				   ),
																 'conditions'=>array('CourseSubmit.course_id'=>$id)
																));

		$this->set(compact('courses','submits'));
		
		$this->set('title_for_layout', 'View Course Summary');
		$this->layout = 'main'; 	
	}

/**
 * approved method
 *
 * @param string $id
 * @return void
 */

	public function approved($id = null, $pid = null) {

		$this->Course->id = $id;
		$user_id = $this->Auth->user('id');			
		
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}

		$data = array();
		$data['Course']['id'] = $id;
		$data['Course']['submitted'] = 2;

		if( $this->Course->save($data)) {

			$this->Session->setFlash(__('The course has been succesfully approved!'),'message');
				$this->redirect(array('controller' => 'programs', 
									  'action' => 'view', $pid
				));			
		}
		
		$this->set('title_for_layout', 'View Program Information');
		$this->layout = 'main'; 	
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
	
		$this->Course->id = $this->request->data['Course']['id'];

		if ($this->Course->exists()) {
			
				$this->Course->CoursesProgram->create();

				$data = array();
				$data['CoursesProgram']['course_id'] = $this->request->data['Course']['id'];
				$data['CoursesProgram']['program_id'] = $this->request->data['Course']['program_id'];

				if( $this->Course->CoursesProgram->save($data)) {
					$this->Session->setFlash(__('The course has been added to the program'),'Manage');
				}
				
				$this->redirect(array('controller' => 'programs', 
									  'action' => 'view',
									  $this->request->data['Course']['program_id']));
			} else {

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
