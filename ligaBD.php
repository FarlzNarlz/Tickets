<?php
$ligaBD=mysqli_connect('localhost','root', '123', '#magico');
if(!$ligaBD){
  echo "Erro: Não foi possível estabelecer ligação com o MySQL ". mysqli_connect_error();
}else{
  $escolheBD=mysqli_select_db($ligaBD,'#magico');
}
if(!$escolheBD){
  echo "Erro: Erro ao aceder à base de dados";
}
?>
