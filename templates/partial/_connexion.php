<?php if (isset($_GET['connexion'])) { ?>

<form action="" method="post">

   <fieldset style="border-radius: 8px;">
    <legend style="color:  #fdc500;">Contactez-nous</legend>

    <label for="name">Username</label>
    <input type="text" name="name" id="name" required>

    <label for="">Email</label>
    <input type="email" name="email" id="email" required '>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>


    <input type="submit" value="ENVOYER">


</fieldset>
</form>
<?php
if (empty($_POST) === false) {
    $_POST['name'];
    
    $_POST['email'];
    $_POST['password'];
    echo "Merci " . $_POST['name'] . " pour votre connexion. Nous vous répondrons à l'adresse " . $_POST['email'] . ".";

    
    echo $_POST['password'];
}
 } ?>