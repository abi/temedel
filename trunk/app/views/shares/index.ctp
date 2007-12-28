<div id="share_box" style="display:">

<?php
	echo $javascript->link(array('prototype'));
	
	echo $ajax->form(array('action' => '/shares/index'), 'post', array('update' => 'updateEl'));
	
	echo $form->textarea('Friends', array('rows'=>'3', 'name' => 'data[friend]'));
	echo $form->textarea('Email Addresses', array('rows'=>'3', 'name' => 'data[email]'));

	echo $form->hidden('story_id', array( 'name' => 'data[Share][story_id]' , 'id' => 'share_story_id'));
	
	echo $form->end('Submit');
	
	
	echo "<div id='updateEl'></div>";
	

?>

</div>