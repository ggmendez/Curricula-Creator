<?php

App::uses('AppController', 'Controller');

/**
 * BodyKnowledges Controller
 *
 * @property BodyKnowledge $BodyKnowledge
 */
class BodyKnowledgesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->BodyKnowledge->recursive = 2;
        $this->set('bodyKnowledges', $this->paginate(array(
                    'BodyKnowledge.user_id' => $this->Auth->user('id')
        )));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->BodyKnowledge->exists($id)) {
            throw new NotFoundException(__('Invalid body knowledge'));
        }
        $options = array('conditions' => array('BodyKnowledge.' . $this->BodyKnowledge->primaryKey => $id));
        $this->set('bodyKnowledge', $this->BodyKnowledge->find('first', $options));

        $this->set('requestData', $this->Session->read('key'));
        $this->set('recievedIDs', $this->Session->read('recievedIDs'));
        $this->set('storedIDs', $this->Session->read('storedIDs'));
        $this->set('removedIDs', $this->Session->read('removedIDs'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $userID = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $this->BodyKnowledge->create();
            $this->request->data['BodyKnowledge']['user_id'] = $userID;

            $this->Session->write('key', $this->request->data);

            if ($this->BodyKnowledge->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The Body of Knowledge has been saved'));
                $this->redirect(array('action' => 'view/' . $this->BodyKnowledge->id));
            } else {
                $this->Session->setFlash(__('The Body of Knowledge could not be saved. Please, try again.'));
            }
        }
    }

    private function deleteKnowledgeAreas($theIDs) {
        $options = array(
            'KnowledgeArea.id' => $theIDs
        );
        $this->BodyKnowledge->KnowledgeArea->deleteAll($options, true);
    }

    private function getRemovedKAids($id, $data) {

        $recievedIDs = array();
        $recievedKAs = $data['KnowledgeArea'];
        foreach ($recievedKAs as $KA) {
            array_push($recievedIDs, $KA['id']);
        }
        $this->Session->write('recievedIDs', $recievedIDs);

        $storedIDs = array();
        $options = array('conditions' => array('KnowledgeArea.body_knowledge_id' => $id));
        $storedKAs = $this->BodyKnowledge->KnowledgeArea->find('all', $options);
        foreach ($storedKAs as $KA) {
            array_push($storedIDs, $KA['KnowledgeArea']['id']);
        }
        $this->Session->write('storedIDs', $storedIDs);

        $removedIDs = array_diff($storedIDs, $recievedIDs);
        $this->Session->write('removedIDs', $removedIDs);

        return $removedIDs;
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->BodyKnowledge->exists($id)) {
            throw new NotFoundException(__('Invalid body knowledge'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            $this->request->data['BodyKnowledge']['user_id'] = $this->Auth->user('id');

            $removedKAIDs = $this->getRemovedKAids($id, $this->request->data);
            $this->deleteKnowledgeAreas($removedKAIDs);

            if ($this->BodyKnowledge->saveAll($this->request->data)) {

                $this->Session->write('key', $this->request->data);

                $this->Session->setFlash(__('The Body of Knowledge has been saved'));
                $this->redirect(array('action' => 'view/' . $this->BodyKnowledge->id));
            } else {
                $this->Session->setFlash(__('The Body of Knowledge could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('BodyKnowledge.' . $this->BodyKnowledge->primaryKey => $id));
            $this->request->data = $this->BodyKnowledge->find('first', $options);
        }

        $options = array('conditions' => array('BodyKnowledge.' . $this->BodyKnowledge->primaryKey => $id));
        $this->set('bodyKnowledge', $this->BodyKnowledge->find('first', $options));

        $userID = $this->request->data['User']['id'];
    }

    public function add_knowledge_area($id = null) {
        if (!$this->BodyKnowledge->exists($id)) {
            throw new NotFoundException(__('Invalid body knowledge'));
        }

        if ($this->request->is('post')) {
            $this->BodyKnowledge->KnowledgeArea->create();
            $this->request->data['KnowledgeArea']['user_id'] = $this->Auth->user('id');
            $this->request->data['KnowledgeArea']['body_knowledge_id'] = $id;
            if ($this->BodyKnowledge->KnowledgeArea->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The Knowledge Area ' . $this->BodyKnowledge->KnowledgeArea->name . ' has been added to the Body of Knowledge.'));
                $this->redirect(array('controller' => 'knowledgeAreas', 'action' => 'view/' . $this->BodyKnowledge->KnowledgeArea->id));
            } else {
                $this->Session->setFlash(__('The knowledge area could not be saved. Please, try again.'));
            }
        }

        $options = array('conditions' => array('BodyKnowledge.' . $this->BodyKnowledge->primaryKey => $id));
        $this->set('bodyKnowledge', $this->BodyKnowledge->find('first', $options));
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
        $this->BodyKnowledge->id = $id;
        if (!$this->BodyKnowledge->exists()) {
            throw new NotFoundException(__('Invalid body knowledge'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->BodyKnowledge->delete()) {
            $this->Session->setFlash(__('Body knowledge deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Body knowledge was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->BodyKnowledge->recursive = 0;
        $this->set('bodyKnowledges', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->BodyKnowledge->exists($id)) {
            throw new NotFoundException(__('Invalid body knowledge'));
        }
        $options = array('conditions' => array('BodyKnowledge.' . $this->BodyKnowledge->primaryKey => $id));
        $this->set('bodyKnowledge', $this->BodyKnowledge->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->BodyKnowledge->create();
            if ($this->BodyKnowledge->save($this->request->data)) {
                $this->Session->setFlash(__('The Body of Knowledge has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Body of Knowledge could not be saved. Please, try again.'));
            }
        }
        $users = $this->BodyKnowledge->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->BodyKnowledge->exists($id)) {
            throw new NotFoundException(__('Invalid body knowledge'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->BodyKnowledge->save($this->request->data)) {
                $this->Session->setFlash(__('The Body of Knowledge has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Body of Knowledge could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('BodyKnowledge.' . $this->BodyKnowledge->primaryKey => $id));
            $this->request->data = $this->BodyKnowledge->find('first', $options);
        }
        $users = $this->BodyKnowledge->User->find('list');
        $this->set(compact('users'));
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
        $this->BodyKnowledge->id = $id;
        if (!$this->BodyKnowledge->exists()) {
            throw new NotFoundException(__('Invalid body knowledge'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->BodyKnowledge->delete()) {
            $this->Session->setFlash(__('Body knowledge deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Body knowledge was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
