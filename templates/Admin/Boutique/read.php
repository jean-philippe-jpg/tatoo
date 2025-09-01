


<h4>Boutique</h4>

<?php require_once './templates/Admin/Partial/_acces.php';
require_once './templates/partial/_header-admin.php' ?>

<table class="admin">
      <caption>
        tableau des services proposés
      </caption>
      <thead>
        <tr>
          <th>Titre</th>
          <th>Prix</th>
          <th>Show</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <a style="margin: 42vw;" type="btn" href="?controller=boutique&action=create"><i style="color: green;" data-fa-symbol="edit" class="fa-solid fa-pencil fa-fw"></i></a>
        <tr>
          <?php foreach ($boutique as $boutiques) { ?>
          <td><?= $boutiques->getTitre() ?></td>
          <td><?= $boutiques->getPrix() ?></td>
          <td><a href="?controller=boutique&action=show&id=<?= $boutiques->getId() ?>"><i style="color: blue;" class="fa-solid fa-eye"></i></a></td>
          <td><a href="?controller=boutique&action=update&id=<?= $boutiques->getId()?>"> <i style="color: green;" data-fa-symbol="edit" class="fa-solid fa-pencil fa-fw"></i></a></td>
          <td><a href="?controller=boutique&action=delete&id=<?= $boutiques->getId() ?>"><i style="color: red;" data-fa-symbol="delete" class="fa-solid fa-trash fa-fw"></i></a></td>
        
        </tr>
        <?php } ?>
      </tbody>
    </table>
      
