<?php slot('title', 'Liste de restaurants') ?>

<ul class="breadcrumb">
    <li class="active">
        Liste des restaurants
    </li>
</ul>
<div class="page-header">
    <h1>Liste des restaurants</h1>
</div>
<table class="table table-striped">
  <tbody>
    <?php foreach ($zones as $zone): ?>
    <tr>
      <td><?php echo link_to($zone->getName(), 'zone_detail', $zone) ?></td>
      <td style="text-align: right">
            <?php echo link_to(
                    '<i class="icon-cog icon-white"></i> Modifier', 
                    'zone_edit',
                    $zone, array('method' => 'get', 'class' => 'btn btn-info'))?>
            <?php echo link_to(
                    '<i class="icon-remove icon-white"></i> Supprimer', 
                    'zone_delete', 
                    $zone, array('method' => 'delete', 'class' => 'btn btn-danger','confirm' => "Voulez vous vraiment supprimer la zone ".strtolower($zone->getName())." ?")) ?>
        </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a class="btn btn-success" href="<?php echo url_for('zone_new') ?>">
      <i class="icon-pencil icon-white"></i>
      Nouveau
</a>