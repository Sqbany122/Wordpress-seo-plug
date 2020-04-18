<?php 
	
	require_once('meta_class.php');
	require_once('redirect_class.php');

	$meta = new Meta();
	$meta->the_content_co_str();

	$redirect = new Redirect();
	$redirect->set_redirect();


?>