<?
session_start();

$temp=$SESSION['user_in'];
$_SESSION['right_block_error']=0;
if($temp==25)
	$_SESSION['temp_right_block']=1;
	
$_SESSION['temp_content']=0;
header("location:index.php");
?>