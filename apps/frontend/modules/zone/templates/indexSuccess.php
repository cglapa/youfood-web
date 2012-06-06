<div class="page-header">
    <h1>Liste des zones</h1>
</div>
<table>
  <tbody>
    <?php foreach ($zones as $zone): ?>
    <tr>
      <td><a href="<?php echo url_for('zone/show?id='.$zone->getId()) ?>"><?php echo $zone->getId() ?></a></td>
      <td><?php echo $zone->getName() ?></td>
      <td><?php echo $zone->getDiningRoomId() ?></td>
      <td><?php echo $zone->getDiningTableId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('zone/new') ?>">New</a>
