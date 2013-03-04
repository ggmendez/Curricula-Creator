<?php

App::uses('AppController', 'Controller');

/**
 * Courses Controller
 *
 * @property Course $Course
 */
class CoursesController extends AppController {

    var $helpers = array('Html', 'Form', 'Js');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Course->recursive = 0;
        // Show only the courses of the logged in user
        $this->set('courses', $this->paginate(array('Course.user_id' => $this->Auth->user('id'))));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
        $this->set('course', $this->Course->find('first', $options));

// This variable was wrote in the add method        
//        $this->set('requestData', $this->Session->read('key'));
    }

    private function generateCourseCode($requestData) {

        $selectedArea = $this->Course->Area->find('all', array(
            'fields' => array('Area.abbreviation'),
            'conditions' => array('Area.id' => $requestData['Course']['area_id'])));
        $areaCode = $selectedArea[0]['Area']['abbreviation'];

        $selectedLevel = $this->Course->Level->find('all', array(
            'fields' => array('Level.numeric_representation'),
            'conditions' => array('Level.id' => $requestData['Course']['level_id'])));
        $level = $selectedLevel[0]['Level']['numeric_representation'];

        $selectedSubject = $this->Course->Subject->find('all', array(
            'fields' => array('Subject.code'),
            'conditions' => array('Subject.id' => $requestData['Course']['subject_id'])));
        $subject = $selectedSubject[0]['Subject']['code'];

        $identifyingNumber = $requestData['Course']['identifying_number'];

        $selectedImplementationStrategy = $this->Course->ImplementationStrategy->find('all', array(
            'fields' => array('ImplementationStrategy.code'),
            'conditions' => array('ImplementationStrategy.id' => $requestData['Course']['implementation_strategy_id'])));
        $implementationStrategy = $selectedImplementationStrategy[0]['ImplementationStrategy']['code'];

        $courseCode = $areaCode . $level . $subject . $identifyingNumber . $implementationStrategy;

        return $courseCode;
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {



        if ($this->request->is('post')) {
            $this->Course->create();

            // Setting the if of the user is adding this course
            $this->request->data['Course']['user_id'] = $this->Auth->user('id');

            $requestData = $this->request->data;
            $code = $this->generateCourseCode($requestData);
            $this->request->data['Course']['code'] = $code;
            
            debug ($this->request->data);

            $this->Course->Objective->Course->saveAll($this->request->data);

            if ($this->Course->save($this->request->data)) {
                $this->Session->setFlash(__('The course has been saved'));
// Writing a variable in the session object so that it can be read by any other method
// $this->Session->write('key', $this->request->data);
                $this->redirect(array('action' => 'view' . '/' . $this->Course->id));
            } else {
                $this->Session->setFlash(__('The course could not be saved. Please, try again.'));
            }
        }
        $areas = $this->Course->Area->find('list');
        $levels = $this->Course->Level->find('list');
        $subjects = $this->Course->Subject->find('list');
        $types = $this->Course->Type->find('list');
        $implementationStrategies = $this->Course->ImplementationStrategy->find('list');
        $users = $this->Course->User->find('list');
        $axes = $this->Course->Axis->find('list');
        $this->set(compact('areas', 'levels', 'subjects', 'types', 'implementationStrategies', 'users', 'axes'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            $requestData = $this->request->data;
            $code = $this->generateCourseCode($requestData);
            $this->request->data['Course']['code'] = $code;

            if ($this->Course->save($this->request->data)) {
                $this->Course->Objective->Course->saveAll($this->request->data);
                $this->Session->setFlash(__('The course has been saved'));
                $this->redirect(array('action' => 'view' . '/' . $this->request->data['Course']['id']));
            } else {
                $this->Session->setFlash(__('The course could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
            $this->request->data = $this->Course->find('first', $options);
        }
        $areas = $this->Course->Area->find('list');
        $levels = $this->Course->Level->find('list');
        $subjects = $this->Course->Subject->find('list');
        $types = $this->Course->Type->find('list');
        $implementationStrategies = $this->Course->ImplementationStrategy->find('list');
        $users = $this->Course->User->find('list');
        $axes = $this->Course->Axis->find('list');
        $objectives = $this->Course->Objective->find('all', array(
            'conditions' => array('Objective.course_id' => $this->request->data['Course']['id'])));

        // TODO: luego debo hacer units

        $selectedAxes = $this->getSelectedAxesPositions();
        $axesOfThisCourse = $this->getAxes();

        $this->set(compact('areas', 'levels', 'subjects', 'types', 'implementationStrategies', 'users', 'axes', 'selectedAxes', 'axesOfThisCourse', 'objectives'));
    }

    private function getAxes() {

        $courseAxesCourses = $this->Course->AxesCourse->find('all', array(
            'fields' => array('AxesCourse.axis_id'),
            'conditions' => array('AxesCourse.course_id' => $this->request->data['Course']['id'])));

        $axesIDs = array();
        foreach ($courseAxesCourses as $axesCourse):
            array_push($axesIDs, $axesCourse['AxesCourse']['axis_id']);
        endforeach;

        $theAxes = $this->Course->Axis->find('all', array(
            'conditions' => array('Axis.id' => $axesIDs)));

        return $theAxes;
    }

    private function getSelectedAxesPositions() {

//        $courseAxesCourses = $this->Course->AxesCourse->find('all', array(
//            'fields' => array('AxesCourse.axis_id'),
//            'conditions' => array('AxesCourse.course_id' => $this->request->data['Course']['id'])));
//
//        $axesIDs = array();
//        foreach ($courseAxesCourses as $axesCourse):
//            array_push($axesIDs, $axesCourse['AxesCourse']['axis_id']);
//        endforeach;
//
//        $theAxes = $this->Course->Axis->find('all', array(
////            'fields' => array('Axis.name'),
//            'conditions' => array('Axis.id' => $axesIDs)));

        $theAxes = $this->getAxes();

        $axesNames = array();
        foreach ($theAxes as $axis):
            array_push($axesNames, $axis['Axis']['name']);
        endforeach;

        $allAxes = $this->Course->Axis->find('list');

        $IDstoSelect = array();
        foreach ($axesNames as $name):
            if (in_array($name, $allAxes)) {
                $pos = array_search($name, $allAxes);
                array_push($IDstoSelect, $pos);
            }
        endforeach;

        return $IDstoSelect;
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
        $this->Course->id = $id;
        if (!$this->Course->exists()) {
            throw new NotFoundException(__('Invalid course'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Course->delete()) {
            $this->Session->setFlash(__('Course deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Course was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Course->recursive = 0;
        $this->set('courses', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
        $this->set('course', $this->Course->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Course->create();

            if ($this->Course->save($this->request->data)) {
                $this->Session->setFlash(__('The course has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The course could not be saved. Please, try again.'));
            }
        }
        $areas = $this->Course->Area->find('list');
        $levels = $this->Course->Level->find('list');
        $subjects = $this->Course->Subject->find('list');
        $types = $this->Course->Type->find('list');
        $implementationStrategies = $this->Course->ImplementationStrategy->find('list');
        $users = $this->Course->User->find('list');
        $axes = $this->Course->Axi->find('list');
        $this->set(compact('areas', 'levels', 'subjects', 'types', 'implementationStrategies', 'users', 'axes'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Course->save($this->request->data)) {
                $this->Session->setFlash(__('The course has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The course could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
            $this->request->data = $this->Course->find('first', $options);
        }
        $areas = $this->Course->Area->find('list');
        $levels = $this->Course->Level->find('list');
        $subjects = $this->Course->Subject->find('list');
        $types = $this->Course->Type->find('list');
        $implementationStrategies = $this->Course->ImplementationStrategy->find('list');
        $users = $this->Course->User->find('list');
        $axes = $this->Course->Axi->find('list');
        $this->set(compact('areas', 'levels', 'subjects', 'types', 'implementationStrategies', 'users', 'axes'));
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
        $this->Course->id = $id;
        if (!$this->Course->exists()) {
            throw new NotFoundException(__('Invalid course'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Course->delete()) {
            $this->Session->setFlash(__('Course deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Course was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user = null) {

        // To be authorized, a user should be logged in
        if ($this->Auth->user()) {

            // All registered users can add courses
            if ($this->action === 'add') {
                return true;
            }

            // The owner of a course can edit and delete it
            if (in_array($this->action, array('edit', 'delete'))) {
                $courseId = $this->request->params['pass'][0];
                if ($this->Course->isOwnedBy($courseId, $user['id'])) {
                    return true;
                }
            }

            return parent::isAuthorized($user);
        } else {
            return false;
        }
    }

}
