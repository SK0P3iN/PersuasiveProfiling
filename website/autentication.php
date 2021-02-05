<?php
// session_start inicia a sessão
session_start();
// as variáveis email e pass recebem os dados introduzidos na pagina de login
$email = $_POST['email'];
$pw = $_POST['pass'];

// as próximas linhas são responsáveis em se ligar a base de dados
$conn = new mysqli("localhost", "root", "", "computacao_persuasiva");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// A variavel $result faz uma pesquisa a base de dados com o $email e $pw introduzidos
$sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$pw'";
$result = $conn->query($sql);

//Verifica se o utilizador e passe existe e coincidem, e se sim cria sessão e da acesso ao site, caso contrário volta a página de login
if($result->num_rows > 0)
{
    $row = $result->fetch_assoc();

    $_SESSION['fname'] = $row['firstname'];
    $_SESSION['lname'] = $row['lastname'];
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $row['id'];
    $_SESSION['carrinho'] = 0;
    header('location:index.php');
}
else{
    unset ($_SESSION['fname']);
    unset ($_SESSION['lname']);
    unset ($_SESSION['email']);
    unset ($_SESSION['id']);
    unset ($_SESSION['carrinho']);
    header('location:login.php?userError=1');
}
?>