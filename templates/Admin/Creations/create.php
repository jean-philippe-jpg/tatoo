<?php if(isset($_GET['id'])) { ?>
<form action="" method="post" >
   <fieldset style="border-radius: 8px;">
    <legend style="color:  #fdc500;"><?= $findone['titre'] ?></legend>
    
    <label for="titre">Titre</label>
    <input type="text"  name="titre" id="titre" value="<?= $findone['titre'] ?>" required>

    
    <input type="submit" name="insert" value="envoyer">


</fieldset>
</form>
 <?php } else { ?>

    <form action="" method="post" >
   <fieldset style="border-radius: 8px;">
    <legend style="color:  #fdc500;">Création</legend>
    
     <label for="titre">Titre</label>
    <input type="text"  name="titre" id="titre" required>

    <input type="submit" name="insert" value="envoyer">


</fieldset>
</form>
 <?php } ?>