<?php
// session_start inicia a sessão
session_start();

unset ($_SESSION['fname']);
unset ($_SESSION['lname']);
unset ($_SESSION['email']);
unset ($_SESSION['id']);
unset ($_SESSION['carrinho']);
header('location:login.php');

?>