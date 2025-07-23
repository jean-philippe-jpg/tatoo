<?php 


require_once './templates/Admin/Partial/_acces.php';
 require_once './templates/Partial/_header-admin.php';


if(isset($_GET['id'])) { ?>

    <img class="img-models" src="/templates/Admin/PicsPresta/Uploads/<?= $findone['libele'] ?>" alt="Girl in a jacket" width="200" height="200" > 
<form action="" method="post" method="post" enctype="multipart/form-data" >
   <fieldset style="border-radius: 8px;">
    <legend style="color:  #fdc500;"><?= $findone['name'] ?></legend>

    <label for="name">Nom</label>
    <input type="text"  name="name" id="name" value="<?= $findone['name']?>" required>

    <label for="prix">Prix</label>
    <input type="text"  name="prix" id="prix" value="<?= $findone['prix']?>" required>
      

     <label for="presta_id">Photo</label>
     <select  id="presta_id" name="presta_id">
        <?php foreach($prestation as $prestations) { ?>

            <option name="presta_id" value="<?= $prestations['id'] ?>"><?= $prestations['titre']; ?></option>

        <?php } ?>
    </select>
    
    <input type="submit" name="insert" value="envoyer">


</fieldset>
</form>
<?php } else { ?>


<form action="" method="post" enctype="multipart/form-data" >
   <fieldset style="border-radius: 8px;">
    <legend style="color:  #fdc500;">Model</legend>

    <label for="name">Nom</label>
    <input type="text"  name="name" id="name"  required>

    <label for="prix">Prix</label>
    <input type="text"  name="prix" id="prix"  required>

   <input type="file"  name="images" id="images"  required>

     <label for="presta_id">Services</label>
     <select  id="presta_id" name="presta_id">
        <?php foreach($prestation as $prestations) { ?>

            <option name="insert" value="<?= $prestations['id'] ?>"><?= $prestations['titre']; ?></option>

        <?php } ?>
    </select>
    
    <input type="submit" name="insert" value="envoyer">


</fieldset>
</form>

<?php } ?>

