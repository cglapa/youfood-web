<div class="page-header">
    <h1>Liste des plats</h1>
</div>

<table class="table table-striped">
  <tbody>
    <?php foreach ($menu_products as $menu_product): ?>
    <tr>
      <td><?php echo $menu_product->getProduct() ?></td>
      <td><?php echo $menu_product->getMenu() ?></td>
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

<a href="<?php echo url_for('menu_product_new', $menu) ?>" class="btn btn-success">
    <i class="icon-pencil icon-white"></i>
    Ajouter un plat
</a>