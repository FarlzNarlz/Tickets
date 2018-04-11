<?php
include("validar.php");
include("ligaBD.php");
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
<?php
include("validar.php");
include("ligaBD.php");
$Username=$_POST['User'];
$datahora=$_POST['Data/Hora'];
$descr=$_POST['Descr'];
$datalim=$_POST['DataLim'];
$buscaID="Select IDUser from users where user='".$Username."'";
$listaID=mysqli_query($ligaBD, $buscaID);
$arrayID= mysqli_fetch_array($listaID);
$ID=$arrayID['IDUser'];
$pend="1";
$insere_ticket="insert cabecalho_ticket values(null,'".$ID."','".$descr."','".$pend."','".$datahora."','".$datalim."')";
$faz_insere_ticket=mysqli_query($ligaBD, $insere_ticket);
echo "<p>O Ticket foi guardado com sucesso!!!</font><br>";
?>
<br><Input class='w3-btn' type='button' value='Criar Novo Ticket' onclick="location.href='RegistoTicket.php?Username=<?php echo $Username; ?>';"><br>
<br><Input class='w3-btn' type='button' value='Página inicial' onclick="location.href='inicio.php?Username=<?php echo $Username; ?>';"><br>
<div id="footer">
<footer class="w3-container w3-display-bottommiddle w3-orange">
#Magico 2016
</footer>
</div></div></div>
</body>
</html>