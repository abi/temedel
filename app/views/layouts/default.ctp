<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>


<body>
 
<!-- If you'd like some sort of menu to
show up on all of your views, include it here -->
<div id="header">
    <div id="menu">
	<?php
	
	if($loggedIn){
		echo $html->link('logout','/users/logout'). " | ";
		echo $html->link('edit profile','/profiles/edit');
	}
	else{
		echo $html->link('login','/users/logout') . " | ";
		echo $html->link('register','/users/register');
	}

	?>	
	</div>
</div>
 
<!-- Here's where I want my views to be displayed -->
<?php echo $content_for_layout ?>
 
<!-- Add a footer to each displayed page -->
<div id="footer">...</div>
 
</body>


</html>