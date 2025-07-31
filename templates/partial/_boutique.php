  
<ul >
    
<?php foreach($categorie as $categories){ ?>

  <li><a href="?controller=boutique&action=categories&id=<?= $categories['id'] ?>"><?=$categories['titre'] ?></a></li>

<?php } ?>
  
 
</ul>


<div class="container_produits">

<?php foreach( $article as $articles ){ ?>

<div class="card_services">

        <h4><?php echo $articles->getTitre() ?></h4>
         <img class="img-models" src="/templates/Admin/PicsPresta/Uploads/<?= $articles->getLibele() ?>" alt="Girl in a jacket" width="200" height="200" >
        <p><?php echo $articles->getDescription() ?></p>

        <a  href="?controller=prestations&action=list&id=<?= $articles->getId() ?>">voir</a>

</div>      


<?php } ?>

</div>
