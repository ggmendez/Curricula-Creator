<?php
App::uses('AppController', 'Controller');
/**
 * MasteryLevels Controller
 *
 * @property MasteryLevel $MasteryLevel
 */
class MasteryLevelsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MasteryLevel->recursive = 0;
		$this->set('masteryLevels', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MasteryLevel->exists($id)) {
			throw new NotFoundException(__('Invalid mastery level'));
		}
		$options = array('conditions' => array('MasteryLevel.' . $this->MasteryLevel->primaryKey => $id));
		$this->set('masteryLevel', $this->MasteryLevel->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MasteryLevel->create();
			if ($this->MasteryLevel->save($this->request->data)) {
				$this->Session->setFlash(__('The mastery level has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mastery level could not be saved. Please, try again.'));
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
		if (!$this->MasteryLevel->exists($id)) {
			throw new NotFoundException(__('Invalid mastery level'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MasteryLevel->save($this->request->data)) {
				$this->Session->setFlash(__('The mastery level has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mastery level could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MasteryLevel.' . $this->MasteryLevel->primaryKey => $id));
			$this->request->data = $this->MasteryLevel->find('first', $options);
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
		$this->MasteryLevel->id = $id;
		if (!$this->MasteryLevel->exists()) {
			throw new NotFoundException(__('Invalid mastery level'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MasteryLevel->delete()) {
			$this->Session->setFlash(__('Mastery level deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Mastery level was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MasteryLevel->recursive = 0;
		$this->set('masteryLevels', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->MasteryLevel->exists($id)) {
			throw new NotFoundException(__('Invalid mastery level'));
		}
		$options = array('conditions' => array('MasteryLevel.' . $this->MasteryLevel->primaryKey => $id));
		$this->set('masteryLevel', $this->MasteryLevel->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MasteryLevel->create();
			if ($this->MasteryLevel->save($this->request->data)) {
				$this->Session->setFlash(__('The mastery level has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mastery level could not be saved. Please, try again.'));
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
		if (!$this->MasteryLevel->exists($id)) {
			throw new NotFoundException(__('Invalid mastery level'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MasteryLevel->save($this->request->data)) {
				$this->Session->setFlash(__('The mastery level has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mastery level could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MasteryLevel.' . $this->MasteryLevel->primaryKey => $id));
			$this->request->data = $this->MasteryLevel->find('first', $options);
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
		$this->MasteryLevel->id = $id;
		if (!$this->MasteryLevel->exists()) {
			throw new NotFoundException(__('Invalid mastery level'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MasteryLevel->delete()) {
			$this->Session->setFlash(__('Mastery level deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Mastery level was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
