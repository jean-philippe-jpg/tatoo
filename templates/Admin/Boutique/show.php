<?php

require_once './templates/Admin/Partial/_acces.php';
 require_once './templates/Partial/_header-admin.php';
?>


<div class="card_show">
    
       <h4><?= $findone->getTitre(); ?></h4>
         <img class="img-models" src="/templates/Admin/PicsPresta/Uploads/<?= $findone->getLibele() ?>" alt="Girl in a jacket" width="200" height="200" > 
       <p><?= $findone->getDescription() ?></p>
       
</div>      

