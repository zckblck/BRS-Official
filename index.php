<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/brs/brs_login.php');
	//header('Location: '.$uri.'/DBS');
	exit;
?>
Something is wrong with the XAMPP installation :-(
