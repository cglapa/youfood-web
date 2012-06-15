<ul class="breadcrumb">
    <li class="active">
        <a href="<?php echo url_for('menu')?>">Liste des menus</a>
    </li>
</ul>

<div class="page-header">
    <h1>Liste des menus</h1>
</div>

<table class="table table-striped">
  <tbody>
    <?php foreach ($menus as $menu): ?>
    <tr>
        <td><a href="<?php echo url_for('menu_detail', $menu)?>"><?php echo $menu->getName() ?></a></td>
      <td style="text-align: right">
          <?php if($menu->getIsAvailable()): ?>
          <span class="btn btn-primary">
              <i class="icon-book icon-white"></i>
              Menu principal
          </span>
          <?php else: ?>
          <?php echo link_to(
                  '<i class="icon-file"></i> Définir comme menu principal',
                  'main_menu',
                  $menu,
                  array(
                     'method' => 'put',
                     'class' => 'btn'
                  )); ?>
          <?php endif; ?>
          <a class="btn btn-info" href="<?php echo url_for('menu_edit', $menu) ?>">
              <i class="icon-cog icon-white"></i>
              Modifier
          </a>
          <?php echo link_to(
                  '<i class="icon-remove icon-white"></i> Supprimer',
                  'menu_delete',
                  $menu,
                  array(
                     'method' => 'delete',
                     'class' => 'btn btn-danger'
                  )); ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('menu_new') ?>" class="btn btn-success">
    <i class="icon-ok icon-white"></i>
    Nouveau
</a>
