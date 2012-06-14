<div class="page-header">
    <h1>Table orders List</h1>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Id</th>
      <th>Is closed</th>
      <th>Dining table</th>
      <th>Created at</th>
      <th>Is new</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($table_orders as $table_order): ?>
    <tr>
      <td><?php echo $table_order->getId() ?></td>
      <td><?php echo $table_order->getIsClosed() ?></td>
      <td><?php echo $table_order->getDiningTableId() ?></td>
      <td><?php echo $table_order->getCreatedAt() ?></td>
      <td><?php echo $table_order->getIsNew() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
