<?php
App::uses('AppController', 'Controller');
/**
 * ImplementationStrategies Controller
 *
 * @property ImplementationStrategy $ImplementationStrategy
 */
class ImplementationStrategiesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ImplementationStrategy->recursive = 0;
		$this->set('implementationStrategies', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ImplementationStrategy->exists($id)) {
			throw new NotFoundException(__('Invalid implementation strategy'));
		}
		$options = array('conditions' => array('ImplementationStrategy.' . $this->ImplementationStrategy->primaryKey => $id));
		$this->set('implementationStrategy', $this->ImplementationStrategy->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ImplementationStrategy->create();
			if ($this->ImplementationStrategy->save($this->request->data)) {
				$this->Session->setFlash(__('The implementation strategy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The implementation strategy could not be saved. Please, see the messages below and try again.'));
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
		if (!$this->ImplementationStrategy->exists($id)) {
			throw new NotFoundException(__('Invalid implementation strategy'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImplementationStrategy->save($this->request->data)) {
				$this->Session->setFlash(__('The implementation strategy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The implementation strategy could not be saved. Please, see the messages below and try again.'));
			}
		} else {
			$options = array('conditions' => array('ImplementationStrategy.' . $this->ImplementationStrategy->primaryKey => $id));
			$this->request->data = $this->ImplementationStrategy->find('first', $options);
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
		$this->ImplementationStrategy->id = $id;
		if (!$this->ImplementationStrategy->exists()) {
			throw new NotFoundException(__('Invalid implementation strategy'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ImplementationStrategy->delete()) {
			$this->Session->setFlash(__('Implementation strategy deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Implementation strategy was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ImplementationStrategy->recursive = 0;
		$this->set('implementationStrategies', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ImplementationStrategy->exists($id)) {
			throw new NotFoundException(__('Invalid implementation strategy'));
		}
		$options = array('conditions' => array('ImplementationStrategy.' . $this->ImplementationStrategy->primaryKey => $id));
		$this->set('implementationStrategy', $this->ImplementationStrategy->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ImplementationStrategy->create();
			if ($this->ImplementationStrategy->save($this->request->data)) {
				$this->Session->setFlash(__('The implementation strategy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The implementation strategy could not be saved. Please, see the messages below and try again.'));
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
		if (!$this->ImplementationStrategy->exists($id)) {
			throw new NotFoundException(__('Invalid implementation strategy'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImplementationStrategy->save($this->request->data)) {
				$this->Session->setFlash(__('The implementation strategy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The implementation strategy could not be saved. Please, see the messages below and try again.'));
			}
		} else {
			$options = array('conditions' => array('ImplementationStrategy.' . $this->ImplementationStrategy->primaryKey => $id));
			$this->request->data = $this->ImplementationStrategy->find('first', $options);
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
		$this->ImplementationStrategy->id = $id;
		if (!$this->ImplementationStrategy->exists()) {
			throw new NotFoundException(__('Invalid implementation strategy'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ImplementationStrategy->delete()) {
			$this->Session->setFlash(__('Implementation strategy deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Implementation strategy was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
