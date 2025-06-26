




<h4>Serices</h4>

<a style="margin: 42vw;" type="btn" href="?controller=services&action=create">create</a>
<table class="table">
      <tr>
        <th>Mois</th>
        <th>Data</th>
      </tr>
      <tr>
        <?php foreach ($services as $service) { ?>

            <td><?= $service['id'] ?></td>
        <td><?= $service['titre'] ?></td>
        
        <td><a href="?controller=services&action=show&id=<?= $service['id'] ?>">Show</a></td>
          <td><a href="?controller=services&action=update&id=<?= $service['id'] ?>">Update</a></td>
          <td><a href="?controller=services&action=delete&id=<?= $service['id'] ?>">Delete</a></td>
        </tr> 
       <?php } ?>
    </table>