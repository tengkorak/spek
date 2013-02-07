<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->autoRedirect = false;
	// $this->Auth->allow('*');
}

/*
public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('initDB'); // We can remove this line after we're finished
}

public function initDB() {
    $group = $this->User->Group;
    //Allow admins to everything
    $group->id = 1;
    $this->Acl->allow($group, 'controllers');

    //allow data generator to required controllers
    $group->id = 2;
    $this->Acl->deny($group, 'controllers');
    $this->Acl->allow($group, 'controllers/Assessments');
    $this->Acl->allow($group, 'controllers/Contents');
    $this->Acl->allow($group, 'controllers/Courses');
    $this->Acl->allow($group, 'controllers/Instructions');
    $this->Acl->allow($group, 'controllers/Outcomes');
    $this->Acl->allow($group, 'controllers/Peos');
    $this->Acl->allow($group, 'controllers/Pos');
    $this->Acl->allow($group, 'controllers/QuestionMarks');    
    $this->Acl->allow($group, 'controllers/QuestionTypes');    
    $this->Acl->allow($group, 'controllers/Programs');
    $this->Acl->allow($group, 'controllers/References');           
	$this->Acl->allow($group, 'controllers/Slts');
    $this->Acl->allow($group, 'controllers/Synopses');    
    $this->Acl->allow($group, 'controllers/Textbooks');    
    $this->Acl->allow($group, 'controllers/Users/login');
    $this->Acl->allow($group, 'controllers/Users/logout');

    //allow users to only view program and courses
    $group->id = 3;
    $this->Acl->deny($group, 'controllers');
    $this->Acl->allow($group, 'controllers/Programs/index');
    $this->Acl->allow($group, 'controllers/Programs/view');
    $this->Acl->allow($group, 'controllers/Courses/index');
    $this->Acl->allow($group, 'controllers/Courses/view');
    $this->Acl->allow($group, 'controllers/Users/login');
    $this->Acl->allow($group, 'controllers/Users/logout');
    $this->Acl->allow($group, 'controllers/Users/register');    

    //we add an exit to avoid an ugly "missing views" error message
    echo "all done";
    exit;
}
*/

public function register() {

	$this->set('title_for_layout', 'Welcome to OBEMS, please register');        
	$this->layout = 'register';	

}

public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {

        	$id = $this->Auth->user('id');
        	$this->User->id = $id;

        	$this->User->saveField('lastlogin', date('Y-m-d H:i:s')); // save login time

            // $this->User->save($fields, false, array('lastlogin'));
 
            $this->redirect(array('controller'=>'programs', 'action'=>'index'));
        } else {
            $this->Session->setFlash(__('Invalid username or password, try again'),'Message');
        }
    }

	$this->set('title_for_layout', 'Welcome to OBEMS, please authenticate');        
	$this->layout = 'login';	

}

public function logout() {
	if( $this->Auth->logout()) {
		$this->Session->setFlash('Good-Bye','Message');
		$this->redirect(array('action' => 'login'));	
	}
    
}	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());

		$this->set('title_for_layout', 'List Users');        
		$this->layout = 'main';		
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
		
		$this->set('title_for_layout', 'View Users');        
		$this->layout = 'main';		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'),'Message');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		else {
			$groups = $this->User->Group->find('list');
			$this->set(compact('groups'));
		}

		$this->set('title_for_layout', 'Add User');        
		$this->layout = 'main';				
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'),'Message');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));


		$this->set('title_for_layout', 'Edit User');        
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted'),'Message');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
