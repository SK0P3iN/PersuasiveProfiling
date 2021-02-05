<!DOCTYPE html>
<html>
<head>
<title>Início</title>
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
if((!isset ($_SESSION['fname']) == true) and (!isset ($_SESSION['lname']) == true) and (!isset ($_SESSION['email']) == true))
{
  unset($_SESSION['fname']);
  unset($_SESSION['lname']);
  unset($_SESSION['email']);
  unset ($_SESSION['id']);
  unset ($_SESSION['carrinho']);
  header('location:login.php');
}

// Create connection
$conn = new mysqli("localhost", "root", "", "computacao_persuasiva");
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


</head>
<body>
<?php 
    include("navbar.php");
?>


<section class="p-4 d-flex justify-content-center mb-4" >
    <div class="col-sm-12 p-3 border">
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php   
            $sql = "SELECT * FROM produtos";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>
            <div class="col" style="padding: 0 20px 20px 20px;">
                <div class="card h-100">
                    <a href="produto.php?produto=<?php echo $row['id'];?>" style="color: inherit; text-decoration: inherit;" >
                    <div class="embed-responsive embed-responsive-1by1">
                    <div class="bg-image hover-overlay hover-zoom hover-shadow ripple">
                    <img
                        src="<?php echo $row["image_link"]; ?>"
                        class="card-img-top"
                        style="object-fit: cover; height: 220px;"
                        alt="..."
                    />
                    </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["titulo"]; ?></h5>
                        <p class="card-text">
                            <?php echo $row['descricao'] ?>
                        </p>
                        <hr>
                        <div class="price text-center" style="color: #002c7f">
                            <h3><?php echo $row["preco"]; ?> € </h3>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <h5><i class="fas fa-info-circle" ></i> Ver detalhes<h5>
                    </div>
                    </a>
                </div>
            </div>

            <?php
                }
            }
            else{
                echo "O results!";
            }
            ?>
        </div>
    </div>
</section>

<?php 
    include("footer.php");
?>
</body>
</html>