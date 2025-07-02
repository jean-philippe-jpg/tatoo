


    

   
<div class="card_show">
    
       <h4><?= $findone['titre']; ?></h4>
       <p><?= $findone['description'] ?></p>
        <p><?= $findone['tarif'] ?></p>

<div class="container_models">
  <?php foreach($model as $models) { ?>
         
    <div class="card_models">
         <p><?= $models['name'] ?></p>
     <img class="img-models" src="/templates/Admin/PicsPresta/Uploads/<?= $models['libele'] ?>" alt="Girl in a jacket" width="200" height="200" > 
          <p><?= $models['prix'] ?>€</p>
    </div>
   

<?php } ?>
</div>
</div>      


    
   