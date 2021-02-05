<!DOCTYPE html>
<html>
<head>
<title>Carrinho</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" >
<link rel="stylesheet" href="efeitos.css" type="text/css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<?php
/* verifica se existe a sessão iniciada*/
session_start();
$userID = $_SESSION['id'];
$tipo = $_GET['tipo'];
$idProduct = $_GET['produto'];
//incrementar valor do tipo e do total
// as próximas linhas são responsáveis em se ligar a base de dados
$conn = new mysqli("localhost", "root", "", "computacao_persuasiva");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_persuasive = "SELECT * FROM users WHERE id = '$userID'";
$result_persuasive = $conn->query($sql_persuasive);
$persuasive_tecnique = $result_persuasive->fetch_assoc();

$total = $persuasive_tecnique['total_clicks'] + 1;

if($tipo == 1):
    $principioIncrement = $persuasive_tecnique['reciprocidade'] + 1;
    $queryUpdate = "UPDATE users SET reciprocidade='$principioIncrement', total_clicks='$total' WHERE id = '$userID'";
elseif($tipo == 2):
    $principioIncrement = $persuasive_tecnique['autoridade'] + 1;
    $queryUpdate = "UPDATE users SET autoridade='$principioIncrement', total_clicks='$total' WHERE id = '$userID'";
elseif($tipo == 3):
    $principioIncrement = $persuasive_tecnique['consenso'] + 1;
    $queryUpdate = "UPDATE users SET consenso='$principioIncrement', total_clicks='$total' WHERE id = '$userID'";
else:
    $principioIncrement = $persuasive_tecnique['escassez'] + 1;
    $queryUpdate = "UPDATE users SET escassez='$principioIncrement', total_clicks='$total' WHERE id = '$userID'";
endif;


if ($conn->query($queryUpdate) === TRUE) {

    

    $_SESSION['carrinho'] +=1;
    //header('location:index.php');
} else {
    echo "Error: " . $queryUpdate . "<br>" . $conn->error;
}

//header('location:index.php');

?>
</head>
<body>
<?php 
    include("navbar.php");
?>
<section class="border p-4" style="text-align: center;" >
    <h3 class="mb-4" style="color: #0f5132">Produto adicionado ao carrinho com sucesso!</h3>
    <a href="produto.php?produto=<?php echo $idProduct; ?>" class="btn justify-content-center mb-4" style="background-color: #0f5132; color: white;"><i class="fas fa-check-circle" style="padding: 5px" ></i> OK</a>
</section>

<div class="progress" style="height: 50px;margin: 5% 10% 15% 10%;">
    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
</div>
<?php 
    include("footer.php");
?>
</body>
</html>