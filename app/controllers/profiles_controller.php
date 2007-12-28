<?php

class ProfilesController extends AppController
{
    var $name = 'Profiles';


   	function edit(){
	
	    if (!empty($this->data))
        {
        	debug($this->data);
			
			$this->data['Profile']['user_id'] = $this->Auth->user('id');
			$this->data['Profile']['avatar_file'] = "avatars/" . $this->Auth->user('id') . ".png"; //file extensions
			
			//find a more efficient way
			
			$conditions = "Profile.user_id = " . $this->Auth->user('id');
			$this->Profile->deleteAll($conditions);
			
            if ($this->Profile->save($this->data))
            {
                  $this->flash('Your profile has been updated'); //link to profile
            }

       	 }else{
					$conditions = "Profile.user_id = " . $this->Auth->user('id');
					$this->set('profile', $this->Profile->find($conditions));	
		}
		
	}
	
	function change_avatar(){
		
		if (!empty($this->data))
        {
			$target_path = "avatars/" . $this->Auth->user('id') . ".png"; 
		
			if($this->data['Profile']['avatar_file']['tmp_name']){
				if(!move_uploaded_file($this->data['Profile']['avatar_file']['tmp_name'], $target_path)) {
				   $error = "There was an error uploading the file, please try again!";
				}
			}
		
			$this->set('error', $error);
		}
		else{
			
			$conditions = "Profile.user_id = " . $this->Auth->user('id');
			$this->set('avatar_file', $this->Profile->field('avatar_file',$conditions));	
			$this->set('error', '');
		}
		
	}

       
}

?>