<h4>Boutique</h4>

<a style="margin: 42vw;" type="btn" href="?controller=boutique&action=create">create</a>
<table class="table">
      <tr>
        <th>Mois</th>
        <th>Data</th>
      </tr>
      <tr>
        <?php foreach ($boutique as $boutiques) { ?>

            <td><?= $boutiques['id'] ?></td>
        <td><?= $boutiques['titre'] ?></td>
        
        <td><a href="?controller=boutique&action=show&id=<?= $boutiques['id'] ?>">Show</a></td>
          <td><a href="?controller=boutique&action=update&id=<?= $boutiques['id'] ?>">Update</a></td>
          <td><a href="?controller=boutique&action=delete&id=<?= $boutiques['id'] ?>">Delete</a></td>
        </tr> 
       <?php } ?>
    </table>