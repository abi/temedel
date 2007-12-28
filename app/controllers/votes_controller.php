<?php

class VotesController extends AppController
{
    var $name = 'Votes';
    var $uses = array('Story', 'Vote');
    var $components = array('RequestHandler');

    function submit($content_type, $content_id, $type)
    {
		//$this->RequestHandler->setAjax($this);
		//$this->autoRender = false;
		
		$this->data['Vote']['content_id'] = $content_id;
		$this->data['Vote']['content_type'] = $content_type;
		$this->data['Vote']['type'] = $type;
		

        
            $conditions = array(
        						"Vote.user_id" => $this->Auth->user('id'),
        						"Vote.content_id" => $this->data['Vote']['content_id'],
        						"Vote.content_type" => $this->data['Vote']['content_type']
        						);
        	
        	$userVote = $this->Vote->findCount($conditions);
			$userVoteType = false;
			
        	if($userVote != 0){
				$userVoteType = $this->Vote->field('type',$conditions);
    		}

        	//debug($userVote);
        	//debug($userVoteType);
        				    	
			//if vote has been registered and it is the same kind as the current vote
			if( $userVote != 0 && $userVoteType == $this->data['Vote']['type']){
				exit();
			}
			
			//if vote registered is not the same kind as the current vote
			if( $userVoteType != $this->data['Vote']['type'] ){
        		$this->Vote->deleteAll($conditions);
			}
			
			            
		    //add the vote to vote table
		    $this->data['Vote']['user_id'] = $this->Auth->user('id');
			$this->Vote->save($this->data);		  
		  
		  	if($this->data['Vote']['content_type'] == 'story'){
		   		 
		   		 //if not popular and fits popular algo, make popular
		   		 
		  	}
		
			$this->set('votes', 'hiadasdasdadsadsd');
			$this->render('submit');

    }
    

}

?>