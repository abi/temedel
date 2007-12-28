
<?php
	
	//debug($friends);
	
	foreach($friends as $friend){
		debug($friend);
		
		$this->renderElement('friend_small', array("friend" => $friend['User']));
		
	}

?>