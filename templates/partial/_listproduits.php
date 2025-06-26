
<?php



$produits = array('Produit 1', 'Produit 2', 'Produit 3', 'Produit 4', 'Produit 5');
$produits = str_replace(',', '', $produits);


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