<?php
class Message extends AppModel
{
   var $name = 'Message';
   
	var $belongsTo = array(
        'Sender' => array(
            'className'    => 'User',
            'foreignKey'    => 'sender_id'
        ),
	    'Recipient' => array(
	        'className'    => 'User',
	        'foreignKey'    => 'recipient_id'
	    )
	);

    var $validate = array(
    	'message' => array( 
					'rule' => array('minLength', '1'),
					'required' => true,
					'allowEmpty' => false,
					'message' => 'Your message must be longer than one character'
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
	); 
 
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
   
}
?>