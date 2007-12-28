<?php

class SharesController extends AppController
{
    var $name = 'Shares';    
    var $components = array('Email'); 
  	var $helpers = array('Ajax'); 

    function index()
    {
    	//TODO
    	//if story has not already been shared
    	//share (use share model)
		if (!empty($this->data))
        {
			
			//it is possible to share stories with (1) friends on expose or (2) emails
			
			$this->Email->to = 'abimanyuraja@gmail.com';
	        $this->Email->subject = $this->Auth->user('nick') . ' has shared a link with you';
	        $this->Email->replyTo = 'noreply@expose.com';
	        $this->Email->from = 'Expose <noreply@expose.com>';
	        //Set the body of the mail as we send it.
	        //Note: the text can be an array, each element will appear as a
	        //seperate line in the message body.
			debug($this->Email->send());
	        if ( $this->Email->send(' has shared a link with you') ) {
	            $this->Session->setFlash('Simple email sent');
	        } else {
	            $this->Session->setFlash('Simple email not sent');
	        }
			
			exit();		
			//set the userid of sender to be the current logged in user
			$data['Share']['user_id'] = $this->Auth->user('id');
	    	
			//handle each friend
			$friends = split('\n',$data['friend']);
			
			$failures = array();
			
			foreach($friends as $friendId){
				
				$data['Share']['recipient_id'] = $friendId;
				
				
				if ($this->Share->checkUnique($data,'friend') && $this->Share->save($this->data))
	            {
	        		//send the email
				}
				else{
					array_push($failures, $friendId);
				}

			}
				
			$emails = split('\n',$data['email']);

			foreach($emails as $email){
				

			}
			
			//if no failed attempts at sharing
			if(count($failures) == 0){
				$this->set('response', 'Succesfully shared');
			}
			else{
				$this->set('response', 'You failed to send to ' . $failures . 'probably because you already shared this link with them. If not, report a bug. Thanks.');
			}
			
		}
			

    	//like submit cos same page posts and display
    
    }
    

    function send() {
        $this->Email->to = 'abimanyuraja@gmail.com';
        $this->Email->subject = 'Cake test simple email';
        $this->Email->replyTo = 'noreply@example.com';
        $this->Email->from = 'Cake Test Account <noreply@example.com>';
        //Set the body of the mail as we send it.
        //Note: the text can be an array, each element will appear as a
        //seperate line in the message body.
        if ( $this->Email->send('Here is the body of the email') ) {
            $this->Session->setFlash('Simple email sent');
        } else {
            $this->Session->setFlash('Simple email not sent');
        }
        //$this->redirect('/');
    }



}

?>