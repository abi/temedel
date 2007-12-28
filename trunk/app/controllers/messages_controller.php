<?php

class MessagesController extends AppController
{
    var $name = 'Messages';  
  	var $helpers = array('Ajax'); 

	var $paginate = array(
        'limit' => 2,
        'order' => array(
            'Message.created' => 'desc'
        )

    );

    function send()
    {
		if (!empty($this->data))
        {
			$this->data['Message']['sender_id'] = $this->Auth->user('id');
			
            if ($this->Message->save($this->data))
            {
                  $this->flash('Your message has been submitted','/view/', 2);
        	}
		}
    
    }
    
	function index( $type, $user_id ){
		
		if($type == "sent"){
			$id = "sender_id";
			$sent = true;
		}
		else{
			$id = "recipient_id";
			$sent = false;
		}
		
		$conditions  = "Message.$id = $user_id";
		$data = $this->paginate('Message', $conditions);
    	$this->set('messages',compact('data'));
		$this->set('sent', $sent);

	}


}

?>