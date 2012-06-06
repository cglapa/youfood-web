<h1>Order products List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Table order</th>
      <th>Product</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($order_products as $order_product): ?>
    <tr>
      <td><a href="<?php echo url_for('order_product/show?id='.$order_product->getId()) ?>"><?php echo $order_product->getId() ?></a></td>
      <td><?php echo $order_product->getTableOrderId() ?></td>
      <td><?php echo $order_product->getProductId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('order_product/new') ?>">New</a>
