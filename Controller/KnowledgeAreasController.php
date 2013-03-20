<?php

App::uses('AppController', 'Controller');

/**
 * KnowledgeAreas Controller
 *
 * @property KnowledgeArea $KnowledgeArea
 */
class KnowledgeAreasController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->KnowledgeArea->recursive = 0;
        $this->set('knowledgeAreas', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->KnowledgeArea->exists($id)) {
            throw new NotFoundException(__('Invalid knowledge area'));
        }
        $options = array('conditions' => array('KnowledgeArea.' . $this->KnowledgeArea->primaryKey => $id));
        $this->set('knowledgeArea', $this->KnowledgeArea->find('first', $options));

        $core_tier_1_hours = $this->KnowledgeArea->Unit->find('all', array(
            'conditions' => array('Unit.knowledge_area_id' => $id),
            'fields' => array('sum(Unit.core_tier_1_hours) as core_tier_1_hours'))
        );
        $this->set('core_tier_1_hours', $core_tier_1_hours);
        
        $core_tier_2_hours = $this->KnowledgeArea->Unit->find('all', array(
            'conditions' => array('Unit.knowledge_area_id' => $id),
            'fields' => array('sum(Unit.core_tier_2_hours) as core_tier_2_hours'))
        );
        $this->set('core_tier_2_hours', $core_tier_2_hours);
        
        
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
        if ($this->request->is('post')) {
            $this->KnowledgeArea->create();
            if ($this->KnowledgeArea->save($this->request->data)) {
                $this->Session->setFlash(__('The knowledge area has been saved'));
                $this->redirect(array('action' => 'view/' . $this->KnowledgeArea->id));
            } else {
                $this->Session->setFlash(__('The knowledge area could not be saved. Please, try again.'));
            }
        }
    }
    
    function getRemovedUnitsIDs ($id, $data) {
        
        $recievedIDs = array();
        $recievedUnits = $data['Unit'];
        foreach ($recievedUnits as $Unit) {
            array_push($recievedIDs, $Unit['id']);
        }
        $this->Session->write('recievedIDs', $recievedIDs);

        $storedIDs = array();
        $options = array('conditions' => array('Unit.knowledge_area_id' => $id));
        $storedUnits = $this->KnowledgeArea->Unit->find('all', $options);
        foreach ($storedUnits as $Unit) {
            array_push($storedIDs, $Unit['Unit']['id']);
        }
        $this->Session->write('storedIDs', $storedIDs);

        $removedIDs = array_diff($storedIDs, $recievedIDs);
        $this->Session->write('removedIDs', $removedIDs);

        return $removedIDs;
    
    }
    
    function deleteUnits ($theIDs) {
        $options = array(
            'Unit.id' => $theIDs
        );
        $this->KnowledgeArea->Unit->deleteAll($options, true);
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        
        if (isset($this->params->data['cancel'])) {
            $this->Session->setFlash(__('Changes not saved. Edition cancelled by the user.', true));
            $this->redirect(array('action' => 'view/' . $id));
        }
        
        if (!$this->KnowledgeArea->exists($id)) {
            throw new NotFoundException(__('Invalid Knowledge Area'));
        }        
       
        if ($this->request->is('post') || $this->request->is('put')) {
            
            
            $removedUnitsIDs = $this->getRemovedUnitsIDs($id, $this->request->data);
            $this->deleteUnits($removedUnitsIDs);
            
            
            if ($this->KnowledgeArea->saveAll($this->request->data)) {
                
                $this->Session->write('key', $this->request->data);
                
                $this->Session->setFlash(__('The knowledge area has been saved'));
                $this->redirect(array('action' => 'view/' . $this->KnowledgeArea->id));
            } else {
                $this->Session->setFlash(__('The knowledge area could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('KnowledgeArea.' . $this->KnowledgeArea->primaryKey => $id));
            $this->request->data = $this->KnowledgeArea->find('first', $options);
        }

        $options = array('conditions' => array('KnowledgeArea.' . $this->KnowledgeArea->primaryKey => $id));
        $this->set('knowledgeArea', $this->KnowledgeArea->find('first', $options));

        $units = $this->KnowledgeArea->Unit->find('all', array(
            'conditions' => array('Unit.knowledge_area_id' => $id),
        ));
        $this->set('units', $units);
    }

    public function add_unit($id = null) {


        if (!$this->KnowledgeArea->exists($id)) {
            throw new NotFoundException(__('Invalid Knowledge Area'));
        }
        
        if ($this->request->is('post')) {
                        
            $this->KnowledgeArea->Unit->create();
            $this->request->data['Unit']['user_id'] = $this->Auth->user('id');
            $this->request->data['Unit']['knowledge_area_id'] = $id;

            $this->Session->write('key', $this->request->data);            

            if ($this->KnowledgeArea->Unit->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The unit has been saved'));
                $this->redirect(array('controller' => 'units', 'action' => 'view' . '/' . $this->KnowledgeArea->Unit->id));
            } else {
                $this->Session->setFlash(__('The unit could not be saved. Please, try again.'));
            }
        }

        $options = array('conditions' => array('KnowledgeArea.' . $this->KnowledgeArea->primaryKey => $id));
        $this->set('knowledgeArea', $this->KnowledgeArea->find('first', $options));
        
        $topicTypes = $this->KnowledgeArea->Unit->Topic->TopicType->find('all');
        $this->set('topicTypes', $topicTypes);
        
        $masteryLevels = $this->KnowledgeArea->Unit->LearningObjective->MasteryLevel->find('all');
        $this->set('masteryLevels', $masteryLevels);
    }

    public function updateDescription($id = null) {
        
        if (isset($this->params->data['cancel'])) {
            $this->Session->setFlash(__('Your changes were not saved.', true));
            $this->redirect(array('action' => 'view/' . $id));
        }
        
        $this->Session->write('key', $this->request->data);
        if (!$this->KnowledgeArea->exists($id)) {
            throw new NotFoundException(__('Invalid knowledge area'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
//            if ($this->KnowledgeArea->saveField('description', $this->KnowledgeArea->id)) {
            if ($this->KnowledgeArea->save($this->request->data)) {
                $this->Session->setFlash(__('The knowledge area description has been saved'));
                $this->redirect(array('action' => 'view/' . $this->KnowledgeArea->id));
            } else {
                $this->Session->setFlash(__('The knowledge area could not be saved. Please, try again.'));
            }
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
        $this->KnowledgeArea->id = $id; 
        
        $options = array('conditions' => array('KnowledgeArea.' . $this->KnowledgeArea->primaryKey => $id));
        $theKnowledgeArea = $this->KnowledgeArea->find('first', $options);
        
        if (!$this->KnowledgeArea->exists()) {
            throw new NotFoundException(__('Invalid knowledge area'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->KnowledgeArea->delete()) {
            $this->Session->setFlash(__('Knowledge area deleted'));
            $this->redirect(array('controller' => 'bodyKnowledges' , 'action' => 'view/' . $theKnowledgeArea['KnowledgeArea']['body_knowledge_id']));
        }
        $this->Session->setFlash(__('Knowledge area was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->KnowledgeArea->recursive = 0;
        $this->set('knowledgeAreas', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->KnowledgeArea->exists($id)) {
            throw new NotFoundException(__('Invalid knowledge area'));
        }
        $options = array('conditions' => array('KnowledgeArea.' . $this->KnowledgeArea->primaryKey => $id));
        $this->set('knowledgeArea', $this->KnowledgeArea->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->KnowledgeArea->create();
            if ($this->KnowledgeArea->save($this->request->data)) {
                $this->Session->setFlash(__('The knowledge area has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The knowledge area could not be saved. Please, try again.'));
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
        if (!$this->KnowledgeArea->exists($id)) {
            throw new NotFoundException(__('Invalid knowledge area'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->KnowledgeArea->save($this->request->data)) {
                $this->Session->setFlash(__('The knowledge area has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The knowledge area could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('KnowledgeArea.' . $this->KnowledgeArea->primaryKey => $id));
            $this->request->data = $this->KnowledgeArea->find('first', $options);
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
        $this->KnowledgeArea->id = $id;
        if (!$this->KnowledgeArea->exists()) {
            throw new NotFoundException(__('Invalid knowledge area'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->KnowledgeArea->delete()) {
            $this->Session->setFlash(__('Knowledge area deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Knowledge area was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
