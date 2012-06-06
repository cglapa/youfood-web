<h1>Dining tables List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Seats</th>
      <th>Zone</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($dining_tables as $dining_table): ?>
    <tr>
      <td><a href="<?php echo url_for('dining_table/show?id='.$dining_table->getId()) ?>"><?php echo $dining_table->getId() ?></a></td>
      <td><?php echo $dining_table->getSeats() ?></td>
      <td><?php echo $dining_table->getZoneId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('dining_table/new') ?>">New</a>
