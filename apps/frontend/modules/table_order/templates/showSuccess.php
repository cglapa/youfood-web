<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $table_order->getId() ?></td>
    </tr>
    <tr>
      <th>Is closed:</th>
      <td><?php echo $table_order->getIsClosed() ?></td>
    </tr>
    <tr>
      <th>Dining table:</th>
      <td><?php echo $table_order->getDiningTableId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('table_order/edit?id='.$table_order->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('table_order/index') ?>">List</a>
