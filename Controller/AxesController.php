<?php
App::uses('AppController', 'Controller');
/**
 * Axes Controller
 *
 * @property Axis $Axis
 */
class AxesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Axis->recursive = 0;
		$this->set('axes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Axis->exists($id)) {
			throw new NotFoundException(__('Invalid axis'));
		}
		$options = array('conditions' => array('Axis.' . $this->Axis->primaryKey => $id));
		$this->set('axis', $this->Axis->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Axis->create();
			if ($this->Axis->save($this->request->data)) {
				$this->Session->setFlash(__('The axis has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The axis could not be saved. Please, see the messages below and try again.'));
			}
		}
		//$courses = $this->Axis->Course->find('list');
		$this->set(compact('courses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Axis->exists($id)) {
			throw new NotFoundException(__('Invalid axis'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Axis->save($this->request->data)) {
				$this->Session->setFlash(__('The axis has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The axis could not be saved. Please, see the messages below and try again.'));
			}
		} else {
			$options = array('conditions' => array('Axis.' . $this->Axis->primaryKey => $id));
			$this->request->data = $this->Axis->find('first', $options);
		}
		$courses = $this->Axis->Course->find('list');
		$this->set(compact('courses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Axis->id = $id;
		if (!$this->Axis->exists()) {
			throw new NotFoundException(__('Invalid axis'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Axis->delete()) {
			$this->Session->setFlash(__('Axis deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Axis was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Axis->recursive = 0;
		$this->set('axes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Axis->exists($id)) {
			throw new NotFoundException(__('Invalid axis'));
		}
		$options = array('conditions' => array('Axis.' . $this->Axis->primaryKey => $id));
		$this->set('axis', $this->Axis->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Axis->create();
			if ($this->Axis->save($this->request->data)) {
				$this->Session->setFlash(__('The axis has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The axis could not be saved. Please, see the messages below and try again.'));
			}
		}
		$courses = $this->Axis->Course->find('list');
		$this->set(compact('courses'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Axis->exists($id)) {
			throw new NotFoundException(__('Invalid axis'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Axis->save($this->request->data)) {
				$this->Session->setFlash(__('The axis has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The axis could not be saved. Please, see the messages below and try again.'));
			}
		} else {
			$options = array('conditions' => array('Axis.' . $this->Axis->primaryKey => $id));
			$this->request->data = $this->Axis->find('first', $options);
		}
		$courses = $this->Axis->Course->find('list');
		$this->set(compact('courses'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Axis->id = $id;
		if (!$this->Axis->exists()) {
			throw new NotFoundException(__('Invalid axis'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Axis->delete()) {
			$this->Session->setFlash(__('Axis deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Axis was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function isAuthorized($user = null) {
		// Admin can access every action
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}

		// Default deny
		return false;
	}
}
