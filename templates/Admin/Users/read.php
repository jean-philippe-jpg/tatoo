<?php

require_once './templates/Admin/Partial/_acces.php';
 require_once './templates/Partial/_header-admin.php';
?>

<table class="table">
        
        <table class="admin">
      <caption>
        liste des utilisateurs
      </caption>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Email</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php foreach ($user as $users) { ?>
          <td><?= $users['username'] ?></td>
          <td><?= $users['email'] ?></td>
          <td><a href="?controller=users&action=delete&id=<?= $users['id'] ?>"><i style="color: red;" data-fa-symbol="delete" class="fa-solid fa-trash fa-fw"></i></a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
      
            
<?php require_once './templates/Partial/_footer.php'; ?>