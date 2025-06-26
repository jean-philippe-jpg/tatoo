
<?php






if (isset($_GET['prod']) ) {?>

<h1>Boutique</h1>
<div  class="container_produits">
 <?php foreach ($produits as $produit) { ?>

<div class="card_produit">
    
        <h4><?php  echo $produit ?></h4>
       
</div>      
<?php }?>
</div>

<?php } 