<!DOCTYPE html>
<html>
<head>
<title>Registar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" >
</head>
<body>

<!-- FORMULÁRIO DE LOGIN -->
<section class="p-4 d-flex justify-content-center mb-4" >

<form style="width: 22rem; margin-bottom: 7%" method="post" action="registration.php" id="formregist" name="formregist">

	<?php 	if(isset($_GET["userExiste"]))
				echo 	'<div class="alert alert-danger" role="alert">
							Essa conta já se encontra registada!
						</div>';
	?>

    <div>
        <h2 class="d-flex justify-content-center mb-4">Registar</h2>
    </div><hr>
    <br>
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <input type="text" class="form-control" name="name" id="name" placeholder="Primeiro nome">
            </div>
        </div>
        <div class="col">
            <div class="col form-outline">
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Último nome">
            </div>
        </div>
    </div>

    <div class="form-outline mb-4">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>
    
    <div class="form-outline mb-4">
        <input type="password" class="form-control" name="pass" id="pass" placeholder="Palavra-passe">
    </div>


    <!-- Submit button -->
    <button style="width: 100%" type="submit" class="btn btn-primary btn-block mb-4">Criar conta</button>

    <!-- Register buttons -->
    <div class="text-center">
        <p>Já é membro? <a href="login.php">Entre aqui</a></p>
    </div>

</form>
</section>
<?php 
    include("footer.php");
?>
</body>
</html>