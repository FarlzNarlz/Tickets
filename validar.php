<?php
Session_start();
if(!isset($_SESSION['User'])){
echo "Página reservada a utilizadores registados!!!";
exit;
}
?>