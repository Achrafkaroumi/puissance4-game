<?php 
    require_once "bd.php";
    try{
        if(isset($_GET['btnE'])){
            $user=$_GET['user'];
            $email=$_GET['mail'];
            $ville=$_GET['ville'];
            $psw=$_GET['psw'];
            if(!empty($user) && !empty($email) && !empty($ville) && !empty($psw) ){
                $sql="insert into user values (' ','$user','$email','$ville','$psw')";
                $connect->exec($sql);
                header('Location:authentification.php');
            }else{
                header('Location:inscription.php');          
             }
        }
    }catch(PDOException $e){
        $e->getMessage();
    }
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"rel="stylesheet" />
    <link rel="stylesheet" href="css/insciption.css"/>
    <link rel="icon" href="img/logo-puissance.png" />
    <title>Inscription</title>
</head>
<body>
    <section class="container">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,320L15,304C30,288,60,256,90,240C120,224,150,224,180,218.7C210,213,240,203,270,192C300,181,330,171,360,138.7C390,107,420,53,450,48C480,43,510,85,540,96C570,107,600,85,630,69.3C660,53,690,43,720,42.7C750,43,780,53,810,96C840,139,870,213,900,224C930,235,960,181,990,154.7C1020,128,1050,128,1080,117.3C1110,107,1140,85,1170,80C1200,75,1230,85,1260,112C1290,139,1320,181,1350,208C1380,235,1410,245,1425,250.7L1440,256L1440,0L1425,0C1410,0,1380,0,1350,0C1320,0,1290,0,1260,0C1230,0,1200,0,1170,0C1140,0,1110,0,1080,0C1050,0,1020,0,990,0C960,0,930,0,900,0C870,0,840,0,810,0C780,0,750,0,720,0C690,0,660,0,630,0C600,0,570,0,540,0C510,0,480,0,450,0C420,0,390,0,360,0C330,0,300,0,270,0C240,0,210,0,180,0C150,0,120,0,90,0C60,0,30,0,15,0L0,0Z"></path></svg>
            <div class="players">
                <h2>Puissance 4</h2>
                <div class="inscription">
                    <h1>Inscription</h1>
                    <form action="inscription.php" method="GET">
                        <div class="input-group">
                            <i class="bx bxs-user"></i>
                            <input type="text" placeholder="Username" name="user" required/>
                        </div>
                        <div class="input-group">
                            <i class='bx bx-mail-send'></i>
                            <input type="email" placeholder="Email" name="mail" required/>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-city'></i>
                            <input type="text" placeholder="Ville" name="ville" required/>
                        </div>
                        <div class="input-group">
                            <i class="bx bxs-lock-alt"></i>
                            <input type="password" placeholder="Password" name="psw" required/>
                        </div>
                        <input type="submit" value="Enregistrer" name="btnE">
                    </form>
                </div>  
            </div>
    </section> 
    <div class="image">
        <img src="img/undraw_authentication_fsn5.svg">
    </div>
</body>
</html>