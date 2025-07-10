

<?php 


  //session_start();

?>


<div class="container_produits">

<?php foreach( $services as $service ){ ?>

     
<div class="card_services">
    
        <h4><?php echo $service['titre'] ?></h4>
        <p><?php echo $service['description'] ?></p>

        <a  href="?controller=prestations&action=list&id=<?= $service['id']?>">voir</a>

</div>      


<?php } ?>

</div>
