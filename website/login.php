<!DOCTYPE html>
<html>
<head>
<title>Entrar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" >
</head>
<body>

<!-- FORMULÁRIO DE LOGIN -->
<section class="p-4 d-flex justify-content-center mb-4" >

<form style="width: 22rem; margin-bottom: 10%" method="post" action="autentication.php" id="formlogin" name="formlogin">

	<?php 	
			if(isset($_GET["userError"]))
				echo 	'<div class="alert alert-danger" role="alert">
							Os dados introduzidos não estão corretos ou não se encontram registados!
						</div>';
	?>

    <div>
        <h2 class="d-flex justify-content-center mb-4">Entrar</h2>
    </div><hr>
    <br>
    <div class="form-outline mb-4">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>
    
    <div class="form-outline mb-4">
        <input type="password" class="form-control" name="pass" id="pass" placeholder="Palavra-passe">
    </div>


    <!-- Submit button -->
    <button style="width: 100%" type="submit" class="btn btn-primary btn-block mb-4">Entrar</button>

    <!-- Register buttons -->
    <div class="text-center">
        <p>Ainda não é membro? <a href="register.php">Registe-se agora</a></p>
    </div>

</form>
</section>
<?php 
    include("footer.php");
?>
</body>
</html>