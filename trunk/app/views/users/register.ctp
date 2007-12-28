<h1>Registration</h1>

<?php 	
		echo $message;
		echo $form->create('User', array('action' => 'register'));
        echo $form->input('email');
        echo $form->input('password'); 
        echo $form->input('nick');
        echo $form->input('active');

		echo $recaptcha;
		echo $form->end('Register'); 
		
?>