<?php
App::uses('AppController', 'Controller');
/**
 * Contents Controller
 *
 * @property Content $Content
 */
class ContentsController extends AppController {

public $name = 'Contents';
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
        $nodelist = $this->Content->generateTreeList(null,null,null,'&nbsp;&nbsp;&nbsp;');
        $this->set(compact('nodelist'));

		$this->Content->recursive = 0;
		$this->set('contents', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'));
		}
		$this->set('content', $this->Content->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null, $pid = null) {
        
        if ($this->request->is('post')) {

			$user_id = $this->Auth->user('id');

			if($this->Content->Course->isResourcePerson($this->request->data['Content']['course_id'],$user_id)) {

	            $this->Content->create();
	            if($this->Content->save($this->request->data)) {
	            	$this->Session->setFlash(__('The content has been saved'),'message');
					$this->redirect(array('controller' => 'courses', 
										  'action' => 'view',$this->request->data['Content']['course_id'],$pid));
	            }
	            else {
	            	$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
	            }
	        }
			else {
					$this->Session->setFlash(__('Sorry but only RP is authorized to add new course content.'),'message');

					$this->redirect(array('controller' => 'courses', 
										  'action' => 'view',
										  $this->request->data['Content']['course_id'],$pid));				
			}	        
        } else {
            $parents[0] = "[ No Parent ]";

            $nodelist = $this->Content->generateTreeList(array(
            												  'Content.course_id'=>$id
												  			  ),null,null,'   ');
            if($nodelist) {
                foreach ($nodelist as $key=>$value)
                    $parents[$key] = $value;
            }

			$outcomes = $this->Content->Outcome->find('list', array(
	        	'fields' => array(
	        					'Outcome.id',
	        					'Outcome.description'
	        					),
	        	'conditions' => array(
	        						'Outcome.course_id' =>$id
	        						))
			);

			$this->set(compact('outcomes'));
            $this->set(compact('parents'));    
        }

		$this->set('title_for_layout', 'Add New Course Content');        
		$this->layout = 'main';	        
    }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $cid = null, $pid = null) {
		$this->Content->id = $id;

		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			$user_id = $this->Auth->user('id');

			if($this->Content->Course->isResourcePerson($this->request->data['Content']['course_id'],$user_id)) {

				if($this->request->data['Content']['parent_id'] == 'NULL') {
					$this->request->data['Content']['parent_id'] = 0;
				}

				if ($this->Content->save($this->request->data)) {
					$this->Session->setFlash(__('The content has been saved'),'Message');
					$this->redirect(array('controller' => 'courses', 
										  'action' => 'view',
										  $this->request->data['Content']['course_id'],$pid));
				} else {
					$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
				}
			}
			else {
					$this->Session->setFlash(__('Sorry but only RP is authorized to edit course content.'),'message');

					$this->redirect(array('controller' => 'courses', 
										  'action' => 'view',
										  $this->request->data['Content']['course_id'],$pid));				
			}			
		} else {
			$this->request->data = $this->Content->read(null, $id);

            $parents[0] = "[ No Parent ]";

            $nodelist = $this->Content->generateTreeList(array(
            												  'Content.course_id'=>$this->request->data['Content']['course_id']
												  			  ),null,null,'   ');
            if($nodelist) {
                foreach ($nodelist as $key=>$value)
                    $parents[$key] = $value;
            }

			$outcomes = $this->Content->Outcome->find('list', array(
	        	'fields' => array(
	        					'Outcome.id',
	        					'Outcome.description'
	        					),
	        	'conditions' => array(
	        						'Outcome.course_id' =>$this->request->data['Content']['course_id']
	        						))
			);
			$this->set(compact('outcomes'));            
            $this->set(compact('parents'));    			
		}

		$this->set('title_for_layout', 'Edit Content');        
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
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'));
		}

		$user_id = $this->Auth->user('id');

		if($this->Content->Course->isResourcePerson($cid,$user_id)) {

			if ($this->Content->delete()) {
				$this->Session->setFlash(__('Content deleted'),'Message');
				$this->redirect(array('controller'=> 'courses',
									  'action' => 'view',
									  $cid,$pid
									  ));
			}
		}
		else {
			$this->Session->setFlash(__('Sorry but only RP is authorized to delete course content.'),'message');

			$this->redirect(array('controller' => 'courses', 
								  'action' => 'view',
								  $cid, $pid
								  ));				
		}		

		$this->Session->setFlash(__('Content was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	function moveup($id = null, $delta = null) {
		 
		$this->Content->id=$id;
	    
	    if (!$this->Content->exists()) {
	       throw new NotFoundException(__('Invalid content'));
	    }

	    if ($delta > 0) {
	        $this->Content->moveUp($this->Content->id, abs($delta));
	    } else {
	        $this->Session->setFlash('Please provide the number of positions the field should be moved down.');
	    }
		 
		$this->redirect(array('controller'=> 'courses',
		 					  'action' => 'view',
							  $this->params['url']['course_id']));
	}
 
	function movedown($id = null, $delta = null) {
		 
		$this->Content->id=$id;
	    
	    if (!$this->Content->exists()) {
	       throw new NotFoundException(__('Invalid content'));
	    }

	    if ($delta > 0) {
	        $this->Content->moveDown($this->Content->id, abs($delta));
	    } else {
	        $this->Session->setFlash('Please provide the number of positions the field should be moved down.');
	    }
		 
		$this->redirect(array('controller'=> 'courses',
							  'action' => 'view',
							  $this->params['url']['course_id']));
	}

	 function removeNode($id=null){
		 if($id==null)
		 die("Nothing to Remove");
		 if($this->Category->removeFromTree($id)==false)
		 $this->Session->setFlash('The Category can\'t be removed.');
		 $this->redirect(array('action'=>'index'));
	 }

}
