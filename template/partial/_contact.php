

<?php if (isset($_GET['contact'])) { ?>

<form action="" method="post">
   <fieldset style="border-radius: 8px;">
    <legend style="color:  #fdc500;">Contactez-nous</legend>

    <label for="name">Username</label>
    <input type="text" name="name" id="name" required>

    <label for="objet">Objet</label>
    <input type="text"  name="objet" id="objet" required>

    <label for="">Email</label>
    <input type="email" name="email" id="email" required '>

    <label for="message">Message</label>
    <textarea type='text' name="message" id="message" cols="30"></textarea>


    <input type="submit" value="ENVOYER">


</fieldset>
</form>
<?php
if (empty($_POST) === false) {
    $_POST['name'];
    $_POST['objet'];
    $_POST['email'];
    $_POST['message'];
    echo "Merci " . $_POST['name'] . " pour votre message concernant " . $_POST['objet'] . ". Nous vous répondrons à l'adresse " . $_POST['email'] . ".";
}
 } ?>