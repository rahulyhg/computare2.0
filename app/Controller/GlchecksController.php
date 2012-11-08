<?php
App::uses('AppController', 'Controller');
/**
 * Glchecks Controller
 *
 * @property Glcheck $Glcheck
 */
class GlchecksController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Glcheck->recursive = 0;
		$this->set('glchecks', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Glcheck->id = $id;
		if (!$this->Glcheck->exists()) {
			throw new NotFoundException(__('Invalid glcheck'));
		}
		$this->set('glcheck', $this->Glcheck->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Glcheck->create();
			if ($this->Glcheck->save($this->request->data)) {
				$this->Session->setFlash(__('The glcheck has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The glcheck could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Glcheck->id = $id;
		if (!$this->Glcheck->exists()) {
			throw new NotFoundException(__('Invalid glcheck'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Glcheck->save($this->request->data)) {
				$this->Session->setFlash(__('The glcheck has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The glcheck could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Glcheck->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Glcheck->id = $id;
		if (!$this->Glcheck->exists()) {
			throw new NotFoundException(__('Invalid glcheck'));
		}
		if ($this->Glcheck->delete()) {
			$this->Session->setFlash(__('Glcheck deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Glcheck was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
