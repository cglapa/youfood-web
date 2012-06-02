<ul class="breadcrumb">
    <li>
        <a href="<?php echo url_for('@homepage')?>">Liste des cat&eacute;gories</a><span class="divider">></span>
    </li>
    <li class="active">
        liste des plats <?php echo strtolower($category->getName()) ?>
    </li>
</ul>
<div class="page-header">
    <h1>Liste des plats <?php echo strtolower($category->getName()) ?></h1>
</div>

<table class="table table-striped">
  <tbody>
    <?php foreach ($products as $product): ?>
    <tr>
      <td><a href="<?php echo url_for('product/show?id='.$product->getId()) ?>"><?php echo $product->getName() ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-success" href="<?php echo url_for('product/new') ?>">
      <i class="icon-pencil icon-white"></i>
      Nouveau
  </a>
