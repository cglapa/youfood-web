<?php slot('title', 'Commandes') ?>
<?php if(!$all) use_javascript('load_orders.js') ?>

<ul class="breadcrumb">
    <li class="active">
        Liste des commandes
    </li>
</ul>

<div class="page-header">
    <h1>Liste des commandes</h1>
</div>

<ul class="breadcrumb">
    <li<?php if(!$all) echo ' class="active" '?>>
        <?php echo link_to('Commandes en cours', 'table_order')?>
        <span class="divider">|</span>
    </li>
    <li<?php if($all == "mine") echo ' class="active" '?>>
        <?php echo link_to('Toutes mes commandes', '/order/mine') ?>
        <span class="divider">|</span>
    </li>
    <li<?php if($all == "all") echo ' class="active" '?>>
        <?php echo link_to('Toutes les commandes', '/order/all') ?>
    </li>
    
</ul>

<table class="table table-striped">
  <thead>
      <tr>
          <th>Numéro de commande</th>
          <th>Table</th>
          <th>Heure d'enregistrement</th>
      </tr>    
  </thead>
  <tbody id="orders">
    <?php include_partial('table_order/list', array('table_orders' => $table_orders, 'all' => $all)) ?>
  </tbody>
</table>
<img id="loader" src="/img/loader.gif" style="vertical-align: middle; float: right; display: none;"/>