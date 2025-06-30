

<?php if(isset($_GET['id'])) { ?>

<form action="" method="post" >
   <fieldset style="border-radius: 8px;">
    <legend style="color:  #fdc500;"><?= $findone['titre'] ?></legend>

    <label for="titre">Titre</label>
    <input type="text"  name="titre" id="titre" value="<?= $findone['titre']?>" required>

    <label for="description">Description</label>
 <textarea name="description" id="description" ><?= $findone['description']?></textarea>


    <label for="tarif">Tarif</label>
  <input type="numbner"  name="tarif" id="tarif" value="<?= $findone['tarif'] ?>" required>

     <label for="services">Services</label>
     <select  id="services" name="services">
        <?php foreach($service as $services) { ?>

            <option name="services" value="<?= $services['id'] ?>"><?= $services['titre']; ?></option>

        <?php } ?>
    </select>
    
    <input type="submit" name="insert" value="envoyer">


</fieldset>
</form>
<?php } else { ?>


<form action="" method="post" >
   <fieldset style="border-radius: 8px;">
    <legend style="color:  #fdc500;">Prestations</legend>

    <label for="titre">Titre</label>
    <input type="text"  name="titre" id="titre"  required>

    <label for="description">Description</label>
 <textarea name="description" id="description" ></textarea>


    <label for="tarif">Tarif</label>
  <input type="numbner"  name="tarif" id="tarif" required>

     <label for="services">Services</label>
     <select  id="services" name="services">
        <?php foreach($service as $services) { ?>

            <option name="services" value="<?= $services['id'] ?>"><?= $services['titre']; ?></option>

        <?php } ?>
    </select>
    
    <input type="submit" name="insert" value="envoyer">


</fieldset>
</form>

<?php } ?>

