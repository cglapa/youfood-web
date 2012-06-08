<ul class="breadcrumb">
    <li class="active">
        Liste des cat&eacute;gories
    </li>
</ul>
<div class="page-header">
    <h1>Cat&eacute;gories de plats</h1>
</div>

<table class="table table-striped">
  <tbody>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><a href="<?php echo url_for('category_detail', $product) ?>"><?php echo $product->getName() ?></a></td>
        <td style="text-align: right">
            <?php echo link_to(
                    '<i class="icon-cog icon-white"></i> Modifier', 
                    'category_edit', 
                    $product, array('method' => 'get', 'class' => 'btn btn-info')) ?>
            <?php echo link_to(
                    '<i class="icon-remove icon-white"></i> Supprimer', 
                    'category_delete', 
                    $product, array('method' => 'delete', 'class' => 'btn btn-danger','confirm' => "Voulez vous vraiment supprimer la catégorie ".strtolower($product->getName())." ?")) ?>
        </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a class="btn btn-success" href="<?php echo url_for('category/new') ?>">
    <i class="icon-pencil icon-white"></i>
    Nouveau
</a>
