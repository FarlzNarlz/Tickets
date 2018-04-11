<?php
include("validar.php");
$IDTicket=$_POST['IDTicket'];
$IDlinha=$_POST['IDlinhaTicket'];
$descr=$_POST['Descr'];
$user=$_POST['User'];
$data=$_POST['Data'];
if(!isset($_POST['Estado']) && !isset($_POST['Visivel']) && !isset($_POST['Tempogasto']) && !isset($_POST['Tempoacobrar'])) {
	$estado=1;
	$Visivel=1;
	$TempoG=0;
	$TempoA=0;
}else{
$estado=$_POST['Estado'];
$Visivel=$_POST['Visivel'];
$TempoG=$_POST['Tempogasto'];
$TempoA=$_POST['Tempocobrar'];
}
if(!isset($_POST['Comentario'])){
	$Comentario=NULL;
}else{
$Comentario=$_POST['Comentario'];
}
include("ligaBD.php");
$linhauser="select * from users where User='".$user."'";
$faz_linhauser=mysqli_query($ligaBD,$linhauser);
$IDuser=mysqli_fetch_array($faz_linhauser);
$insere_ticket="insert linhas_ticket values ('".$IDTicket."', '".$IDlinha."', '".$descr."', '".$IDuser['IDUser']."','".$data."', '".$TempoG."', '".$TempoA."', '".$Comentario."', '".$estado."', '".$Visivel."')";
$updatecabecalho="Update cabecalho_ticket set IDEstado='".$estado."' where IDTicket='".$IDTicket."'";
$faz_insere_ticket=mysqli_query($ligaBD, $insere_ticket) or die(mysqli_error($ligaBD));
$faz_update_cabecalho=mysqli_query($ligaBD, $updatecabecalho);
if ($faz_insere_ticket<>1){
	echo "Ocorreu um erro a adicionar a linha, por favor tente novamente!<br>";
}else{
echo "<p>A linha foi adicionada com sucesso!!!<br>";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registo</title>
<link href="w3.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div id="wrapper">
<div id="header">
<header class="w3-container w3-orange">
<h1>Registo</h1>
</header>
</div>
<div id="content">
<br><Input class='w3-btn' type='button' value='Página inicial' onclick="location.href='inicio.php?Username=<?php echo $user; ?>';"><br>
<?php
}
?>
<br>
<?php
if ($IDuser['CodCliente']=="#Magico"){
?>
<Input class="w3-btn" type="button" value="Voltar" onclick="location.href='EditaTicketTec.php?Username=<?php echo $user;?>&IDTicket=<?php echo $IDTicket;?>';"><br>
<?php
}else{
?>	
<Input class="w3-btn" type="button" value="Voltar" onclick="location.href='EditaTicketUser.php?Username=<?php echo $user;?>&IDTicket=<?php echo $IDTicket;?>';"><br>
<?php } ?>
</div>
<div id="footer">
<footer class="w3-container w3-responsive w3-display-bottommiddle w3-orange">
#Magico 2016
</footer>
</div></div>
</body>
</html>