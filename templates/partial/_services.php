

<?php 


  
?>


<div class="container_produits">

<?php foreach( $service as $services ){ ?>

     
<div class="card_services">

        <h3><?php echo $services->getTitre() ?></h3>
        <p><?php echo $services->getDescription() ?></p>

        <a  href="?controller=prestations&action=list&id=<?= $services->getId() ?>">voir</a>

</div>      


<?php } ?>
 
</div>
  