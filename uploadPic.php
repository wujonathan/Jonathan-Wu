<?php
/*Uploads an iamge to the server after getting the file from the ajax request*/
header("Content-Type: application/json");
require 'database.php';
require 'user_agent_test.php';

//checks for name validity
$filename = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo ("Invalid filename");
	exit;
}
$full_path = sprintf("/home/wu.jonathan/public_html/CP/cp_pictures/%s", $filename);

//moves the file
if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
	echo json_encode(array(	     	        
	"success" => true
	));				
exit;
}else{
	echo json_encode(array(	     	        
	"success" => false
	));				
exit;
}
?>