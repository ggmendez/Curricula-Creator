<?php

App::uses('AppController', 'Controller');

/**
 * Topics Controller
 *
 * @property Topic $Topic
 */
class TopicsController extends AppController {
    
    public $paginate = array(
        'limit' => 2500,
        
    );

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Topic->recursive = 0;
        
        $subjects = $this->Topic->Unit->Subject->find('all', array(
            'fields' => array ('Subject.id', 'Subject.name'),
            'recursive' => 0,
        ));
        $this->set('subjects', $subjects);

        $this->set('topics', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Topic->exists($id)) {
            throw new NotFoundException(__('Invalid topic'));
        }
        $options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
        $this->set('topic', $this->Topic->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Topic->create();
            if ($this->Topic->save($this->request->data)) {
                $this->Session->setFlash(__('The topic has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The topic could not be saved. Please, try again.'));
            }
        }
        $units = $this->Topic->Unit->find('list');
        $this->set(compact('units'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Topic->exists($id)) {
            throw new NotFoundException(__('Invalid topic'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Topic->save($this->request->data)) {
                $this->Session->setFlash(__('The topic has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The topic could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
            $this->request->data = $this->Topic->find('first', $options);
        }
        $units = $this->Topic->Unit->find('list');
        $this->set(compact('units'));
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
        $this->Topic->id = $id;
        if (!$this->Topic->exists()) {
            throw new NotFoundException(__('Invalid topic'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Topic->delete()) {
            $this->Session->setFlash(__('Topic deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Topic was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Topic->recursive = 0;
        $this->set('topics', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Topic->exists($id)) {
            throw new NotFoundException(__('Invalid topic'));
        }
        $options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
        $this->set('topic', $this->Topic->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Topic->create();
            if ($this->Topic->save($this->request->data)) {
                $this->Session->setFlash(__('The topic has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The topic could not be saved. Please, try again.'));
            }
        }
        $units = $this->Topic->Unit->find('list');
        $this->set(compact('units'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Topic->exists($id)) {
            throw new NotFoundException(__('Invalid topic'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Topic->save($this->request->data)) {
                $this->Session->setFlash(__('The topic has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The topic could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
            $this->request->data = $this->Topic->find('first', $options);
        }
        $units = $this->Topic->Unit->find('list');
        $this->set(compact('units'));
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
        $this->Topic->id = $id;
        if (!$this->Topic->exists()) {
            throw new NotFoundException(__('Invalid topic'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Topic->delete()) {
            $this->Session->setFlash(__('Topic deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Topic was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
