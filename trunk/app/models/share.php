<?php
class Share extends AppModel
{
   	var $name = 'Share';
  
	var $belongsTo = array(
       'Sender' => array(
           'className'    => 'User',
           'foreignKey'    => 'user_id'
       ),
	    'Recipient' => array(
	        'className'    => 'User',
	        'foreignKey'    => 'recipient_id'
	    )
		'Story' => array(
	        'className'    => 'Story',
	        'foreignKey'    => 'story_id'
		)
	);

   var $validate = array(
   		'story_id' => array( 
					'rule' => array('checkStory'),
					'required' => true,
					'allowEmpty' => false,
					'message' => 'Invalid story'
				),
		'recipient_id' => array( 
						'rule' => array('checkUser'),
						'required' => true,
						'allowEmpty' => false,
						'message' => 'Invalid user'
					),
       	'sender_id' => array( 
						'rule' => array('checkUser'),
						'required' => true,
						'allowEmpty' => false,
						'message' => 'Invalid user'
					)
      	'recipient_email' => array( 
					'rule' => array('email', true),
					'required' => false,
					'allowEmpty' => false,
					'message' => 'Invalid email'
					)					
	);
   
	//get a more generic checkuser/story function
    function checkUser($data)
    {
        $valid = false;

        $conditions = "User.id = $data";
                       
        if( $this->Sender->findCount($conditions) > 0)
        {
            $valid = true;
        }
       
		debug($valid);
	
        return $valid;
   }

    function checkStory($data)
    {
        $valid = false;

        $conditions = "Story.id = $data";
                       
        if( $this->Story->findCount($conditions) > 0)
        {
            $valid = true;
        }
       
		debug($valid);
	
        return $valid;
   }

	function checkUnique($data, $type)
	{
		
		if($type == 'friend'){
			$recipient_type = 'recipient_id';
		}
		else{
			$recipient_type = 'recipient_email';
		}
		
		$valid = true;
				
        $conditions = array(
    						"Share.user_id" => $data['Share']['story_id'],
    						"Share." . $recipient_type => $data['Share'][$recipient_type],
    						"Share.story_id" => $this->data['Share']['store_id']
    						);

       if( $this->Share->findCount($conditions) > 0)
       {
           $valid = false;
       }

		debug($valid);

       return $valid;		
		
	}


}
?>