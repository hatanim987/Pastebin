<?php


require_once('config.php');


function emailCheck(){
	global $email;
	global $connection;
	$id = mysqli_query($connection,"SELECT email FROM users WHERE email='$email'");

	if(mysqli_num_rows($id)>=1){
		return true;
	}
}






?>