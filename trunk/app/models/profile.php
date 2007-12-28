<?php
 
class Profile extends AppModel
{
    var $name = 'Profile';
    
    
    var $belongsTo = array(
        'User' => array(
            'className'    => 'User',
            'conditions'    => 'User.active = 1'
        )
    );


	// var $validate = array(
	// 	'message' => array( 
	// 				'rule' => array('minLength', '1'),
	// 				'required' => true,
	// 				'allowEmpty' => false,
	// 				'message' => 'Your message must be longer than one character'
	// 			),
	// 	'recipient_id' => array( 
	// 					'rule' => array('checkUser'),
	// 					'required' => true,
	// 					'allowEmpty' => false,
	// 					'message' => 'Invalid user'
	// 				),
	//     'sender_id' => array( 
	// 					'rule' => array('checkUser'),
	// 					'required' => true,
	// 					'allowEmpty' => false,
	// 					'message' => 'Invalid user'
	// 				)
	// );
	//            
}
 
?>
