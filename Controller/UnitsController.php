<?php

App::uses('AppController', 'Controller');

/**
 * Units Controller
 *
 * @property Unit $Unit
 */
class UnitsController extends AppController {
    
    public $paginate = array(
        'limit' => 2500,
        
    );

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Unit->recursive = 0;
        $this->set('units', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Unit->exists($id)) {
            throw new NotFoundException(__('Invalid unit'));
        }
        $options = array('conditions' => array('Unit.' . $this->Unit->primaryKey => $id));
        $this->set('unit', $this->Unit->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Unit->create();
            if ($this->Unit->save($this->request->data)) {
                $this->Session->setFlash(__('The unit has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The unit could not be saved. Please, try again.'));
            }
        }
        $subjects = $this->Unit->Subject->find('list');
        $this->set(compact('subjects'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Unit->exists($id)) {
            throw new NotFoundException(__('Invalid unit'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Unit->save($this->request->data)) {
                $this->Session->setFlash(__('The unit has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The unit could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Unit.' . $this->Unit->primaryKey => $id));
            $this->request->data = $this->Unit->find('first', $options);
        }
        $subjects = $this->Unit->Subject->find('list');
        $this->set(compact('subjects'));
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
        $this->Unit->id = $id;
        if (!$this->Unit->exists()) {
            throw new NotFoundException(__('Invalid unit'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Unit->delete()) {
            $this->Session->setFlash(__('Unit deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unit was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Unit->recursive = 0;
        $this->set('units', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Unit->exists($id)) {
            throw new NotFoundException(__('Invalid unit'));
        }
        $options = array('conditions' => array('Unit.' . $this->Unit->primaryKey => $id));
        $this->set('unit', $this->Unit->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Unit->create();
            if ($this->Unit->save($this->request->data)) {
                $this->Session->setFlash(__('The unit has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The unit could not be saved. Please, try again.'));
            }
        }
        $subjects = $this->Unit->Subject->find('list');
        $this->set(compact('subjects'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Unit->exists($id)) {
            throw new NotFoundException(__('Invalid unit'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Unit->save($this->request->data)) {
                $this->Session->setFlash(__('The unit has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The unit could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Unit.' . $this->Unit->primaryKey => $id));
            $this->request->data = $this->Unit->find('first', $options);
        }
        $subjects = $this->Unit->Subject->find('list');
        $this->set(compact('subjects'));
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
        $this->Unit->id = $id;
        if (!$this->Unit->exists()) {
            throw new NotFoundException(__('Invalid unit'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Unit->delete()) {
            $this->Session->setFlash(__('Unit deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unit was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
