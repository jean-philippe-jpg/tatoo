
<?php

require_once './templates/Admin/Partial/_acces.php';
 require_once './templates/Partial/_header-admin.php';
?>
<div class="card_show">
    
       <h4><?= $findone['titre']; ?></h4>
       <img class="img-models" src="/templates/Admin/Creations/Uploads/<?= $findone['libele'] ?>" alt="Girl in a jacket" width="200" height="200" >

       <p><?= $findone['description']; ?></p>
       <p><?= $findone['prix']; ?> €</p>

</div>      

