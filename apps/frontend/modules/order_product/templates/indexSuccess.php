<ul class="breadcrumb">
    <li>
        <?php echo link_to('Liste des commandes', 'table_order') ?><span class="divider">></span>
    </li>
    <li class="active">
        Commande de la table <?php echo $table_order->getDiningTable() ?>
    </li>
</ul>


<div class="page-header">
    <h1>Commande de la table <?php echo $table_order->getDiningTable() ?></h1>
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
    <tr><td colspan="2" style="text-align: right;">Prix total : <?php echo $table_order->getTotalPrice().' €'?></td></tr>
  </tbody>
</table>
