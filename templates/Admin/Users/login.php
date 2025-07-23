
<?php  
require_once './templates/partial/_partial-header.php'
?>
<form action="" method="post" >
   <fieldset style="border-radius: 8px;">


    <legend style="color:  #fdc500;">login</legend>

<label for="username">Username</label>
    <input type="text" name="username" id="username" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

<label for="password">Password</label>
    <input type="password" name="password" id="password" required>


    <input type="submit" name="insert" value="envoyer">


</fieldset>


  <?php 

/*if($_SERVER['REQUEST_METHOD'] === "POST") {

   // if(isset($_POST['username']) && isset($_POST['password'])) {
        $username  = $_POST['username'];
        $email  = $_POST['email'];
        $password  = $_POST['password'];
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
        //} else {
           // echo "<p>Nom d'utilisateur ou mot de passe incorrect.</p>";
        //}
    


?>
</form>