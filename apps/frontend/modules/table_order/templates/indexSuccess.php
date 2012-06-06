<h1>Table orders List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Is closed</th>
      <th>Dining table</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($table_orders as $table_order): ?>
    <tr>
      <td><a href="<?php echo url_for('table_order/show?id='.$table_order->getId()) ?>"><?php echo $table_order->getId() ?></a></td>
      <td><?php echo $table_order->getIsClosed() ?></td>
      <td><?php echo $table_order->getDiningTableId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('table_order/new') ?>">New</a>
