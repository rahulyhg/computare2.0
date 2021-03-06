<?php
App::uses('AppController', 'Controller');
/**
 * Programsettings Controller
 *
 * @property Programsetting $Programsetting
 */
class ProgramsettingsController extends AppController {

	public $components=array('ComputareProgramsetting');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('formName','Program Setting History');
		$this->Programsetting->recursive = 0;
		$this->set('programsettings', $this->paginate());
		$this->set('userlist', ClassRegistry::init('User')->find('list'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->set('formName','Program Setting Details');
		$this->Programsetting->id = $id;
		if (!$this->Programsetting->exists()) {
			throw new NotFoundException(__('Invalid id'));
		}
		$this->set('programsetting', $this->Programsetting->read(null, $id));
		$this->set('lastprogramsetting', $this->Programsetting->read(null, $id-1));
		$this->set('userlist', ClassRegistry::init('User')->find('list'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->set('formName','Inital Program Settings');
		if ($this->request->is('post')) {
			//set user id
			$this->request->data['Programsetting']['created_id']=$this->Auth->user('id');
			$this->request->data['Programsetting']['dbschema']=0;
			$this->Programsetting->create();
			if ($this->ComputareProgramsetting->save($this->request->data)) {
				$this->Session->setFlash(__('The initial program settings have been saved'),'default',array('class'=>'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Your program settings could not be saved. Please, try again.'));
			}
		} else {
			//read existing settings
			$this->request->data=$this->Programsetting->find('first');
		}
	}

/**
 * edit method
 *
 * @return void
 */
	public function edit() {
		$this->set('formName','Edit Program Settings');
		if ($this->request->is('post') || $this->request->is('put')) {
			//set user id
			$this->request->data['Programsetting']['created_id']=$this->Auth->user('id');
//			$this->Programsetting->create();
			if ($this->ComputareProgramsetting->save($this->request->data)) {
				$this->Session->setFlash(__('Your program settings have been saved'),'default',array('class'=>'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('You settings could not be saved. Please, try again.'));
			}
		} else {
			//read existing settings
			$this->request->data = $this->Programsetting->find('first');
		}
	}

/** updatedb method
 * used to update the OVERALL database schema for adding a NEW table
 * @return tf
 */
	public function updatedb() {
		$this->set('formName','Update Database');
		//update the database if needed
		$ok=$this->ComputareProgramsetting->updatedb($this->Auth->user('id'));
		if ($ok>=0) {
			if($ok==0) $this->Session->setFlash(__('The database is already the latest version'),'default',array('class'=>'success'));
			else $this->Session->setFlash(__('The database has been updated to version '.$ok),'default',array('class'=>'success'));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The database could not be updated.'));
			$this->redirect(array('action' => 'index'));
		}
		
	}//end function

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Programsetting->id = $id;
		if (!$this->Programsetting->exists()) {
			throw new NotFoundException(__('Invalid programsetting'));
		}
		if ($this->Programsetting->delete()) {
			$this->Session->setFlash(__('Programsetting deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Programsetting was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
 */
}
