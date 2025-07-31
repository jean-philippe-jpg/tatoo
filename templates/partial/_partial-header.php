<?php 



/*session_start();
	  $_SESSION['username'];
      $_SESSION['email'];*/

//$id_session = session_id();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Asset/Style/Css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <title>Document</title>
    

</head>

        <?php
         
           /* if($id_session){
                echo 'ID de session (récupéré via session_id()) : <br>'
                .$id_session. '<br>';
                 
            }

            echo '<br><br>';
            if(isset($_COOKIE['PHPSESSID'])){
                echo 'ID de session (récupéré via $_COOKIE) : <br>'
                .$_COOKIE['PHPSESSID'];
            }*/
if (!isset($_SESSION['username']) && !isset($_SESSION['email'])) {
    session_start();
    $username = $_SESSION['username'];
$email = $_SESSION['email'];
echo "<h2>Bienvenue, $username</h2>";
echo "<p>Votre adresse e-mail est : $email</p>";
} else {
    echo "<h2>Bienvenue, visiteur</h2>";
    echo "<p>Veuillez vous connecter pour voir vos informations.</p>";
}

?>
<body class="background">

    <header>
        
        <ul class="header">
            <li><a class="logo" href="index.php">logo</a></li>
            <li><a href="?creations">creation</a></li>
            <li><a href="?services">service</a></li>
            <li><a href="?boutique">boutique</a></li>
            <li><a href="?contact">contact</a></li>
            <li><a href="?controller=users&action=login">connexion</a></li>
            <li><a href="?controller=users&action=register">inscription</a></li>
            <li><a href="?controller=services&action=read">admin</a></li>
        </ul>
        
    </header>