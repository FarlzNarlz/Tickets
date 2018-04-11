<?php
//include("validar.php");
include("ligaBD.php");
$Username=$_GET['Username'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" href="Imgs/icon.ico" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="w3.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="w3-sidenav w3-collapse w3-white" style="width:200px; z-index: 2; display:none;">
  <div class="w3-container w3-black">
    <h4>Menu</h4>
  </div>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-closenav w3-hide-large">Fechar &times;</a>
    <a class="w3-hover-orange" href="RegistoTicket.php?Username=<?php echo $Username;?>">Criar Ticket</a>
    <a class="w3-hover-orange" href="sair.php">Terminar sessão</a>
    <img src="Imgs/logo01_c.jpg" alt="Logo" style="width:100%;max-width:400px;">
</nav>
<div class="w3-main" style="margin-left:200px">
<span class="w3-opennav w3-xlarge w3-hide-large" onclick="w3_open()">Menu</span>
<div id="wrapper">
<div id="header">
<header class="w3-container w3-orange">
<h1>Ver Tickets</h1>
</header>
</div>
<div id="content">
<?php
$buscainfuser="select * from users where User='".$Username."'";
$fazinfuser=mysqli_query($ligaBD, $buscainfuser);
$infuser=mysqli_fetch_array($fazinfuser);
if (!$infuser){
	echo mysqli_error($ligaBD);
}
echo "<h2>Bem-Vindo ".$infuser['Nome']."</h2>";
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
	<td><b> </b></td>
    </tr></thead>
	<?php
	for ($i=0;$i<$num_registos;$i++){
	$registos=mysqli_fetch_array($faz_lista);
	$buscaestado="select * from estado where IDEstado='".$registos['IDEstado']."'";
	$listaestado=mysqli_query($ligaBD, $buscaestado);
	$arrayestado= mysqli_fetch_array($listaestado);
	$buscainfuser="select * from users where IDUser='".$registos['IDUser']."'";
	$fazinfuser=mysqli_query($ligaBD, $buscainfuser);
	$infuser=mysqli_fetch_array($fazinfuser);
	$cliente="select * from clientes where CodCliente='".$infuser['CodCliente']."'";
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
    <td><Input class="w3-btn" type="button" VALUE="Ver mais" onClick="location.href='EditaTicketTec.php?Username=<?php echo $Username;?>&IDTicket=<?php echo $registos['IDTicket'];?>';"></td>
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
	<td><b> </b></td>
    </tr></thead>
	<?php
	for ($i=0;$i<$num_registos;$i++){
	$registos=mysqli_fetch_array($faz_lista);
	$buscaestado="select * from estado where IDEstado='".$registos['IDEstado']."'";
	$listaestado=mysqli_query($ligaBD, $buscaestado);
	$arrayestado= mysqli_fetch_array($listaestado);
	$buscainfuser="select * from users where IDUser='".$registos['IDUser']."'";
	$fazinfuser=mysqli_query($ligaBD, $buscainfuser);
	$infuser=mysqli_fetch_array($fazinfuser);
	$cliente="select * from clientes where CodCliente='".$infuser['CodCliente']."'";
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
    <td><Input class="w3-btn" type="button" VALUE="Ver mais" onClick="location.href='EditaTicketUser.php?Username=<?php echo $Username;?>&IDTicket=<?php echo $registos['IDTicket'];?>';"></td>
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
</div>
<div id="footer">
<footer class="w3-container w3-responsive w3-display-bottommiddle w3-orange">
#Magico 2016
</footer>
</div></div>
<script>
function w3_open() {
  document.getElementsByClassName("w3-sidenav")[0].style.display = "block";
}
function w3_close() {
  document.getElementsByClassName("w3-sidenav")[0].style.display = "none";
}
</script>
</body>
</html>
