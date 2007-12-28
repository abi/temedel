<?php

//HELP:  use reffer referrer()
class StoriesController extends AppController
{
    var $name = 'Stories';
    var $uses = array('Story','Comment', 'Category', 'Vote');
  	var $helpers = array('Html', 'Tree', 'Time', 'Ajax'); 
  	
  	var $paginate = array(
        'limit' => 10,
        'order' => array(
            'Story.created' => 'asc'
        )

    );
   	

                      
    function index($type = 'all' , $category = 'all', $status = 'popular', $sort = 'recent')
    {
    	//skinny controller
    	
        //debug($type);
        
        $conditions = array();
        
        //type
        
        if(!($type == 'all')){
        	array_push($conditions, "Story.type = '$type'");
        }
        
        //categories
        
        if( !($category == 'all')){
        
        	  array_push($conditions, $this->Category->getCategoriesSQL($category));
						        
        }
        
        //status

        if ( $status == 'upcoming'){
        	array_push($conditions, "Story.popular = '0000-00-00 00:00:00.0'");
        }
        else{
        	array_push($conditions, "NOT Story.popular = '0000-00-00 00:00:00.0'");
        }
        
        //sort (24 hr,)
        //WORKS
        if ( $sort == 'day'){
        	$order = "Story.title ASC";
        	$this->paginate['order'] = $order; 
        }
        else if( $sort == 'week'){
        
        }
        else if( $sort == 'week'){
        
        }
        
        //debug($conditions);
        
        $data = $this->paginate('Story', $conditions);
        
        foreach($data as &$story){
			
			//debug($this->Story->getVotes('up', $story['Story']['id']) );
			
			$story['Story']['votes'] = $this->Story->getVotes('up', $story['Story']['id']) - $this->Story->getVotes('down', $story['Story']['id']);
			//$story['Story']['id'] = "hihaidasda";
			
			//debug($story);
			
		}
		
		//debug($data);
		
    	$this->set('stories',compact('data'));
    }    
    
    
    
    function view($id = null)
    {
        $this->Story->id = $id;
        $this->set('story', $this->Story->read());
        
        //get All comments of the story
        $conditions = array("Comment.story_id" => $id);        
        $this->set('comments',  $this->Comment->findAllThreaded($conditions));
        
    }
    
    function submit()
    {
        if (!empty($this->data))
        {
        	
        	$this->data['Story']['user_id'] = $this->Auth->user('id');
        	$this->data['Story']['popular'] = 0;
        	
        	debug($this->data);
        	
            if ($this->Story->save($this->data))
            {
                  $this->flash('Your story has been submitted by' . $this->Auth->user('id') ,'/view/'.$this->Story->getLastInsertId, 2); //TODO link to the story page (lastId)
            }
        }else{
	
			$this->set('categories', $this->Category->findAllThreaded());
	
		}

		
    }
    
    function popular($id = null){
    
    	       $this->Story->makePopular($id);
    
    }

	function import(){
		
		//not working categories
		// Array
		// (
		//     [0] => u.s
		//     [1] => u.s_presidential_elections
		//     [2] => world
		//     [3] => opinion
		//     [4] => economy
		//     [5] => personal_finance
		//     [6] => stock_market
		//     [7] => business_news
		//     [8] => comics_and_animation
		//     [9] => fashion_and_arts
		//     [10] => cricket
		//     [11] => motorsports
		//     [12] => extreme
		//     [13] => general_science
		//     [14] => web
		//     [15] => tech_opinon
		//     [16] => linux
		//     [17] => gaming
		//     [18] => mobile
		//     [19] => other_tech
		//     [20] => travel_and_places
		//     [21] => culture
		//     [22] => food_and_drink
		//     [23] => life_hacks
		//     [24] => men
		//     [25] => women
		//     [26] => animals
		// )
		
		
		$categories = $this->Category->findAll("NOT Category.parent_id = 0");
				
		$invalids = array();
		
		foreach($categories as $category){
			
			//debug($category['Category']['id']);
			
			ini_set('user_agent', 'My-Application/2.5');
			$uri = "http://services.digg.com/stories/topic/" . $category['Category']['category'] ."/popular?count=10&appkey=http%3A%2F%2Fsilverstripe.com&type=xml";	
			$xml = simplexml_load_file($uri);
			
			if(!$xml){
				array_push($invalids, strval($category['Category']['category']));
			}
			

			foreach($xml->story as $story){
					
						//debug($this->data);
			        	
						$this->data['Story']['title'] = strval($story->title);
						$this->data['Story']['description'] = strval($story->description);
						$this->data['Story']['link'] = strval($story['link']);
						
						$temp = null;
						
						if($story['media'] == "news"){
							$temp = "text";
							
						}
						elseif($story['media'] == "images"){
							
							$temp = "image";
						}
						else{
							
							$temp = "video";
						}
						$this->data['Story']['type'] = $temp;
						$this->data['Story']['category_id'] = $category['Category']['id'];
						$this->data['Story']['user_id'] = $this->Auth->user('id');
			        	$this->data['Story']['popular'] = 0;
						
						debug($this->data);
						debug($this->Story->save($this->data));
						$this->Story->create();
				}
		}
		
		debug($invalids);
	}
    
	function beforeFilter() {
        
        $this->Auth->autoRedirect = true;
        $this->Auth->loginRedirect = array('controller' => 'stories', 'action' => 'index');
        $this->Auth->logoutRedirect = '/';
        $this->Auth->loginError = 'Invalid username / password combination.  Please try again.';			
        $this->Auth->allow('view', 'index');
		$this->Auth->deny('submit');
		parent::beforeFilter();
	}
    

}

?>