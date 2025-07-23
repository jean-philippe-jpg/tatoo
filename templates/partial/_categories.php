



<select >
    
<?php foreach($categorie as $categories){ ?>
<div class="container_categories">
<div class="card_categories">
    <option value="categorie"><?= $categories['titre']?></option>
    <h4><?php echo $categories['titre'] ?></h4>
<?php } ?>
  
 
</select>


