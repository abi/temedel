<br/>
<br/>
<?php


	//debug($message);

	echo $html->image('avatar'); //fill with avatar field
	
	echo "<br/>";
	
	if($sent){
		echo $html->link( "To: " . $message['Recipient']['nick'], '/users/view/'. $message['Recipient']['nick']);
	}
	else{
		echo $html->link($message['Sender']['nick'], '/users/view/'. $message['Sender']['nick']);
	}
	
	echo "<br/>";
	
	echo $time->timeAgoInWords($message['Message']['created']);
	
	echo "<br/>";
	
	echo $message['Message']['message'];
	
	echo "<br/>";
	
	if(!$sent){
		//echo "Reply";	
		echo $html->link("Reply", '#', array('onclick' => "$('recipient_id').value = " . $message['Sender']['id'] . "; Lightbox.showBoxByID('send_message_box', 350, 300);return false;"));
	//	<a href="#" onClick="$('recipient_id').value = 14; Lightbox.showBoxByID('send_message_box', 350, 300);return false;">Local element</a>		
	}
	
?>
<br/>
<br/>