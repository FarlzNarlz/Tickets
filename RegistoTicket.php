<?php
include("validar.php");
include("ligaBD.php");
$Username=$_GET['Username'];
$datahora=strftime('%Y-%m-%dT%H:%M:%S', strtotime(date("Y-m-d H:i-1:00")));
$datalim=strftime('%Y-%m-%d', strtotime(date("Y-m-d ")));
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Criar Ticket</title>
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
    <a class="w3-hover-orange" href="#">Criar Ticket</a>
    <a class="w3-hover-orange" href="sair.php">Terminar sessão</a>
    <img src="Imgs/logo01_c.jpg" alt="Logo" style="width:100%;max-width:400px;">
</nav>
<div class="w3-main" style="margin-left:200px">
 <span class="w3-opennav w3-xlarge w3-hide-large" onclick="w3_open()">Menu</span>
<div id="wrapper">
<div id="header">
<header class="w3-container w3-orange">
<h1>Criar Ticket</h1>
</header>
</div>
<div id="content">
<div class="w3-responsive" align="center">
<form class="w3-container w3-section w3-orange" action="RegistarTicket.php" method="POST" style="width:100%;max-width:500px;">
<legend><br>Criar Ticket: </legend><BR>
<label class="w3-label w3-text-black">Nome de Utilizador:</label><input class="w3-input" type="text" name="User" size=20 value="<?php echo $Username; ?>" required readonly>
<label class="w3-label w3-text-black">Data/Hora:</label><input class="w3-input" type="datetime-local" name="Data/Hora" size=20 value="<?php echo $datahora; ?>" required readonly>
<label class="w3-label w3-text-black">Data Limite:</label><input class="w3-input" type="date" name="DataLim" size=20 min="<?php echo $datalim; ?>" value="<?php echo $datalim; ?>" required>
<label class="w3-label w3-text-black">Descrição do Problema:</label><textarea class="w3-input w3-responsive" style="width:100%;maxwidth:500px; height:150px;" name="Descr" required></textarea>
<BR>
<button class="w3-btn" type="submit"> Guardar </button>
<button class="w3-btn" type="reset"> Limpar </button>
<INPUT class="w3-btn" Type="button" VALUE="Voltar" onClick="location.href='inicio.php?Username=<?php echo $Username;?>';">
</form>
</div>
<div id="footer">
<footer class="w3-container w3-display-bottommiddle w3-orange">
#Magico 2016
</footer>
</div></div></div>
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