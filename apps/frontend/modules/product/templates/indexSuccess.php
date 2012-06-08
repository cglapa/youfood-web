<ul class="breadcrumb">
    <li>
        <a href="<?php echo url_for('@homepage')?>">Liste des cat&eacute;gories</a><span class="divider">></span>
    </li>
    <li class="active">
        <?php echo $category->getName() ?>
    </li>
</ul>
<div class="page-header">
    <h1><?php echo $category->getName() ?></h1>
</div>

<table class="table table-striped">
  <tbody>
    <?php foreach ($products as $product): ?>
    <tr>
      <td style="width: 40%"><a href="<?php echo url_for('product_show', $product) ?>"><?php echo $product->getName() ?></a></td>
      <td><?php echo $product->getPrice().'€'?></td>
      <td style="text-align: right">
            <?php echo link_to(
                    '<i class="icon-cog icon-white"></i> Modifier', 
                    'product_edit',
                    $product, array('method' => 'get', 'class' => 'btn btn-info'))?>
            <?php echo link_to(
                    '<i class="icon-remove icon-white"></i> Supprimer', 
                    'product_delete', 
                    $product, array('method' => 'delete', 'class' => 'btn btn-danger','confirm' => "Voulez vous vraiment supprimer le plat ".strtolower($category->getName())." ?")) ?>
        </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-success" href="<?php echo url_for('product_new', $product) ?>">
      <i class="icon-pencil icon-white"></i>
      Nouveau
  </a>
