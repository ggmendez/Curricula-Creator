<?php

App::uses('AppController', 'Controller');

/**
 * Programs Controller
 *
 * @property Program $Program
 */
class ProgramsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Program->recursive = 0;
        $this->set('programs', $this->paginate(array(
                    'Program.user_id' => $this->Auth->user('id')
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
        if (!$this->Program->exists($id)) {
            throw new NotFoundException(__('Invalid program'));
        }
        $options = array('conditions' => array('Program.' . $this->Program->primaryKey => $id));
        $this->set('program', $this->Program->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Program->create();
            // Setting the id of the user is adding this program
            $this->request->data['Program']['user_id'] = $this->Auth->user('id');
            if ($this->Program->save($this->request->data)) {
                $this->Session->setFlash(__('The program has been saved'));
                $this->redirect(array('action' => 'view' . '/' . $this->request->data['Program']['id']));
            } else {
                $this->Session->setFlash(__('The program could not be saved. Please, try again.'));
            }
        }
        $courses = $this->Program->Course->find('list', array(
            'conditions' => array('Course.user_id' => $this->Auth->user('id'))));
        $this->set(compact('courses'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Program->exists($id)) {
            throw new NotFoundException(__('Invalid program'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Program->save($this->request->data)) {
                $this->Session->setFlash(__('The program has been saved'));
                $this->redirect(array('action' => 'view' . '/' . $this->request->data['Program']['id']));
            } else {
                $this->Session->setFlash(__('The program could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Program.' . $this->Program->primaryKey => $id));
            $this->request->data = $this->Program->find('first', $options);
        }

        $courses = $this->Program->Course->find('list', array(
            'conditions' => array('Course.user_id' => $this->Auth->user('id'))));

        $programCourses = $this->Program->CoursesProgram->find('all', array(
            'fields' => 'CoursesProgram.course_id',
            'conditions' => array('CoursesProgram.program_id' => $id),
        ));

        $selectedCoursesIDs = array();
        foreach ($programCourses as $programCourse) {
            array_push($selectedCoursesIDs, $programCourse['CoursesProgram']['course_id']);
        }
        
        $coursesOfThisProgram = array();
        foreach ($selectedCoursesIDs as $currentID) {
            if (isset($courses[$currentID])) {
                array_push($coursesOfThisProgram, $courses[$currentID]);
            }
        }
        
        $selectedCourses = array();
        foreach ($coursesOfThisProgram as $currentCourse) {
            $pos = array_search($currentCourse, $courses);
            array_push($selectedCourses, $pos);
        }
        
        $this->set(compact('selectedCourses', 'courses'));
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
        $this->Program->id = $id;
        if (!$this->Program->exists()) {
            throw new NotFoundException(__('Invalid program'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Program->delete()) {
            $this->Session->setFlash(__('Program deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Program was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Program->recursive = 0;
        $this->set('programs', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Program->exists($id)) {
            throw new NotFoundException(__('Invalid program'));
        }
        $options = array('conditions' => array('Program.' . $this->Program->primaryKey => $id));
        $this->set('program', $this->Program->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Program->create();
            if ($this->Program->save($this->request->data)) {
                $this->Session->setFlash(__('The program has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The program could not be saved. Please, try again.'));
            }
        }
        $courses = $this->Program->Course->find('list');
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
        if (!$this->Program->exists($id)) {
            throw new NotFoundException(__('Invalid program'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Program->save($this->request->data)) {
                $this->Session->setFlash(__('The program has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The program could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Program.' . $this->Program->primaryKey => $id));
            $this->request->data = $this->Program->find('first', $options);
        }
        $courses = $this->Program->Course->find('list');
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
        $this->Program->id = $id;
        if (!$this->Program->exists()) {
            throw new NotFoundException(__('Invalid program'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Program->delete()) {
            $this->Session->setFlash(__('Program deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Program was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
