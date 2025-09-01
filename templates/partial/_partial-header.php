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

        
         
          

<body class="background">

    <header>
        <a class="logo" href="index.php"><img src="../../machine tatoo.jpg"   alt="" srcset=""></a>

        <ul >
            
            <li><a href="?creations">creation</a></li>
            <li><a href="?services">service</a></li>
            <li><a href="?boutique">boutique</a></li>
            <li><a href="?contact">contact</a></li>
            <li  class="fa-solid fa-user"><a  href="?controller=users&action=login&login">login</a></li>
            <li><a href="?controller=services&action=read">admin</a></li>
       
    <?php
    if (!isset($_SESSION['username']) && !isset($_SESSION['email'])) {
    session_start();
    $username = $_SESSION['username'];
    $email = $_SESSION['email']; 
    echo "<li style='margin-left: 50px;'><a style='color: blue;'>Bonjour, $username</a></li>";
    echo "<li ><a style='color: blue;'>$email</a></li>";

} else {
    echo "<h2>Bienvenue, visiteur</h2>";
    echo "<p>Veuillez vous connecter pour voir vos informations.</p>";
}

?>
 </ul>
  </header>