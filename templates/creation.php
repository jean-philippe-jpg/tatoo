

<?php 

if(isset($_GET['creations'])) { ?>

<div class="container_produits">

<?php foreach( $creation as $creations ){ ?>
       <div class="card_services">

        <h3><?php echo $creations->getTitre() ?></h3>
        <img class="img-models" src="/templates/Admin/Creations/Uploads/<?= $creations->getLibele() ?>" alt="Girl in a jacket" width="200" height="200" >
         <p><?php echo $creations->getDescription() ?></p>
</div>


<?php } ?>

</div>
<?php } ?>