<ul class="breadcrumb">
    <li>
        <a href="<?php echo url_for('stats') ?>">Statistique de vente</a><span class="divider">></span>
    </li>
    <li class="active">
        <?php echo (($category) ? $category->getName() : 'Plats') ?> vendus dans le restaurant <?php echo $zone->getName() ?>
    </li>
</ul>

<div class="page-header">
    <h1><?php echo (($category) ? $category->getName() : 'Plats') ?> vendus dans le restaurant <?php echo $zone->getName() ?></h1>
</div>    
    
<table class="table table-striped">
  <thead>
    <tr>
      <th>Plat</th>
      <th>Quantité commandé</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($order_products as $order_product): ?>
    <tr>
      <td><?php echo $order_product->getProduct() ?></td>
      <td><?php echo $order_product->getSum() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>