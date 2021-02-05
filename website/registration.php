<?php
// session_start inicia a sessão
session_start();
// as variáveis email e pass recebem os dados introduzidos na pagina de login
$email = $_POST['email'];
$pw = $_POST['pass'];
$lastname = $_POST['lastname'];
$name = $_POST['name'];
// as próximas linhas são responsáveis em se ligar a base de dados
$conn = new mysqli("localhost", "root", "", "computacao_persuasiva");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// A variavel $result faz uma pesquisa a base de dados com o $email introduzido
$sql = "SELECT email FROM users WHERE email = '$email'";
$result = $conn->query($sql);

//Verifica se o utilizador existe, e se nao, regista o utilizador, cria sessão e da acesso ao site, caso contrário volta a página de login
if($result->num_rows < 1)
{
    $queryInsert = "INSERT INTO users (firstname, lastname, email, pass) VALUES ('$name', '$lastname', '$email', '$pw')";
    if ($conn->query($queryInsert) === TRUE) {
        $_SESSION['fname'] = $name;
        $_SESSION['lname'] = $lastname;
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $conn->insert_id;
        $_SESSION['carrinho'] = 0;
        header('location:index.php?userNovo=1');
    } else {
        echo "Error: " . $queryInsert . "<br>" . $conn->error;
    }
}
else{
    unset ($_SESSION['fname']);
    unset ($_SESSION['lname']);
    unset ($_SESSION['email']);
    unset ($_SESSION['id']);
    unset ($_SESSION['carrinho']);
    header('location:register.php?userExiste=1');
}

$conn->close();
?>