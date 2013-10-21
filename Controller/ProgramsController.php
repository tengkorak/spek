<?php
App::uses('AppController', 'Controller', 'AuthComponent', 'Controller/Component');

/**
 * Programs Controller
 *
 * @property Program $Program
 */
class ProgramsController extends AppController {

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
		$group = $this->Auth->user('group_id');
		$user_id = $this->Auth->user('id');	

		$this->Program->recursive = 0;

		if( $group == 2 ) { 		 // If user is RP

			$conditions = array(
	    						 'Course.user_id' => $user_id
								);

            $courses = $this->Program->Course->find('list', array(
            													'conditions' => $conditions,
            													'fields' => 'id'
            													));

            $i = 0;
            $course_list = "";

			foreach ( $courses as $course ) {

				if($i != 0)
					$course_list .= ',';

				$course_list .= '"' . $course . '"';
				$i++;
			}

			$options['joins'] = array(
				array('table' => 'courses_programs',
					  'alias' => 'CoursesProgram',
					  'type' => 'inner',
					  'conditions' => array(
					  		'CoursesProgram.course_id IN (' . $course_list . ') AND CoursesProgram.program_id = Program.id' 
					  		)
					  	),			
				);

			$options['group'] = array(
									'Program.id'
									);

			$options['fields'] = array(
									 'Program.id',
									 'Program.name_be',
									 'Program.name_bm'
									 );

			$this->Program->unbindModel(
        	array(
        		  'belongsTo' => array('Faculty','Level','User')
        		  )
			);

			$courses = $this->Program->find('all', $options);
		}
		else {			 //If user is Program Coordinator
			
			$conditions = array(
	    						 'Course.user_id' => $user_id
								);

            $courses = $this->Program->Course->find('list', array(
            													'conditions' => $conditions,
            													'fields' => 'id'
            													));

            $i = 0;
            $course_list = "";

			foreach ( $courses as $course ) {

				if($i != 0)
					$course_list .= ',';

				$course_list .= '"' . $course . '"';
				$i++;
			}

			$options['joins'] = array(
				array('table' => 'courses_programs',
					  'alias' => 'CoursesProgram',
					  'type' => 'inner',
					  'conditions' => array(
					  		'CoursesProgram.course_id IN (' . $course_list . ') AND CoursesProgram.program_id = Program.id' 
					  		)
					  	),			
				);

			$options['group'] = array(
									'Program.id'
									);

			$options['fields'] = array(
									 'Program.id',
									 'Program.name_be',
									 'Program.name_bm'
									 );

			$this->Program->unbindModel(
        	array(
        		  'belongsTo' => array('Faculty','Level','User')
        		  )
			);

			$courses = $this->Program->find('all', $options);

			$conditions = array(
	    						 'Program.user_id' => $user_id
								);

			$this->Program->unbindModel(
        	array(
        		  'belongsTo' => array('Faculty','Level','User')
        		  )
			);

            $programs = $this->Program->find('all', array('conditions' => $conditions));

		}	
	
   	
		$this->set(compact('programs','courses'));

		$this->set('title_for_layout', 'List Programs');        
		$this->layout = 'main';			
	}

/**
*
* search coordinator method
*
*/

	public function searchCoor() {

    	if(!empty($this->request->data)){

			$conditions = array(
							'OR'=>array(
            							'User.username'=>$this->request->data['User']['username'],
            							'User.fullname LIKE '=> '%' . $this->request->data['User']['username'] . '%'
            							)
							);

            $users = $this->Program->User->find('all', array('conditions' => $conditions));
  		 	$this->set('users', $users);
    		
			if($this->request->is('ajax')){ 
    			$this->render('users', 'ajax');
    		}
    	}

		$this->set('title_for_layout', 'Add Coordinator');
		$this->layout = 'main';    	
	}

/**
*
* add coordinator method
*
*/

	public function addCoor($id = null, $program_id = null) {

		$this->Program->id = $program_id;

		if (!$this->Program->exists()) {
			throw new NotFoundException(__('Invalid program'));
		}

		$group_id = $this->Auth->user('group_id');
		$this->request->data['Program']['user_id'] = $id;

		if($group_id == 1) {

			if ($this->Program->save($this->request->data)) {
				$this->Session->setFlash(__('The Pengerusi Program/KPP has been assign succesfully'),'message');
				$this->redirect(array('controller' => 'programs', 
									  'action' => 'view', $program_id,
				));
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.'));
			}

		}
		else {
			$this->Session->setFlash(__('You are not authorized to assign Pengerusi Program/KPP for this course'),'error');

			$this->redirect(array('controller' => 'programs', 
								  'action' => 'view',
								  $program_id));			
		}	
	}


/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {

		$this->Program->Behaviors->load('Containable');

		$this->Program->Course->recursive = 0;

		$options['joins'] = array(
			array('table' => 'courses_programs',
				  'alias' => 'CourseProgram',
				  'type' => 'inner',
				  'conditions' => array(
				  		'Course.id = CourseProgram.course_id'
				  		)
				  	),			
			);

		$options['conditions'] = array(
								'CourseProgram.program_id' => $id
								);

		$options['order'] = array(
								'Course.semester ASC'
								);

		$options['fields'] = array(
								  'Course.id','Course.name','Course.semester','User.fullname','Course.submitted'
								  );

    	$this->Program->Course->unbindModel(
        	array('belongsTo' => array('Faculty','Level'),
        		  'hasAndBelongsToMany' => array('Program')
        		  )
    	);		

		$courses = $this->Program->Course->find('all', $options);

		$this->Program->recursive = 1;

		$options2['joins'] = array(
			array('table' => 'faculties',
				  'alias' => 'Fac',
				  'type' => 'inner',
				  'conditions' => array(
				  		'Program.faculty_id = Fac.id'
				  		)
				  	),
			array('table' => 'levels',
				  'alias' => 'Lev',
				  'type' => 'inner',
				  'conditions' => array(
				  		'Program.level_id = Lev.id'
				  		)
				  	),		
			array('table' => 'pos',
				  'alias' => 'po',
				  'type' => 'inner',
				  'conditions' => array(
				  		'Program.id = po.program_id'
				  		)
				  	)			
			);		

		$options2['conditions'] = array(
								'Program.id' => $id
								);

		$options2['fields'] = array(
								  'Program.id','Program.name_be','Program.name_bm','Faculty.name','Level.name'
								  );

    	$this->Program->unbindModel(
        	array(
        		  'hasAndBelongsToMany' => array('Course')
        		  )
    	);

		$programs = $this->Program->find('first', $options2);
	
		$this->set('program', $programs);
		$this->set('courses', $courses);

		$this->set('title_for_layout', 'View Program');        
		$this->layout = 'main';		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Program->create();
			if ($this->Program->save($this->request->data)) {
				$this->Session->setFlash(__('The program has been saved'),'message');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The program could not be saved. Please, try again.'));
			}
		}
		$faculties = $this->Program->Faculty->find('list');
		$levels = $this->Program->Level->find('list');
		$this->set(compact('faculties', 'levels'));

		$this->set('title_for_layout', 'Add New Program');        
		$this->layout = 'main';			
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Program->id = $id;
		if (!$this->Program->exists()) {
			throw new NotFoundException(__('Invalid program'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Program->save($this->request->data)) {
				$this->Session->setFlash(__('The program has been saved'),'message');
				$this->redirect(array('controller' => 'programs', 
									  'action' => 'view',
									  $this->request->data['Program']['id']));
			} else {
				$this->Session->setFlash(__('The program could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Program->read(null, $id);
		}
		$faculties = $this->Program->Faculty->find('list');
		$levels = $this->Program->Level->find('list');
		$this->set(compact('faculties', 'levels'));

		$this->set('title_for_layout', 'Edit Program');        
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
		$this->Program->id = $id;
		if (!$this->Program->exists()) {
			throw new NotFoundException(__('Invalid program'));
		}
		if ($this->Program->delete()) {
			$this->Session->setFlash(__('Program deleted'),'message');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Program was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
