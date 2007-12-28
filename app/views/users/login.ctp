<h1>Login</h1>

<?php echo $form->create('User', array('action' => 'login')); ?>

   <?php
        echo $form->input('email');   //text
        echo $form->input('password');   //text
        //echo $form->input('remember_me');   //text
    ?>
<?php echo $form->end('Login'); ?>