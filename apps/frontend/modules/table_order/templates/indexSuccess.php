<?php use_javascript('jquery-1.7.2.min.js') ?>
<?php use_javascript('load_orders.js') ?>

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
  <tbody id="orders">
    <?php include_partial('table_order/list', array('table_orders' => $table_orders)) ?>
  </tbody>
</table>

<a class="btn btn-success" href="<?php echo url_for('table_order_new') ?>">
    <i class="icon-pencil icon-white"></i>
    Nouveau
</a>
<img id="loader" src="/img/loader.gif" style="vertical-align: middle; float: right; display: none;"/>