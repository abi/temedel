
<?php echo $javascript->link('jquery.js'); 
 	  echo $javascript->link('comment.js');
 	  echo $javascript->link('prototype.js');
	?>

<?php //debug($comments); ?>


<?php echo $this->renderElement('story', array("story" => $story)); ?>

	
<h1>List of comments</h1> 

<?php

/*
	foreach ($comments as $comment){
	 	echo $this->renderElement('comment', array("indent" => "20", "comment" => $comment)); //, "votes" => $comment['Comment']['votes'], "body" => $comment['Comment']['body']));
	 	
	 	//TODO: why is there a need a pass comment variable
	 	//TODO: threading of comments
 	}
*/

?>


<?php 

	$commentList = $tree->get('Comment/id', $comments); 
	

	
	foreach ($commentList as $comment){
	 	echo $this->renderElement('comment', array("comment" => $comment)); //, "votes" => $comment['Comment']['votes'], "body" => $comment['Comment']['body']));
	 	
	 	//TODO: why is there a need a pass comment variable
 	}


	echo $idList;
	
 	//echo $form->create('Comment', array('action' => 'submit', 'id' => 'replyform' . $comment['id']));
	echo $ajax->form(array('action' => '/comments/submit'), 'post');
	echo $form->textarea('body', array('rows'=>'2', 'name' => 'data[Comment][body]'));
    echo $form->error('You can\'t submit an empty comment'); 
    echo $form->hidden('story_id', array('value' => $story['Story']['id'] , 'name' => 'data[Comment][story_id]'));
    echo $form->hidden('parent_id', array('value' => 0 , 'name' => 'data[Comment][parent_id]'));
	//echo $ajax->submit()
	echo $form->end('Submit');

?> 









