<?php
class Category extends AppModel
{
   var $name = 'Category';
   
/*
   var $hasMany = array(
        'Story' => array(
            'className'     => 'Story'        
            )
    );

*/


	function getCategoriesSQL($category){
	
	        
	        $result = $this->findByCategory($category);
	        
	        debug($result);
	        
        	
        	$parentId = $result['Category']['parent_id'];
        	$id = $result['Category']['id'];
        	
        	if($parentId == 0){
        	
        		$listId = $this->findAll(array('Category.parent_id'=> $id),'id');
        		
        		debug($listId);
        		
        		$categoryIdList = "(";
        		
        		foreach ($listId as $temp){
        			
        			$categoryIdList = $categoryIdList . $temp['Category']['id'] . ',';
        			debug($temp['Category']['id']);
        		}
        		
        		$categoryIdList = rtrim($categoryIdList, ',') . ')';
        		
        		debug($categoryIdList);
        		
        		return "Story.category_id IN $categoryIdList";
        	}
        	else{
        		return "Story.category_id = $id";
        	}
	
	
	
	}
}
?>