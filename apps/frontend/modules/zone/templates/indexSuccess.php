<h1>Zones List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Dining room</th>
      <th>Dining table</th>
    </tr>
  </thead>
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
