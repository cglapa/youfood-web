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
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a class="btn btn-success" href="<?php echo url_for('category/new') ?>">
    <i class="icon-pencil icon-white"></i>
    Nouveau
</a>
