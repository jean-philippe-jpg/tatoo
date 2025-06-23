<?php

$service = array('Service 1','Service 2','Service 3','Service 4','Service 5','Service 6');?>

<?php if(isset($_GET['services'])){ ?>
<h1>Services</h1>

<div class="container_produits">

<?php foreach( $service as $services ){ ?>

<div class="card_creations">
    
        <h4><?php  echo $services ?></h4>
       
</div>      


<?php } ?>

</div>
<?php } ?>