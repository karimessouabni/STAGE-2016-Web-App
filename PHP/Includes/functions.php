<?php
session_start();



function verifconected(){

	$a=$_SESSION['id'] ;
if (!($a) ) { header ("Location: ./../404.html"); }

}

?>
