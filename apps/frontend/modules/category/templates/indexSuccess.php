<?php slot('title', 'Catégories') ?>

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
    <?php foreach ($categorys as $category): ?>
    <tr>
        <td><a href="<?php echo url_for('category_detail', $category) ?>"><?php echo $category->getName() ?></a></td>
        <td style="text-align: right">
            <?php echo link_to(
                    '<i class="icon-cog icon-white"></i> Modifier', 
                    'category_edit', 
                    $category, array('method' => 'get', 'class' => 'btn btn-info')) ?>
            <?php echo link_to(
                    '<i class="icon-remove icon-white"></i> Supprimer', 
                    'category_delete', 
                    $category, array('method' => 'delete', 'class' => 'btn btn-danger','confirm' => "Voulez vous vraiment supprimer la catégorie ".strtolower($category->getName())." ?")) ?>
        </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a class="btn btn-success" href="<?php echo url_for('category/new') ?>">
    <i class="icon-pencil icon-white"></i>
    Nouveau
</a>
