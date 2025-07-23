

<?php 


  //session_start();

?>


<div class="container_produits">

<?php foreach( $service as $services ){ ?>

     
<div class="card_services">

        <h4><?php echo $services->getTitre() ?></h4>
        <p><?php echo $services->getDescription() ?></p>

        <a  href="?controller=prestations&action=list&id=<?= $services->getId() ?>">voir</a>

</div>      


<?php } ?>

</div>
