<ul class="breadcrumb">
    <li>
        <?php echo link_to('Liste des restaurants', 'zone') ?><span class="divider">></span>
    </li>
    <li>
        <?php echo link_to('Salles du restaurant '.strtolower($zone->getName()), 'zone_detail', $zone) ?><span class="divider">></span>
    </li>
    <li class="active">
        Liste des tables de la salle <?php echo strtolower($dining_room->getName()) ?>
    </li>
</ul>

<div class="page-header">
    <h1>Tables de la salle <?php echo strtolower($dining_room->getName()) ?></h1>
</div>

<table class="table table-striped">
  <tbody>
    <?php foreach ($dining_tables as $dining_table): ?>
    <tr>
      <td><?php echo $dining_table->getName() ?></td>
      <td><?php echo $dining_table->getSeats() ?> place<?php if($dining_table->getSeats() > 1) echo 's'?></td>
      <td style="text-align: right">
            <?php echo link_to(
                    '<i class="icon-cog icon-white"></i> Modifier', 
                    'dining_table_edit',
                    $dining_table, array('method' => 'get', 'class' => 'btn btn-info'))?>
            <?php echo link_to(
                    '<i class="icon-remove icon-white"></i> Supprimer', 
                    'dining_table_delete', 
                    $dining_table, array('method' => 'delete', 'class' => 'btn btn-danger','confirm' => "Voulez vous vraiment supprimer la table ".strtolower($dining_table->getName())." ?")) ?>
        </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a class="btn btn-success" href="<?php echo url_for('dining_table_new', $dining_room) ?>">
      <i class="icon-pencil icon-white"></i>
      Nouveau
</a>