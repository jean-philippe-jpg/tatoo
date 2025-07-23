<?php 

require_once './templates/Admin/Partial/_acces.php';
 require_once './templates/Partial/_header-admin.php';


if(isset($_GET['id'])) { ?>
<form action="" method="post" >
   <fieldset style="border-radius: 8px;">
    <legend style="color:  #fdc500;"><?= $findone['titre'] ?></legend>

    <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre" value="<?= $findone['titre']?>" >

    <label for="description">Description</label>
  <textarea name="description" id="description" ><?= $findone['description']?></textarea>
    
    
    <input  type="submit" name="insert" value="envoyer">


</fieldset>
</form>

<?php } else { ?>

<form action="" method="post" >
   <fieldset style="border-radius: 8px;">
    <legend style="color:  #fdc500;">Catégorie</legend>

<label for="titre">Titre</label>
    <input type="text" name="titre" id="titre" required>

<label for="description">Description</label>
   <textarea name="description" id="description"></textarea>

    <input type="submit" name="insert" value="envoyer">


</fieldset>
</form>





<?php } ?>