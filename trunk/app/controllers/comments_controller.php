<?php

class CommentsController extends AppController
{
    var $name = 'Comments';
    
    function submit()
    {
		debug($this->data);
		
        if (!empty($this->data))
        {
			//echo($this->data);
			$this->data['Comment']['user_id'] = $this->Auth->user('id');
			
            if ($this->Comment->save($this->data))
            {
                  $this->flash('Your comment has been submitted','/view/', 2); //TODO link to the story pag  $this->Comment->storyId 
            }
        }
    }
    
    
}

?>