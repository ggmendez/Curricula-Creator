<?php

App::uses('AppController', 'Controller');

/**
 * Units Controller
 *
 * @property Unit $Unit
 */
class UnitsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Unit->recursive = 0;

        // TODO:
        // Se deberían mostrar solo las unidades de las que yo soy dueño, no todas
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
        $unit = $this->Unit->find('first', $options);
        $this->set('unit', $unit);

        $options = array('conditions' => array('BodyKnowledge.id' => $unit['KnowledgeArea']['body_knowledge_id']));
        $this->set('bodyKnowledge', $this->Unit->KnowledgeArea->BodyKnowledge->find('first', $options));

        $this->set('requestData', $this->Session->read('key'));
        
        $topicTypes = $this->Unit->Topic->TopicType->find('all');
        $this->set('topicTypes', $topicTypes);
        
        $masteryLevels = $this->Unit->LearningObjective->MasteryLevel->find('all');
        $this->set('masteryLevels', $masteryLevels);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Unit->create();
            $this->request->data['Unit']['user_id'] = $this->Auth->user('id');

//            $this->Session->write('key', $this->request->data);            

            if ($this->Unit->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The unit has been saved'));
                $this->redirect(array('action' => 'view' . '/' . $this->Unit->id));
            } else {
                $this->Session->setFlash(__('The unit could not be saved. Please, try again.'));
            }
        }
        $knowledgeAreas = $this->Unit->KnowledgeArea->find('list');
        $this->set(compact('knowledgeAreas'));
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
            
            $options = array(
                'Topic.unit_id' => $id
            );
            $this->Unit->Topic->deleteAll($options, true);
            
            $options = array(
                'LearningObjective.unit_id' => $id
            );
            $this->Unit->LearningObjective->deleteAll($options, true);            
            
            if ($this->Unit->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The unit has been saved'));
                $this->redirect(array('action' => 'view' . '/' . $this->Unit->id));
            } else {
                $this->Session->setFlash(__('The unit could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Unit.' . $this->Unit->primaryKey => $id));
            $this->request->data = $this->Unit->find('first', $options);
        }
        $knowledgeAreas = $this->Unit->KnowledgeArea->find('list');
        $this->set(compact('knowledgeAreas'));

        $options = array('conditions' => array('Unit.' . $this->Unit->primaryKey => $id));
        $unit = $this->Unit->find('first', $options);
        $this->set('unit', $unit);

        $options = array('conditions' => array('BodyKnowledge.id' => $unit['KnowledgeArea']['body_knowledge_id']));
        $this->set('bodyKnowledge', $this->Unit->KnowledgeArea->BodyKnowledge->find('first', $options));
        
        $availableTopicTypes = $this->Unit->Topic->TopicType->find('all');
        $this->set('availableTopicTypes', $availableTopicTypes);
        
        $availableMasteryLevels = $this->Unit->LearningObjective->MasteryLevel->find('all');
        $this->set('availableMasteryLevels', $availableMasteryLevels);
        
        $topicTypes = $this->Unit->Topic->TopicType->find('list');
        $this->set('topicTypes', $topicTypes);
        
        $masteryLevels = $this->Unit->LearningObjective->MasteryLevel->find('list');
        $this->set('masteryLevels', $masteryLevels);
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
        
        $options = array('conditions' => array('Unit.' . $this->Unit->primaryKey => $id));
        $theUnit = $this->Unit->find('first', $options);
        
        if (!$this->Unit->exists()) {
            throw new NotFoundException(__('Invalid unit'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Unit->delete()) {
            $this->Session->setFlash(__('Unit deleted'));
            $this->redirect(array('controller' => 'knowledgeAreas',  'action' => 'view/' . $theUnit['Unit']['knowledge_area_id']));
        }
        $this->Session->setFlash(__('Unit was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
    
    public function add_topic($id = null) {
        
        $options = array('conditions' => array('Unit.' . $this->Unit->primaryKey => $id));
        $unit = $this->Unit->find('first', $options);
        $this->set('unit', $unit);
        
        if ($this->request->is('post')) {
            $this->Unit->Topic->create();
            
            
            $this->request->data['Topic']['unit_id'] = $id;
            
            if ($this->Unit->Topic->saveAll($this->request->data)) {
                $this->Session->setFlash(__('Your Topic has been added to the "' . $unit['Unit']['name'] . '"  unit'));
                $this->redirect(array('controller' => 'units', 'action' => 'view/' . $id));
            } else {
                $this->Session->setFlash(__('The topic could not be saved. Please, try again.'));
            }
        }
        
        $options = array('conditions' => array('KnowledgeArea.' . $this->Unit->primaryKey => $unit['Unit']['knowledge_area_id']));
        $knowledgeArea = $this->Unit->KnowledgeArea->find('first', $options);
        $this->set('knowledgeArea', $knowledgeArea);
        
        $topicTypes = $this->Unit->Topic->TopicType->find('list');
                
        $this->set(compact('topicTypes'));
        
    }
    
    public function add_learning_objective ($id = null) {
        
        $this->Unit->LearningObjective->recursive = true;
        
        $options = array('conditions' => array('Unit.' . $this->Unit->primaryKey => $id));
        $unit = $this->Unit->find('first', $options);
        $this->set('unit', $unit);
        
        if ($this->request->is('post')) {
            $this->Unit->LearningObjective->create();
            
            
            $this->request->data['LearningObjective']['unit_id'] = $id;
            
            if ($this->Unit->LearningObjective->saveAll($this->request->data)) {
                $this->Session->setFlash(__('Your Learning Objective has been added to the "' . $unit['Unit']['name'] . '"  unit'));
                $this->redirect(array('controller' => 'units', 'action' => 'view/' . $id));
            } else {
                $this->Session->setFlash(__('Your Learning Objective could not be saved. Please, try again.'));
            }
        }
        
        $options = array('conditions' => array('KnowledgeArea.' . $this->Unit->primaryKey => $unit['Unit']['knowledge_area_id']));
        $knowledgeArea = $this->Unit->KnowledgeArea->find('first', $options);
        $this->set('knowledgeArea', $knowledgeArea);
        
        $topicTypes = $this->Unit->Topic->TopicType->find('list');                
        $masteryLevels = $this->Unit->LearningObjective->MasteryLevel->find('list');
                
        $this->set(compact('topicTypes', 'masteryLevels'));
        
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
        $knowledgeAreas = $this->Unit->KnowledgeArea->find('list');
        $this->set(compact('knowledgeAreas'));
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
        $knowledgeAreas = $this->Unit->KnowledgeArea->find('list');
        $this->set(compact('knowledgeAreas'));
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
