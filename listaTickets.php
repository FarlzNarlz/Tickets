<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ver Tickets</title>
<link href="w3.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div id="wrapper">
<div id="header">
<header class="w3-container w3-orange">
<h1>Ver Tickets</h1>
</header>
</div>
<div id="content">
<?php
include("validar.php");
include("ligaBD.php");
$Username=$_GET['Username'];
$buscainfuser="select * from Users where User='".$Username."'";
$fazinfuser=mysqli_query($ligaBD, $buscainfuser);
$infuser=mysqli_fetch_array($fazinfuser);
if ($infuser['CodCliente']=="#Magico"){
	$lista="select * from cabecalho_ticket";
	$faz_lista=mysqli_query($ligaBD,$lista);
	$num_registos=mysqli_num_rows($faz_lista);
	if($num_registos==0){
	echo "<p>Não existem Tickets Pendentes!!<BR>";
	}else{
	echo "<BR>Número total de Tickets: ".$num_registos;
	?>
	<BR><BR>
    <div class="w3-responsive">
    <table class="w3-table-all">
    <thead>
    <tr class="w3-orange">
	<td><b>Número de Ticket</b></td>
	<td><b>Nome de Utilizador</b></td>
	<td><b>Descrição</b></td>
	<td><b>Estado</b></td>
	<td><b>Data/Hora</b></td>
	<td><b>Data Limite</b></td>
	<td><b>Cliente</b></td>
	<td><b>Atualizar</b></td>
    </tr></thead>
	<?php
	for ($i=0;$i<$num_registos;$i++){
	$registos=mysqli_fetch_array($faz_lista);
	$buscaestado="select * from Estado where IDEstado='".$registos['IDEstado']."'";
	$listaestado=mysqli_query($ligaBD, $buscaestado);
	$arrayestado= mysqli_fetch_array($listaestado);
	$buscainfuser="select * from Users where IDUser='".$registos['IDUser']."'";
	$fazinfuser=mysqli_query($ligaBD, $buscainfuser);
	$infuser=mysqli_fetch_array($fazinfuser);
	$cliente="select * from Clientes where CodCliente='".$infuser['CodCliente']."'";
	$fazcliente=mysqli_query($ligaBD, $cliente);
	$arraycliente=mysqli_fetch_array($fazcliente);
	echo "<tbody><tr>";
	echo '<td>'.$registos['IDTicket'].'</td>';
	echo '<td>'.$infuser['Nome'].'</td>';
	echo '<td>'.$registos['Descr'].'</td>';
	echo '<td>'.$arrayestado['Estado'].'</td>';
	echo '<td>'.$registos['Data/Hora'].'</td>';
	echo '<td>'.$registos['Data Limite'].'</td>';
	echo '<td>'.$arraycliente['Nome'].'</td>';
	?>
    <td><Input class="w3-btn" type="button" VALUE="Atualizar" onClick="location.href='EditaTicketTec.php?Username=<?php echo $Username;?>&IDTicket=<?php echo $registos['IDTicket'];?>';"></td>
    <?php
	}
	?>
	</tr></tbody>
	</table>
    </div>
	<br><br>
	<?php
	}
}else{
	$lista="select * from cabecalho_ticket where IDUser='".$infuser['IDUser']."'";
	$faz_lista=mysqli_query($ligaBD,$lista);
	$num_registos=mysqli_num_rows($faz_lista);
	if($num_registos==0){
	echo "<p>Não existem Tickets Pendentes!!<BR>";
	}else{
	echo "<BR>Número total de Tickets: ".$num_registos;
	?>
	<BR><BR>
    <div class="w3-responsive">
    <table class="w3-table-all">
    <thead>
    <tr class="w3-orange">
	<td><b>Número de Ticket</b></td>
	<td><b>Nome de Utilizador</b></td>
	<td><b>Descrição</b></td>
	<td><b>Estado</b></td>
	<td><b>Data/Hora</b></td>
	<td><b>Data Limite</b></td>
	<td><b>Cliente</b></td>
	<td><b>Atualizar</b></td>
    </tr></thead>
	<?php
	for ($i=0;$i<$num_registos;$i++){
	$registos=mysqli_fetch_array($faz_lista);
	$buscaestado="select * from Estado where IDEstado='".$registos['IDEstado']."'";
	$listaestado=mysqli_query($ligaBD, $buscaestado);
	$arrayestado= mysqli_fetch_array($listaestado);
	$buscainfuser="select * from Users where IDUser='".$registos['IDUser']."'";
	$fazinfuser=mysqli_query($ligaBD, $buscainfuser);
	$infuser=mysqli_fetch_array($fazinfuser);
	$cliente="select * from Clientes where CodCliente='".$infuser['CodCliente']."'";
	$fazcliente=mysqli_query($ligaBD, $cliente);
	$arraycliente=mysqli_fetch_array($fazcliente);
	echo "<tbody><tr>";
	echo '<td>'.$registos['IDTicket'].'</td>';
	echo '<td>'.$infuser['Nome'].'</td>';
	echo '<td>'.$registos['Descr'].'</td>';
	echo '<td>'.$arrayestado['Estado'].'</td>';
	echo '<td>'.$registos['Data/Hora'].'</td>';
	echo '<td>'.$registos['Data Limite'].'</td>';
	echo '<td>'.$arraycliente['Nome'].'</td>';
	?>
    <td><Input class="w3-btn" type="button" VALUE="Atualizar" onClick="location.href='EditaTicketUser.php?Username=<?php echo $Username;?>&IDTicket=<?php echo $registos['IDTicket'];?>';"></td>
    <?php
	}
	?>
	</tr></tbody>
	</table>
    </div>
	<br><br>
<?php 
} 
}
?>
<div id="footer">
<footer class="w3-container w3-display-bottommiddle w3-orange">
#Magico 2016
</footer>
</div></div></div>
</body>
</html>