<?php
App::uses('AppController', 'Controller');
/**
 * TopicTypes Controller
 *
 * @property TopicType $TopicType
 */
class TopicTypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TopicType->recursive = 0;
		$this->set('topicTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TopicType->exists($id)) {
			throw new NotFoundException(__('Invalid topic type'));
		}
		$options = array('conditions' => array('TopicType.' . $this->TopicType->primaryKey => $id));
		$this->set('topicType', $this->TopicType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TopicType->create();
			if ($this->TopicType->save($this->request->data)) {
				$this->Session->setFlash(__('The topic type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The topic type could not be saved. Please, see the messages below and try again.'));
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
		if (!$this->TopicType->exists($id)) {
			throw new NotFoundException(__('Invalid topic type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TopicType->save($this->request->data)) {
				$this->Session->setFlash(__('The topic type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The topic type could not be saved. Please, see the messages below and try again.'));
			}
		} else {
			$options = array('conditions' => array('TopicType.' . $this->TopicType->primaryKey => $id));
			$this->request->data = $this->TopicType->find('first', $options);
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
		$this->TopicType->id = $id;
		if (!$this->TopicType->exists()) {
			throw new NotFoundException(__('Invalid topic type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TopicType->delete()) {
			$this->Session->setFlash(__('Topic type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Topic type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TopicType->recursive = 0;
		$this->set('topicTypes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TopicType->exists($id)) {
			throw new NotFoundException(__('Invalid topic type'));
		}
		$options = array('conditions' => array('TopicType.' . $this->TopicType->primaryKey => $id));
		$this->set('topicType', $this->TopicType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TopicType->create();
			if ($this->TopicType->save($this->request->data)) {
				$this->Session->setFlash(__('The topic type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The topic type could not be saved. Please, see the messages below and try again.'));
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
		if (!$this->TopicType->exists($id)) {
			throw new NotFoundException(__('Invalid topic type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TopicType->save($this->request->data)) {
				$this->Session->setFlash(__('The topic type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The topic type could not be saved. Please, see the messages below and try again.'));
			}
		} else {
			$options = array('conditions' => array('TopicType.' . $this->TopicType->primaryKey => $id));
			$this->request->data = $this->TopicType->find('first', $options);
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
		$this->TopicType->id = $id;
		if (!$this->TopicType->exists()) {
			throw new NotFoundException(__('Invalid topic type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TopicType->delete()) {
			$this->Session->setFlash(__('Topic type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Topic type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
