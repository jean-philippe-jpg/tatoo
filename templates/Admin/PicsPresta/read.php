<h4>Serices</h4>

<a style="margin: 42vw;" type="btn" href="?controller=photospresta&action=create">create</a>
<table class="table">
      <tr>
        <th>Mois</th>
        <th>Data</th>
      </tr>
      <tr>
        <?php foreach ($model as $models) { ?>

            <td><?= $models['id'] ?></td>
        <td><?= $models['name'] ?></td>
        
        <td><a href="?controller=photospresta&action=show&id=<?= $models['id'] ?>">Show</a></td>
          <td><a href="?controller=photospresta&action=update&id=<?= $models['id'] ?>">Update</a></td>
          <td><a href="?controller=photospresta&action=delete&id=<?= $models['id'] ?>">Delete</a></td>
        </tr> 
       <?php } ?>
    </table>