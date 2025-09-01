



<ul class="categorie">
    
<?php foreach($categorie as $categories){ ?>
    
    <div><li><a href="?controller=boutique&action=categories&id=<?= $categories->getId() ?>"><?= $categories->getTitre() ?></a></li></div>
    

<?php } ?>
</ul>
