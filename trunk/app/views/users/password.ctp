<?php
	echo $form->create('User', array('action' => 'password'));	
	
	echo $form->input('old_password', array('type' => 'password'));        
	echo $form->input('password', array('type' => 'password'));
	echo $form->input('re_type_password', array('type' => 'password'));

	echo $form->end('Submit');
?>