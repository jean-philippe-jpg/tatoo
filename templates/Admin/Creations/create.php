<?php


require_once './templates/Admin/Partial/_acces.php';
 require_once './templates/Partial/_header-admin.php';


if(isset($_GET['id'])) { ?>
<form action="" method="post" enctype="multipart/form-data">
   <fieldset style="border-radius: 8px;">
    <legend style="color:  #fdc500;">Création</legend>
    
     <label for="titre">Titre</label>
    <input type="text"  name="titre" id="titre" value="<?= $findone['titre'] ?>" required>

    <img class="img-models" src="/templates/Admin/Creations/Uploads/<?= $findone['libele'] ?>" alt="Girl in a jacket" width="200" height="200" >

     <label for="description">Description</label>
    <input type="text"  name="description" id="description" value="<?= $findone['description'] ?>">

     <label for="prix">Prix</label>
    <input type="text"  name="prix" id="prix" value="<?= $findone['prix'] ?>" >

    
     <input type="file"  name="images" id="images" >

    <input type="submit" name="insert" value="envoyer">


</fieldset>
</form>
 <?php } else { ?>

    <form action="" method="post" enctype="multipart/form-data">
   <fieldset style="border-radius: 8px;">
    <legend style="color:  #fdc500;">Création</legend>
    
     <label for="titre">Titre</label>
    <input type="text"  name="titre" id="titre" required>

     <label for="description">Description</label>
    <input type="text"  name="description" id="description" >

     <label for="prix">Prix</label>
    <input type="text"  name="prix" id="prix" >

    
     <input type="file"  name="images" id="images"  required>

    <input type="submit" name="insert" value="envoyer">


</fieldset>
</form>
 <?php } ?>