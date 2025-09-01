<?php
require_once './templates/partial/_partial-header.php';
?>


<div class="container_articles">

<?php foreach( $article as $articles ){ ?>
<div class="cards_articles">
<h3><?php echo $articles->getTitre() ?></h3>
<div class="articles">
    
         <img class="img-article" src="/templates/Admin/PicsPresta/Uploads/<?= $articles->getLibele() ?>" alt="Girl in a jacket" width="200" height="200" >
        
</div> 
    <div class="card_footer">
                 <a  href="?controller=prestations&action=list&id=<?= $articles->getId()?>">voir</a> 
                 <p><?php echo $articles->getPrix()?> €</p> 
         </div> 
</div>
<?php } ?>

</div>
