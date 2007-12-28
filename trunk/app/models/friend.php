<?php
class Friend extends AppModel
{
   	var $name = 'Friend';
   	
	var $belongsTo = array(
        'User' => array(
            'className'    => 'User'
        )
    );

    var $validate = array(
        'user_id' => array( 
						'rule' => array('checkUser'),
						'required' => true,
						'allowEmpty' => false,
						'message' => 'Invalid user'
					),
        'friend_id' => array( 
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
                        
        if( $this->User->findCount($conditions) > 0)
        {
            $valid = true;
        }
        
		debug($valid);
		
        return $valid;
   }
   
}
?>