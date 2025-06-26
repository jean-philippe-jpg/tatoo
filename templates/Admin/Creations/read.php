<h4>Creations</h4>

<a style="margin: 42vw;" type="btn" href="?controller=creations&action=create">create</a>
<table class="table">
      <tr>
        <th>Id</th>
        <th>Titres</th>
        <th>Photos</th>
        
      </tr>
      <tr>
        <?php foreach ($creation as $creations) { ?>
        <td><?= $creations['titre'] ?></td>
    
        
        <td><a href="?controller=creations&action=show&id=<?= $creations['id'] ?>">Show</a></td>
          <td><a href="?controller=creations&action=update&id=<?= $creations['id'] ?>">Update</a></td>
          <td><a href="?controller=creations&action=delete&id=<?= $creations['id'] ?>">Delete</a></td>
        </tr> 
       <?php } ?>
    </table>