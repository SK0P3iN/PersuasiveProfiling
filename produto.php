<?php

/* verifica se existe a sessão iniciada*/
session_start();
if((!isset ($_SESSION['fname']) == true) and (!isset ($_SESSION['lname']) == true) and (!isset ($_SESSION['email']) == true))
{
  unset($_SESSION['fname']);
  unset($_SESSION['lname']);
  unset($_SESSION['email']);
  unset ($_SESSION['id']);
  unset ($_SESSION['carrinho']);
  header('location:login.php');
}
$userID = $_SESSION['id'];
$idProduct = $_GET['produto'];

// Create connection
$conn = new mysqli("localhost", "root", "", "computacao_persuasiva");
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM produtos WHERE id = '$idProduct'";
$result = $conn->query($sql);
            
if ($result->num_rows < 1) 
    header('location:index.php');

$row = $result->fetch_assoc();


//#ALGORITMO DE PERSONALIZAÇÃO
$random = rand(1,100);

$sql_persuasive = "SELECT * FROM users WHERE id = '$userID'";
$result_persuasive = $conn->query($sql_persuasive);
$persuasive_tecnique = $result_persuasive->fetch_assoc();

if($persuasive_tecnique['total_clicks'] == 0)
	$persuasive_tecnique['total_clicks'] = 4;

$probTecnique1 = ($persuasive_tecnique['reciprocidade']/$persuasive_tecnique['total_clicks'])*100;
$probTecnique2 = ($persuasive_tecnique['autoridade']/$persuasive_tecnique['total_clicks'])*100 + $probTecnique1;
$probTecnique3 = ($persuasive_tecnique['consenso']/$persuasive_tecnique['total_clicks'])*100 + $probTecnique2;
$probTecnique4 = ($persuasive_tecnique['escassez']/$persuasive_tecnique['total_clicks'])*100 + $probTecnique3;

if($random <= $probTecnique1):
    $tipo = 1;
elseif($random <= $probTecnique2):
    $tipo = 2;
elseif($random <= $probTecnique3):
    $tipo = 3;
else:
    $tipo = 4;
endif;

$sql_messages = "SELECT * FROM mensagens WHERE produto_id = '$idProduct' AND msg_tipo = '$tipo'";
$result_messages = $conn->query($sql_messages);
$row_cnt = $result_messages->num_rows;
$random2 = rand(0,$row_cnt-1);
$persuasive_messages = $result_messages->fetch_all(MYSQLI_ASSOC);
if($row_cnt > 0):
    $mensagemPersuasiva = $persuasive_messages[$random2]['msg'];
else:
    $mensagemPersuasiva = "";
endif;

?>

<!DOCTYPE html>
<html lang ="PT">
<head>
<title><?php echo $row['titulo']; ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" >

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<meta charset="UTF-8" />
</head>
<body>
<?php 
    include("navbar.php");
?>
<section class="p-4 d-flex justify-content-left">
    <a href="index.php" class="btn" style="background-color: #002c7f; color: white;"><i class="fas fa-chevron-circle-left" style="padding: 5px" ></i> Voltar atrás</a>
</section>
<section class="p-4 d-flex justify-content-center" >
<div class="card" style="max-width: 100%">
  <div class="row g-0">
    <div class="col-sm-8">
    <img
                src="<?php echo $row["image_link"]; ?>"
                class="card-img-top"
                alt="..."
            />
    </div>
    <div class="col-sm-4">
      <div class="card-body" >
        <h3 class="card-title"><?php echo $row['titulo'] ?></h3>
        <hr>
        <div style="font-weight: bold;color: #002c7f;padding-bottom: 30px; font-variant-caps: small-caps;">
            <h5><?php echo $mensagemPersuasiva; ?></h5>
        </div>
        <p class="card-text"><?php echo $row['descricao'] ?></p>
      </div>
      <div style="display: flex;align-items: flex-end; justify-content: space-evenly; padding: 20px">
            <h4><?php echo $row['preco'] ?> € </h4>
      </div>
      <div style="display: flex;align-items: flex-end; justify-content: space-evenly; padding: 20px">
        <a href="addcart.php?tipo=<?php echo $tipo;?>&produto=<?php echo $idProduct; ?>" class="btn" style="background-color: #002c7f; color: white;"><i class="fas fa-cart-plus" style="padding: 5px" ></i> Adicionar ao carrinho</a>
      </div>
    </div>
  </div>
</div>
</section>
<?php 
    include("footer.php");
?>
</body>
</html>