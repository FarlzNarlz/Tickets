<?php
include("validar.php");
include("ligaBD.php");
$Username=$_GET['Username'];
$datahora=strftime('%Y-%m-%dT%H:%M:%S', strtotime(date("Y-m-d H:i-1:00")));
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Actualizar Tickets</title>
<link href="w3.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="w3-sidenav w3-collapse w3-white" style="width:200px; z-index: 2; display:none;">
  <div class="w3-container w3-black">
    <h4>Menu</h4>
  </div>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-closenav w3-hide-large">Fechar &times;</a> 
    <a class="w3-orange" href="inicio.php?Username=<?php echo $Username;?>">Página inicial</a>
    <a class="w3-hover-orange" href="RegistoTicket.php?Username=<?php echo $Username;?>">Criar Ticket</a>
    <a class="w3-hover-orange" href="sair.php">Terminar sessão</a>
    <img src="Imgs/logo01_c.jpg" alt="Logo" style="width:100%;max-width:400px;">
</nav>
<div class="w3-main" style="margin-left:200px">
 <span class="w3-opennav w3-xlarge w3-hide-large" onclick="w3_open()">Menu</span>
<div id="wrapper">
<div id="header">
<header class="w3-container w3-orange">
<h1>Actualizar Ticket</h1>
</header>
</div>
<div id="content">
<BR><BR>
<div class="w3-responsive">
<table class="w3-table-all">
<thead>
<tr class="w3-orange">
<th><b>Utilizador</b></th>
<th><b>Descrição</b></th>
<th><b>Estado</b></th>
<th><b>Data/Hora</b></th>
<th><b>Data Limite</b></th>
<th><b>Cliente</b></th>
</tr>
</thead>
<?php
$IDTicket=$_GET['IDTicket'];
$lista="select * from cabecalho_ticket where IDTicket='".$IDTicket."'";
$faz_lista=mysqli_query($ligaBD,$lista);
$num_registos=mysqli_num_rows($faz_lista);
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
echo '<td>'.$infuser['Nome'].'</td>';
echo '<td>'.$registos['Descr'].'</td>';
echo '<td>'.$arrayestado['Estado'].'</td>';
echo '<td>'.$registos['Data/Hora'].'</td>';
echo '<td>'.$registos['Data Limite'].'</td>';
echo '<td>'.$arraycliente['Nome'].'</td>';
echo '</tr></tbody>';
}
?>
</table>
</div>
<?php
$listalinha="select * from linhas_ticket where IDTicket=".$IDTicket;
$faz_listalinha=mysqli_query($ligaBD,$listalinha);
$num_registoslinha=mysqli_num_rows($faz_listalinha);
if ($num_registoslinha==0){
echo "<br><p class='w3-text'>Não existem linhas</p>";
?>
<div class="w3-responsive" align="center">
<form class="w3-container w3-section w3-orange" action="Registalinha.php" method="POST" style="width:100%;max-width:500px;">
<legend><br>Adicionar linha: </legend><BR>
<input type="text" name="IDTicket" size="20" value="<?php echo $registos['IDTicket']; ?>" hidden="true" required readonly>
<input type="text" name="IDlinhaTicket" size="20" value="1" hidden="true" required readonly>
<label class="w3-label w3-text-black">Descrição do Problema:</label><textarea class="w3-input w3-responsive" style="width:100%;maxwidth:500px; height:150px;" name="Descr" required></textarea>
<label class="w3-label w3-text-black">Utilizador/Técnico:</label><input class="w3-input" type="text" name="User" size="20" value="<?php echo $Username; ?>" required readonly>
<label class="w3-labe w3-text-blackl">Data/hora:</label><input class="w3-input" type="datetime-local" name="Data" size=20 value="<?php echo $datahora; ?>" required readonly>
<label class="w3-label w3-text-black">Tempo Gasto:</label><input class="w3-input" type="text" name="Tempogasto" size="20" required>
<label class="w3-label w3-text-black">Tempo a Cobrar:</label><input class="w3-input" type="text" name="Tempocobrar" size="20" required>
<label class="w3-label w3-text-black">Comentário:</label><input class="w3-input" type="text" name="Comentario" size="20">
<label class="w3-label w3-text-black">Estado:</label><select class="w3-select" name="Estado">
  <option value="1">Pendente</option>
  <option value="2">Em resolução</option>
  <option value="3">Concluído</option>
</select><br>
<label class="w3-label w3-text-black">Visivel:</label><select class="w3-select" name="Visivel">
  <option value="0">Não Visivel</option>
  <option value="1">Visivel</option>
</select>
<BR><br>
<INPUT class="w3-btn" type="button" value="Voltar" onClick="location.href='inicio.php?Username=<?php echo $Username;?>';">
<button class="w3-btn" type="submit"> Guardar </button>
</form>
</div>
<?php
}else{
?>
<br>
<div class="w3-responsive">
<table class="w3-table-all">
<thead>
<tr class="w3-orange">
<th><b>Utilizador</b></th>
<th><b>Descrição</b></th>
<th><b>Data/hora</b></th>
<th><b>Tempo Gasto</b></th>
<th><b>Tempo a Cobrar</b></th>
<th><b>Comentário</b></th>
<th><b>Estado</b></th>
<th><b>Visivel</b></th>
</tr>
</thead>
<?php
for ($i=0;$i<$num_registoslinha;$i++){
$registoslinha=mysqli_fetch_array($faz_listalinha);
	$novalinha=$registoslinha['IDlinhaTicket']+1;
$buscaestadolinha="select * from estado where IDEstado='".$registoslinha['IDEstado']."'";
$listaestadolinha=mysqli_query($ligaBD, $buscaestadolinha);
$arrayestadolinha= mysqli_fetch_array($listaestadolinha);
$buscainfuser="select * from users where IDUser='".$registoslinha['IDUser']."'";
$fazinfuser=mysqli_query($ligaBD, $buscainfuser);
$infuser=mysqli_fetch_array($fazinfuser);
if($registoslinha['Visivel']==1){
	$Visivel="Sim";
}else{
	$Visivel="Não";
}
echo "<tbody><tr>";
echo "<tr>";
echo '<td>'.$infuser['Nome'].'</td>';
echo '<td>'.$registoslinha['Descr'].'</td>';
echo '<td>'.$registoslinha['Data/Hora'].'</td>';
echo '<td>'.$registoslinha['Tempo Gasto'].'</td>';
echo '<td>'.$registoslinha['Tempo a cobrar'].'</td>';
echo '<td>'.$registoslinha['Comentario'].'</td>';
echo '<td>'.$arrayestadolinha['Estado'].'</td>';
echo '<td>'.$Visivel.'</td>';
echo '</tr></tbody>';
}
?>
</table>
</div>
<div class="w3-responsive" align="center">
<form class="w3-container w3-section w3-orange" action="Registalinha.php" method="POST" style="width:100%;max-width:500px;">
<legend><br>Adicionar linha: </legend><BR>
<input type="text" name="IDTicket" size="20" value="<?php echo $registos['IDTicket']; ?>" hidden="true" required readonly>
<input type="text" name="IDlinhaTicket" size="20" value="<?php echo $novalinha; ?>" hidden="true" required readonly>
<label class="w3-label w3-text-black">Descrição do Problema:</label><textarea class="w3-input w3-responsive" style="width:100%;maxwidth:500px; height:150px;" name="Descr" required></textarea>
<label class="w3-label w3-text-black">Utilizador/Técnico:</label><input class="w3-input" type="text" name="User" size="20" value="<?php echo $Username; ?>" required readonly>
<label class="w3-labe w3-text-blackl">Data/hora:</label><input class="w3-input" type="datetime-local" name="Data" size=20 value="<?php echo $datahora; ?>" required readonly>
<label class="w3-label w3-text-black">Tempo Gasto:</label><input class="w3-input" type="text" name="Tempogasto" size="20" required>
<label class="w3-label w3-text-black">Tempo a Cobrar:</label><input class="w3-input" type="text" name="Tempocobrar" size="20" required>
<label class="w3-label w3-text-black">Comentário:</label><input class="w3-input" type="text" name="Comentario" size="20">
<label class="w3-label w3-text-black">Estado:</label><select class="w3-select" name="Estado">
  <option value="1">Pendente</option>
  <option value="2">Em resolução</option>
  <option value="3">Concluído</option>
</select><br>
<label class="w3-label w3-text-black">Visivel:</label><select class="w3-select" name="Visivel">
  <option value="0">Não Visivel</option>
  <option value="1">Visivel</option>
</select>
<BR><br>
<INPUT class="w3-btn" type="button" value="Voltar" onClick="location.href='inicio.php?Username=<?php echo $Username;?>';">
<button class="w3-btn" type="submit"> Guardar </button>
</form>
</div>
<?php } ?>
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