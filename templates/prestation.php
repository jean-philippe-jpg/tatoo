
<?php 

require_once './templates/partial/_partial-header.php'; ?>




      <ul class="categorie">

    <?php foreach ($prestation as $prestations) {  ?>
    
        <li><a href="?controller=prestations&action=list&id=<?= $prestations->getP_id() ?>&toto"><?= $prestations->getTitre(); ?></a></li>

     <?php }  ?>
    </ul>
 


           <?php if (isset($_GET['toto'])) { ?>



    <div class="card_show">

       <h1><?= $findone->getTitre(); ?></h1>
       <p><?= $findone->getDescription(); ?></p>
        <p>à partir de <?= $findone->getPrix(); ?> €</p>
</div>
<div class="container_models">
  <?php foreach($model as $models) { ?>
         
    <div class="card_models">
         <h3><?= $models['name'] ?></h3>
     <img class="img-models" src="/templates/Admin/PicsPresta/Uploads/<?= $models['libele'] ?>" alt="Girl in a jacket" width="200" height="200" > 
          <p><?= $models['prix'] ?>€</p>
    </div>
   

<?php } ?>


</div>
     
  <?php } ?>

  

      
        
   