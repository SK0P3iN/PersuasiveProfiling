<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #002c7f;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
        <i style="padding-right: 10px" class="fas fa-balance-scale-right"></i> 
        Computação Persuasiva
        <i style="padding-left: 10px" class="fas fa-balance-scale-left"></i> 
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav flex-row" style="padding-right: 20px">
        <li class="nav-item">
            <div style="padding-top: 6px; padding-right: 30px">
            <span style="font-size: 17px; padding: 7px" class="badge badge-pill bg-primary"><?php echo $_SESSION['carrinho']; ?>
            <i class="fas fa-shopping-cart"></i></span>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a style="font-weight: bold; color: #fff; padding-top: 10px" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['fname'], " " ,$_SESSION['lname'] ?>
                <i style="padding-left: 10px" class="fas fa-user-tie"></i> 
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="logout.php">Sair</a></li>
            </ul>
        </li>
      </ul>
  </div>
</nav>