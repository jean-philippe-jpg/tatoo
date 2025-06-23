




<?php

$creation = array('create1','create2','create3','create4','create5','create6');?>

<?php if(isset($_GET['create'])){ ?>
<h1>Créations</h1>

<div class="container_produits">

<?php foreach( $creation as $creations){ ?>

<div class="card_creations">
    
        <h4><?php  echo $creations ?></h4>
       
</div>      


<?php } ?>

</div>
<?php } ?>