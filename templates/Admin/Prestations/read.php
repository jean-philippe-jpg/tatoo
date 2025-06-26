<h4>Serices</h4>

<a style="margin: 42vw;" type="btn" href="?controller=prestations&action=create">create</a>
<table class="table">
      <tr>
        <th>Id</th>
        <th>Titre</th>
        <th>Tarifs</th>
        <th>Show</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
      <tr>
        <?php foreach ($prestation as $prestations) { ?>

            <td><?= $prestations['id'] ?></td>
        <td><?= $prestations['titre'] ?></td>
       
        <td><?= $prestations['tarif'] ?></td>
        
        <td><a href="?controller=prestations&action=show&id=<?= $prestations['id'] ?>">Show</a></td>
          <td><a href="?controller=prestations&action=update&id=<?= $prestations['id'] ?>">Update</a></td>
          <td><a href="?controller=prestations&action=delete&id=<?= $prestations['id'] ?>">Delete</a></td>
        </tr> 
       <?php } ?>
    </table>