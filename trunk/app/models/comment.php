<?php
class Comment extends AppModel
{
   var $name = 'Comment';
   
   var $belongsTo = array(
        'User' => array(
            'className'    => 'User',
        ),
        'Story' => array(
            'className'    => 'Story',
        )
    );

   var $hasMany = array(
        'Vote' => array(
            'className'     => 'Vote',
            'foreignKey'    => 'content_id',
            'conditions'    => 'Vote.content_type = \'comment\'',
            'order'    => 'Vote.time DESC',
            'limit'        => '5',
            'dependent'=> true
        )
    );
    
    
   
    var $validate = array(
        'body' => array( 
						'rule' => array('between', 5, 1000),
						'required' => true,
						'allowEmpty' => false,
						'message' => 'You need a title that is between 5 and 1000 characters'
					),
        'user_id' => array( 
						'rule' => 'numeric', //TODO
						'required' => true,
						'allowEmpty' => false,
						'message' => 'Invalid user'
					),
        'parent_id' => array( 
						'rule' => array('checkParent'),
						'required' => true,
						'allowEmpty' => false,
						'message' => 'Invalid parent'
					),
		'story_id' => array( 
						'rule' => 'numeric', //TODO: checkStory(), integer
						'required' => true,
						'allowEmpty' => false,
						'message' => 'Invalid story'
					)
		);
		
		
    function checkParent($data)
    {
        $valid = false;
        $parent_id = $data;
        
        if($parent_id == 0){
        	$valid = true;
        }
     
        $conditions = "Comment.id = $parent_id";
                        
        if( $this->findCount($conditions) > 0)
        {
            $valid = true;
        }

		debug($valid);

        return $valid;
   }       
   
}
?>