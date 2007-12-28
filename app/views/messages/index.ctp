<?php 

//AJAX pagination (??)
//need to seperate content from layout

		echo $javascript->link(array('prototype','mf_lightbox'));
		echo $html->css('lightbox');
		//shouldn't be hardedcoded image locations
		$paginator->options(
            array('update'=>'content', 
                    'url'=>$this->params['pass'],
                    'model'=>'Message', 
                    'indicator' => 'spinner'));
?>


	<script language="javascript">
		Event.observe(window, 'load', init, false);
		
		function init() {
			Lightbox.init();
		}
	</script>
	
    	<div id="spinner" style="display: none; float: right;">
            <?php echo $html->image('spinner.gif'); ?>
    	</div>

		<div id="content">
		<h1>Messages</h1>

		<?php foreach ($messages['data'] as $message): ?>


		<?php echo $this->renderElement('message', array("message" => $message , "sent" => $sent)); ?>
	
	
		<?php endforeach; ?>
		
		<?php
		echo $paginator->prev('<< Previous ', null, null, array('class' => 'disabled'));
		echo $paginator->next(' Next >>', null, null, array('class' => 'disabled'));
		echo $paginator->counter(); 
	
		echo $this->renderElement('send_message_box', array("message" => $message , "sent" => $sent));
?>
		</div>
		
		


