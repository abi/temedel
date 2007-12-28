<?php

class UsersController extends AppController
{
    var $name = 'Users';
    var $uses = array('User','Friend', 'Profile');
    var $components = array('Recaptcha');

 	function login() {
 	
		$this->Auth->login();
  	}


	function logout() {
		$this->redirect($this->Auth->logout());
	}


   function register(){
	       
		$message = "";
		
		$recaptchaValid = $this->Recaptcha->is_valid($this->params['form']);
		
       	if (!$recaptchaValid)
       	{
           $message = 'Invalid reCAPTCHA.';
       	}
       

		if (!empty($this->data) && $recaptchaValid)
		{
			if ($this->User->save($this->data))
			{
				 $this->flash('Your have reg as' . $this->Auth->user('id') ,'/users/login/', 2); 
			}
		}
		
		$this->set('message', $message);
		$this->set('recaptcha', $this->Recaptcha->display());
   
   }

	function password(){
		
		if (!empty($this->data))
		{
			debug($this->data);
			
			if($this->data['User']['password'] != $this->data['User']['re_type_password']){
				
				echo "password don't match";
			}
			else{
				
				$this->User->id = $this->Auth->user('id');
				
				if ($this->User->saveField('password', $this->data['User']['password']))
				{
					 $this->flash('Your have changed your password','/stories/index', 2); 
				}
			}
		}
				
	}
	
	function view( $id ){
		
		$conditions = "Profile.user_id = $id";
		$this->set('profile', $this->Profile->find($conditions));
      
   	}

	function friends( $id ){
		
		$conditions = "Friend.user_id = $id";
		$this->set('friends', $this->Friend->findAll($conditions));
	    
	}
	
	function followers( $id ){
		
		$conditions = "Friend.friend_id = $id";
		$this->set('friends', $this->Friend->findAll($conditions));
		
		$this->render('friends');
		
	}
   	
	function beforeFilter() {
				
		parent::beforeFilter();
		$this->Auth->allow('register');
			
	}
   
       
}

?>