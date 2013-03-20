<?php

App::uses('AppController', 'Controller');

/**
 * LearningObjectives Controller
 *
 * @property LearningObjective $LearningObjective
 */
class LearningObjectivesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->LearningObjective->recursive = 0;

        $knowledgeAreas = $this->LearningObjective->Unit->KnowledgeArea->find('all', array(
            'fields' => array('KnowledgeArea.id', 'KnowledgeArea.name'),
            'recursive' => 0,
        ));
        $this->set('knowledgeAreas', $knowledgeAreas);

        $this->set('learningObjectives', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->LearningObjective->exists($id)) {
            throw new NotFoundException(__('Invalid learning objective'));
        }
        $options = array('conditions' => array('LearningObjective.' . $this->LearningObjective->primaryKey => $id));
        $this->set('learningObjective', $this->LearningObjective->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->LearningObjective->create();
            if ($this->LearningObjective->save($this->request->data)) {
                $this->Session->setFlash(__('The learning objective has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The learning objective could not be saved. Please, try again.'));
            }
        }
        $units = $this->LearningObjective->Unit->find('list');
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
        if (!$this->LearningObjective->exists($id)) {
            throw new NotFoundException(__('Invalid learning objective'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->LearningObjective->save($this->request->data)) {
                $this->Session->setFlash(__('The learning objective has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The learning objective could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('LearningObjective.' . $this->LearningObjective->primaryKey => $id));
            $this->request->data = $this->LearningObjective->find('first', $options);
        }
        $units = $this->LearningObjective->Unit->find('list');
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
        $this->LearningObjective->id = $id;
        if (!$this->LearningObjective->exists()) {
            throw new NotFoundException(__('Invalid learning objective'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->LearningObjective->delete()) {
            $this->Session->setFlash(__('Learning objective deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Learning objective was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->LearningObjective->recursive = 0;
        $this->set('learningObjectives', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->LearningObjective->exists($id)) {
            throw new NotFoundException(__('Invalid learning objective'));
        }
        $options = array('conditions' => array('LearningObjective.' . $this->LearningObjective->primaryKey => $id));
        $this->set('learningObjective', $this->LearningObjective->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->LearningObjective->create();
            if ($this->LearningObjective->save($this->request->data)) {
                $this->Session->setFlash(__('The learning objective has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The learning objective could not be saved. Please, try again.'));
            }
        }
        $units = $this->LearningObjective->Unit->find('list');
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
        if (!$this->LearningObjective->exists($id)) {
            throw new NotFoundException(__('Invalid learning objective'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->LearningObjective->save($this->request->data)) {
                $this->Session->setFlash(__('The learning objective has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The learning objective could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('LearningObjective.' . $this->LearningObjective->primaryKey => $id));
            $this->request->data = $this->LearningObjective->find('first', $options);
        }
        $units = $this->LearningObjective->Unit->find('list');
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
        $this->LearningObjective->id = $id;
        if (!$this->LearningObjective->exists()) {
            throw new NotFoundException(__('Invalid learning objective'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->LearningObjective->delete()) {
            $this->Session->setFlash(__('Learning objective deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Learning objective was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
