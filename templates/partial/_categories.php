



<ul class="categorie">
    
<?php foreach($categorie as $categories){ ?>
    
    <li><a href="?controller=categories&action=list&id=<?= $categories->getId() ?>"><?= $categories->getTitre() ?></a></li>
    

<?php } ?>
</ul>
