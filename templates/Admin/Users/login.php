
<?php  
require_once './templates/partial/_partial-header.php';

 
?>


<?php 

if (isset($_GET['login'])) { ?>
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

<a href="?controller=users&action=login&register">inscription</a>
</form>
<?php } elseif (isset($_GET['register'])) { ?>

    <form action="" method="post" >
   <fieldset style="border-radius: 8px;">


    <legend style="color:  #fdc500;">register</legend>

<label for="username">Username</label>
    <input type="text" name="username" id="username" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

<label for="password">Password</label>
    <input type="password" name="password" id="password" required>

  

    <input type="submit" name="insert" value="envoyer">


</fieldset>
</form>

    <?php } ?>