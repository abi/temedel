<?php 

 	echo $javascript->link('prototype.js');
	
	echo $ajax->form(array('action' => '/messages/send'), 'post', array('update' => 'updateel'));
	echo $form->textarea('message', array('rows'=>'2', 'name' => 'data[Message][message]'));
    echo $form->error('You can\'t submit an empty message'); 
    echo $form->hidden('recipient_id', array('value' => '13' , 'name' => 'data[Message][recipient_id]'));
	echo $form->end('Submit');

	echo "<div id='updateel'></div>";


?>





