<?php
App::uses('AppController', 'Controller');
/**
 * AxesCourses Controller
 *
 * @property AxesCourse $AxesCourse
 */
class AxesCoursesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AxesCourse->recursive = 0;
		$this->set('axesCourses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AxesCourse->exists($id)) {
			throw new NotFoundException(__('Invalid axes course'));
		}
		$options = array('conditions' => array('AxesCourse.' . $this->AxesCourse->primaryKey => $id));
		$this->set('axesCourse', $this->AxesCourse->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AxesCourse->create();
			if ($this->AxesCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The axes course has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The axes course could not be saved. Please, try again.'));
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
		if (!$this->AxesCourse->exists($id)) {
			throw new NotFoundException(__('Invalid axes course'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AxesCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The axes course has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The axes course could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AxesCourse.' . $this->AxesCourse->primaryKey => $id));
			$this->request->data = $this->AxesCourse->find('first', $options);
		}
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
		$this->AxesCourse->id = $id;
		if (!$this->AxesCourse->exists()) {
			throw new NotFoundException(__('Invalid axes course'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AxesCourse->delete()) {
			$this->Session->setFlash(__('Axes course deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Axes course was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->AxesCourse->recursive = 0;
		$this->set('axesCourses', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->AxesCourse->exists($id)) {
			throw new NotFoundException(__('Invalid axes course'));
		}
		$options = array('conditions' => array('AxesCourse.' . $this->AxesCourse->primaryKey => $id));
		$this->set('axesCourse', $this->AxesCourse->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AxesCourse->create();
			if ($this->AxesCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The axes course has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The axes course could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->AxesCourse->exists($id)) {
			throw new NotFoundException(__('Invalid axes course'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AxesCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The axes course has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The axes course could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AxesCourse.' . $this->AxesCourse->primaryKey => $id));
			$this->request->data = $this->AxesCourse->find('first', $options);
		}
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
		$this->AxesCourse->id = $id;
		if (!$this->AxesCourse->exists()) {
			throw new NotFoundException(__('Invalid axes course'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AxesCourse->delete()) {
			$this->Session->setFlash(__('Axes course deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Axes course was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
