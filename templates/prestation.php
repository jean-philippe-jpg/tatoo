
<?php if (!empty($findone)) { ?>

<p><?= $findone['description'] ?></p>

<?php } else {?>

<?php foreach ($prestation as $prestations) {  ?>
    
    <div class="container_prestation">
        <a href="?controller=prestations&action=detail&id=<?= $prestations['presta_id']?>"><?= $prestations['titre']; ?></a>
       
    </div>
    
     <?php } }?>



      
        
   