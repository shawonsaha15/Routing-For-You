<?php 

	$conn = new mysqli('localhost','root','','final');
	if(!$conn){
		echo('Not Connected');
	}
?>