<h4>Serices</h4>

<a style="margin: 42vw;" type="btn" href="?controller=categories&action=create">create</a>
<table class="table">
      <tr>
        <th>Mois</th>
        <th>Data</th>
      </tr>
      <tr>
        <?php foreach ($categorie as $categories) { ?>

            <td><?= $categories['id'] ?></td>
        <td><?= $categories['titre'] ?></td>
        
        <td><a href="?controller=categories&action=show&id=<?= $categories['id'] ?>">Show</a></td>
          <td><a href="?controller=categories&action=update&id=<?= $categories['id'] ?>">Update</a></td>
          <td><a href="?controller=categories&action=delete&id=<?= $categories['id'] ?>">Delete</a></td>
        </tr> 
       <?php } ?>
    </table>