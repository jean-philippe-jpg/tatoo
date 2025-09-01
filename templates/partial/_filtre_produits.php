<div class="container_produits">

<?php foreach( $article as $articles ){ ?>

<div class="card_services">
    
        <h3><?php echo $articles->getTitre() ?></h3>
         <img class="img-models" src="/templates/Admin/PicsPresta/Uploads/<?= $articles['libele'] ?>" alt="Girl in a jacket" width="200" height="200" > 
        <p><?php echo $articles['description'] ?></p>

        <a  href="?controller=prestations&action=list&id=<?= $articles['id']?>">voir</a>

</div>      


<?php } ?>

</div>
