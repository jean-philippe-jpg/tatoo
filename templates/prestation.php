
<?php 

require_once './templates/partial/_partial-header.php';

if (!empty($findone)) { ?>

<p><?= $findone->getTitre() ?></p>

<?php } else {?>

<?php foreach ($prestation as $prestations) {  ?>
    
    <div class="container_prestation">
        <a href="?controller=prestations&action=detail&id=<?= $prestations->getP_id() ?>"><?= $prestations->getTitre(); ?></a>

    </div>
    
     <?php } }?>



      
        
   