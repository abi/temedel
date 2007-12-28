<h1>Submit a new story</h1>


<?php echo $form->create('Story', array('action' => 'submit')); ?>

   <?php
		//debug($categories);
        echo $form->input('title', array('type' => 'text'));        
        echo $form->input('description', array('rows'=>'3'));
        echo $form->input('link', array('type' => 'text'));   
        //echo $form->input('category_id');   
        echo $form->input('type', array('options' => array( array( 'text' => 'text'), array( 'image' => 'image'), array( 'video' => 'video'))));
  		foreach($categories as $supercategory){
			
			echo "<br/>";
			echo "<strong>" . $supercategory['Category']['category'] . "   : 	" . "</strong>" ;
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			
			foreach($supercategory['children'] as $subcategory){
				
				print_r($subcategory['Category']['category']);
				
				echo "<input type=\"radio\" name=\"data[Story][category_id]\" value=\"" . $subcategory['Category']['id'] . "\">"; 
				//echo $subcategory['Category']['category'] . "</input>" ;

			}
			
			echo "<br/>";
	
		}
			
		
    ?>
<?php echo $form->end('Submit'); ?>