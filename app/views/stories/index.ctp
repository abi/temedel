<?php 


		//to carry url options for paginator
		echo $javascript->link('prototype.js');
		
   		$paginator->options(
            array('update'=>'CustomerPaging', 
                    'url'=>$this->params['pass'],
                    'model'=>'Customer', 
                    'indicator' => 'LoadingDiv'));


		echo "Good to see you, " . $User['User']['nick'];

 	    echo $html->css('home'); ?>

		<h1>Stories</h1>

		<?php foreach ($stories['data'] as $story): ?>


		<?php echo $this->renderElement('story', array("story" => $story)); ?>
	
	
		<?php endforeach; ?>


		<?php
		echo $paginator->prev('<< Previous ', null, null, array('class' => 'disabled'));
		echo $paginator->next(' Next >>', null, null, array('class' => 'disabled'));
		echo $paginator->counter(); 
		
		debug($stories);
		
?>
