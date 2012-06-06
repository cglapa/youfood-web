<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $order_product->getId() ?></td>
    </tr>
    <tr>
      <th>Table order:</th>
      <td><?php echo $order_product->getTableOrderId() ?></td>
    </tr>
    <tr>
      <th>Product:</th>
      <td><?php echo $order_product->getProductId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('order_product/edit?id='.$order_product->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('order_product/index') ?>">List</a>
