<h1>Change your avatar</h1>


<?php 
	
	echo $error;
	echo $avatar_file;

	echo $form->create('Profile', array('action' => 'change_avatar', 'type' => 'file')); 
	echo $form->file('avatar_file');    
 	echo $form->end('Submit'); 

?>
