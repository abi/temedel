<?php

class FriendsController extends AppController
{
    var $name = 'Friends';

    function add($friend_id)
    {
		if($friend_id && $friend_id != $this->Auth->user('id')){
			
			$this->data['Friend']['user_id'] = $this->Auth->user('id');
			$this->data['Friend']['friend_id'] = $friend_id;
        
		    $conditions = "Friend.user_id = " . $this->data['Friend']['user_id'] . " AND Friend.friend_id =" . $this->data['Friend']['friend_id'];
		    $isFriend = $this->Friend->findCount($conditions);
			
	        if($isFriend == 0){
				if($this->Friend->save($this->data)){
					$this->flash('You have befriended the person','/stories/');
				}
	    	}
		}

    }

	function remove($friend_id){
		
		if($friend_id && $friend_id != $this->Auth->user('id')){
        
		    $conditions = "Friend.user_id = " . $this->Auth->user('id') . " AND Friend.friend_id = " . $friend_id;
			
			if($this->Friend->deleteAll($conditions)){
					$this->flash('You are no longer friends with this asshole','/stories/');
			}
			
		}		
		
	}
	    

}

?>