<?php
class Story extends AppModel
{
   var $name = 'Story';
   
   var $belongsTo = array(
        'User' => array(
            'className'    => 'User',
        ),
        'Category' => array(
            'className'    => 'Category',
        )
    );
  
   var $hasMany = array(
        'Comment' => array(
            'className'     => 'Comment'
        ),
        
        'Vote' => array(
            'className'     => 'Vote',
            'foreignKey'    => 'content_id',
            'conditions'    => 'Vote.content_type = \'story\'',
            'order'    => 'Vote.created DESC',
            'dependent'=> true
        )
    );
   
   
    var $validate = array(
        'title' => array( 
						'rule' => array('between', 5, 60),
						'required' => true,
						'allowEmpty' => false,
						'message' => 'You need a title that is between 5 and 80 characters'
					),
        'description' => array( 
						'rule' => array('between', 5, 350),
						'required' => true,
						'allowEmpty' => false,
						'message' => 'You need a description that is between 5 and 350 characters'
					),
        'link' => array( 
						'rule' => 'url',
						'required' => true,
						'allowEmpty' => false,
						'message' => 'Your link must be an URL'
					),
        'type' => array( 
						'rule' => array('checkType'),
						'required' => true,
						'allowEmpty' => false,
						'message' => 'Invalid type'
					),
        'category_id' => array( 
						'rule' => array('checkCategory'),
						'required' => true,
						'allowEmpty' => false,
						'message' => 'Invalid category'
					),
        'user_id' => array( 
						'rule' => 'alphanumeric', //TODO
						'required' => true,
						'allowEmpty' => false,
						'message' => 'Invalid user_id'
					),
	    'popular' => array( 
						'rule' => array('comparison', '==', 0),
						'required' => true,
						'allowEmpty' => false,
						'on' => 'create',
						'message' => 'Invalid popularity status'
					)
		); 
		
	
	 
	//FUNCTIONS
	
    function checkType($data)
    {
        $valid = false;
                
        $validTypes = array("text", "image", "audio", "video");
        
        if( in_array($data, $validTypes))
        {
            $valid = true;
        }
        
        return $valid;
   }   
   
    function checkCategory($data)
    {
        $valid = false;
        
        $conditions = "Category.id = $data AND Category.parent_id > 0";
        
        debug($this->Category->findCount($conditions));
                
        if( $this->Category->findCount($conditions) > 0)
        {
            $valid = true;
        }
        
        return $valid;
   }       


   function makePopular ($id=null){

      if ($id)
      {
      	//if already popular dont do anything
      	  //make popular using current time
          $this->query("UPDATE `stories` SET `popular` = NOW() WHERE `id` = $id");


      }     
   }

	function getVotes ( $type, $id){
		
        $conditions = "Vote.content_id = $id AND Vote.type = '$type' AND Vote.content_type = 'story'";
        return $this->Vote->findCount($conditions);

	}
   
}
?>