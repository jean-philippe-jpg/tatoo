
<?php

require_once './templates/Admin/Partial/_acces.php';
 require_once './templates/partial/_header-admin.php'
?>

<h4>Serices</h4>


<table class="admin">
      <caption>
        tableau des services proposés
      </caption>
      <thead>
        <tr>
          <th>Titre</th>
          <th>Show</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <a style="margin: 42vw;" type="btn" href="?controller=categories&action=create"><i style="color: green;" data-fa-symbol="edit" class="fa-solid fa-pencil fa-fw"></i></a>
        <tr>
          <?php foreach ($categorie as $categories) { ?>
          <td><?= $categories->getTitre() ?></td>

           <td><a href="?controller=categories&action=show&id=<?= $categories->getId() ?>"><i style="color: blue;" class="fa-solid fa-eye"></i></a></td>
          <td><a href="?controller=categories&action=update&id=<?= $categories->getId() ?>"> <i style="color: green;" data-fa-symbol="edit" class="fa-solid fa-pencil fa-fw"></i></a></td>
          <td><a href="?controller=categories&action=delete&id=<?= $categories->getId() ?>"><i style="color: red;" data-fa-symbol="delete" class="fa-solid fa-trash fa-fw"></i></a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
      
