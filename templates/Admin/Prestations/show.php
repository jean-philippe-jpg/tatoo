
<?php

require_once './templates/Admin/Partial/_acces.php';
 require_once './templates/Partial/_header-admin.php';
?>
<div class="card_show">

       <h4><?= $findone->getTitre(); ?></h4>
       <p><?= $findone->getDescription(); ?></p>
       <p><?= $findone->getPrix(); ?></p>

</div>      

