<?php 



session_start();
	  $_SESSION['username'];
      $_SESSION['email'];

//$id_session = session_id();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Asset/Style/Css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer">
   
    <title>Document</title>
    
</head>
<body class="background">

    <header>
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
if($_SERVER['REQUEST_METHOD'] === "POST") {

   // if(isset($_POST['username']) && isset($_POST['password'])) {
        $username  = $_POST['username'];
        $email  = $_POST['email'];
     
       // if ( $username === 'toto' AND $password == 'toto' ) {
            //Initialisation de notre session en tant qu'administrateur 
            //$_SESSION['admin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            // redirection 
            echo "Bienvenue à toi, $username";
            
        /* else if ( $username === 'user' AND $password == 'user' ) {
            //Initialisation de notre session en tant qu'utilisateur
            $_SESSION['admin'] = false;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            // création du cookie utilisateur
            echo "Bienvenue à toi, $username";*/
} else {
            echo "<p >erreur de session</p><br>";
        }

                
            
        ?>
        <a class="title" href="index.php">logo</a>
        <ul>
            <li><a href="?creations">creation</a></li>
            <li><a href="?services">service</a></li>
            <li><a href="?boutique">boutique</a></li>
            <li><a href="?contact">contact</a></li>
            <li><a href="?controller=users&action=login">connexion</a></li>
            <li><a href="?controller=users&action=register">inscription</a></li>
            <li><a href="?controller=services&action=read">admin</a></li>
        </ul>
    </header>