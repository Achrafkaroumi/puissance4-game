<?php 
session_start(); 
if(!isset($_SESSION['login1']) && !isset($_SESSION['login2'])){
  header('Location:authentification.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <link href="css/all.min.css" rel="stylesheet"/>
	  <link href="css/fontawesome.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <title>Menu</title>
</head>
<body>
    <nav>
        <b><span class="navbar-brand" ><img src="img/logo-puissance.png"/></i> Puissance 4 </span></b>
          <ul>  
              <li>
                <a href="deconnect.php" ><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;<b>Quitter</b></a>
              </li>
          </ul>
    </nav>
</body>
</html>