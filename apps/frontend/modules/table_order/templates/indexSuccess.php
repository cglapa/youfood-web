<ul class="breadcrumb">
    <li class="active">
        Liste des commandes
    </li>
</ul>

<div class="page-header">
    <h1>Liste des commandes</h1>
</div>

<table class="table table-striped">
  <thead>
      <tr>
          <th>Numéro de commande</th>
          <th>Table</th>
          <th>Heure d'enregistrement</th>
      </tr>    
  </thead>
  <tbody>
    <?php foreach ($table_orders as $table_order): ?>
    <tr>
      <td><?php echo $table_order->getId() ?></td>
      <td><?php echo $table_order->getDiningTable() ?></td>
      <td><?php echo $table_order->getDateTimeObject('created_at')->format('H:i') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a class="btn btn-success" href="<?php echo url_for('table_order_new') ?>">
    <i class="icon-pencil icon-white"></i>
    Nouveau
</a>