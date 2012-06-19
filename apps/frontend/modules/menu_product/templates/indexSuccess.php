<?php slot('title', 'Detail menu') ?>

<ul class="breadcrumb">
    <li>
        <a href="<?php echo url_for('menu')?>">Liste des menus</a><span class="divider">></span>
    </li>
    <li class="active">
        Liste des plats du menu <?php echo $menu->getName() ?>
    </li>
</ul>

<div class="page-header">
    <h1>Liste des plats du menu <?php echo $menu->getName() ?></h1>
</div>

<?php foreach ($menu_products as $categoryName => $menu_products): ?>
<table class="table table-striped">
    <thead><th colspan="3" style="font-size: 18px; background-color: #F2F2F2"><?php echo $categoryName ?></th></thead>
  <tbody>
      <?php foreach ($menu_products as $menu_product): ?>
    <tr>
      <td><?php echo $menu_product->getProduct() ?></td>
      <td style="text-align: right">
          <?php echo link_to(
                    '<i class="'.($menu_product->getIsAvailable() ? 'icon-ok-sign' : 'icon-minus-sign').' icon-white"></i> '.($menu_product->getIsAvailable() ? 'Disponible' : 'Indisponible'),
                    'menu_product_available',
                    $menu_product, array('method' => 'put', 'class' => 'btn '.($menu_product->getIsAvailable() ? 'btn-success' : 'btn-warning'))
                    ) ?>
          <?php echo link_to(
                  '<i class="icon-remove icon-white"></i> Supprimer',
                  'menu_product_delete',
                  $menu_product,
                  array(
                      'class' => 'btn btn-danger', 'method' => 'delete'
                  )); ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<hr>
<?php endforeach; ?>
<a href="<?php echo url_for('menu_product_new', $menu) ?>" class="btn btn-success">
    <i class="icon-pencil icon-white"></i>
    Ajouter un plat
</a>