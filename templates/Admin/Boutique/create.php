<?php 

require_once './templates/Admin/Partial/_acces.php';
 require_once './templates/Partial/_header-admin.php';



if(isset($_GET['id'])) { ?>

    <img class="img-models" src="/templates/Admin/PicsPresta/Uploads/<?= $findone['libele'] ?>" alt="Girl in a jacket" width="200" height="200" > 
<form action="" method="post" method="post" enctype="multipart/form-data" >
   <fieldset style="border-radius: 8px;">
    <legend style="color:  #fdc500;"><?= $findone['titre'] ?></legend>

    <label for="titre">Titre</label>
    <input type="text"  name="titre" id="titre" value="<?= $findone['titre']?>" required>

    <label for="description">Description</label>
    <input type="text"  name="description" id="description" value="<?= $findone['description']?>">

    <label for="prix">Prix</label>
    <input type="text"  name="prix" id="prix" value="<?= $findone['prix']?>" required>
      

     <label for="categorie_id">Photo</label>
     <select  id="categorie_id" name="categorie_id">
        <?php foreach($categorie as $categories) { ?>

            <option name="categorie_id" value="<?= $categories['id'] ?>"><?= $categories['titre']; ?></option>

        <?php } ?>
    </select>
    
    <input type="submit" name="insert" value="envoyer">


</fieldset>
</form>
<?php } else { ?>


<form action="" method="post" enctype="multipart/form-data" >
   <fieldset style="border-radius: 8px;">
    <legend style="color:  #fdc500;">Boutique</legend>

    <label for="titre">Titre</label>
    <input type="text"  name="titre" id="titre"  required>

     <label for="description">Description</label>
    <input type="text"  name="description" id="description"  >

    <label for="prix">Prix</label>
    <input type="text"  name="prix" id="prix"  required>

   <input type="file"  name="images" id="images"  required>

     <label for="categorie_id">Categorie</label>
     <select  id="categorie_id" name="categorie_id">
        <?php foreach($categorie as $categories) { ?>

            <option name="insert" value="<?= $categories['id'] ?>"><?= $categories['titre']; ?></option>

        <?php } ?>
    </select>
    
    <input type="submit" name="insert" value="envoyer">


</fieldset>
</form>

<?php } ?>

