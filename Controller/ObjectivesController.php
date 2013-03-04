<?php

App::uses('AppController', 'Controller');

/**
 * Objectives Controller
 *
 * @property Objective $Objective
 */
class ObjectivesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Objective->recursive = 0;
        $this->set('objectives', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Objective->exists($id)) {
            throw new NotFoundException(__('Invalid objective'));
        }
        $options = array('conditions' => array('Objective.' . $this->Objective->primaryKey => $id));
        $this->set('objective', $this->Objective->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Objective->create();
            if ($this->Objective->save($this->request->data)) {
                $this->Session->setFlash(__('The objective has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The objective could not be saved. Please, try again.'));
            }
        }
        $courses = $this->Objective->Course->find('list');
        $this->set(compact('courses'));
    }

//    function add_courses() {
//        if (!empty($this->data)) {
//            if ($this->Objective->Course->saveAll($this->data)) {
//                $this->Session->setFlash('Success');
//                $this->redirect('/');
//            } else {
//                $this->Session->setFlash('Error');
//            }
//        }
//    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Objective->exists($id)) {
            throw new NotFoundException(__('Invalid objective'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Objective->save($this->request->data)) {
                $this->Session->setFlash(__('The objective has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The objective could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Objective.' . $this->Objective->primaryKey => $id));
            $this->request->data = $this->Objective->find('first', $options);
        }
        $courses = $this->Objective->Course->find('list');
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
        $this->Objective->id = $id;
        if (!$this->Objective->exists()) {
            throw new NotFoundException(__('Invalid objective'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Objective->delete()) {
            $this->Session->setFlash(__('Objective deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Objective was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Objective->recursive = 0;
        $this->set('objectives', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Objective->exists($id)) {
            throw new NotFoundException(__('Invalid objective'));
        }
        $options = array('conditions' => array('Objective.' . $this->Objective->primaryKey => $id));
        $this->set('objective', $this->Objective->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Objective->create();
            if ($this->Objective->save($this->request->data)) {
                $this->Session->setFlash(__('The objective has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The objective could not be saved. Please, try again.'));
            }
        }
        $courses = $this->Objective->Course->find('list');
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
        if (!$this->Objective->exists($id)) {
            throw new NotFoundException(__('Invalid objective'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Objective->save($this->request->data)) {
                $this->Session->setFlash(__('The objective has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The objective could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Objective.' . $this->Objective->primaryKey => $id));
            $this->request->data = $this->Objective->find('first', $options);
        }
        $courses = $this->Objective->Course->find('list');
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
        $this->Objective->id = $id;
        if (!$this->Objective->exists()) {
            throw new NotFoundException(__('Invalid objective'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Objective->delete()) {
            $this->Session->setFlash(__('Objective deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Objective was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
