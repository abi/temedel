<h1>Edit your profile</h1>


<?php 
	
	
	//echo rand();
	
	echo $profile['Profile']['avatar_file'];
	echo "<br/>";
	echo $html->link('Change Avatar', '/profiles/change_avatar');
	
	echo $form->create('Profile', array('action' => 'edit')); ?>
		
   <?php
		
        echo $form->input('first_name', array('value' => $profile['Profile']['first_name']));        
        echo $form->input('last_name', array('value' => $profile['Profile']['last_name']));	
        echo $form->input('about', array('value' => $profile['Profile']['about']));        
        echo $form->input('mixx', array('value' => $profile['Profile']['mixx']));        
        echo $form->input('digg', array('value' => $profile['Profile']['digg']));        
        echo $form->input('website_label', array('value' => $profile['Profile']['website_label']));        
        echo $form->input('website_url', array('value' => $profile['Profile']['website_url']));        
    ?>
<?php echo $form->end('Update'); ?>

<?php
	debug($profile);
	
?>