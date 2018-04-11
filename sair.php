<?php
Session_start();
unset($_SESSION["User"]);
header('Location:index.html');
?>