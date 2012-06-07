<div class="page-header">
    <h1>Order products List</h1>
</div>

<table class="table table-striped">
    <thead>
        <th>Plat</th>
        <th>Quantité</th>
    </thead>
  <tbody>
    <?php foreach ($order_products as $order_product): ?>
    <tr>
      <td><?php echo $order_product->getProduct() ?></td>
      <td><?php echo $order_product->getQuantity() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('order_product/new') ?>">New</a>
