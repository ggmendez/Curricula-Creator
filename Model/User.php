<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
	
	/*public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}*/
	
	public function beforeSave($options = array()) {
        if (isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        return true;
    }
	
	public function isOwnedBy($currentUser, $user) {
		return $this->field('id', array('id' => $currentUser, 'id' => $user)) === $currentUser;
	}
	
	public function register() {
		if ($this->User->save($this->request->data)) {
			$id = $this->User->id;
			$this->request->data['User'] = array_merge($this->request->data['User'], array('id' => $id));
			$this->Auth->login($this->request->data['User']);
			$this->redirect('/users/home');
		}
	}
}