




<h4>Serices</h4>

<a type="btn" href="?controller=services&action=create">create</a>
<table>
      <tr>
        <th>Mois</th>
        <th>Data</th>
      </tr>
      <tr>
        <?php foreach ($services as $service) { ?>

            <td><?= $service['id'] ?></td>
        <td><?= $service['titre'] ?></td>
        
        <td><a href="?controller=services&action=show&id<?= $service['id'] ?>">Show</a></td>
      </tr>
       <?php } ?>
    </table>