<?php
include("ligaBD.php");
include("sitefunctions.php");
$user=$_POST["User"];
$password=$_POST["Password"];
$existe="select * from users where User = '".$user."' and Password = '".$password."';";
$faz_existe=mysqli_query($ligaBD, $existe);
$num_registos=mysqli_num_rows($faz_existe);
if($num_registos==1){
	$registos=mysqli_fetch_array($faz_existe);
	if($password==$registos["Password"]){
		Session_start();
		$_SESSION["User"]=$registos["Password"];
		if ($registos["CodCliente"]=="#Magico"){
			header('127.0.0.1/Tickets/inicio.php?Username='.$registos["User"].'');
		}else{
            movePage(301,'127.0.0.1/Tickets/inicio.php?Username='.$registos["User"].'');
		}
	}else{
        movePage(301,'127.0.0.1/Tickets/index.html');
	}
}else{
    movePage(301,'127.0.0.1/Tickets/Tickets/index.html');
}
?>
