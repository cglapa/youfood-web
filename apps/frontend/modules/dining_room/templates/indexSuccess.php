<?php slot('title', 'Salles d\'un restaurant') ?>

<ul class="breadcrumb">
    <li>
        <?php echo link_to('Liste des restaurants', 'zone') ?><span class="divider">></span>
    </li>
    <li class="active">
        Salles du restaurant <?php echo $zone->getName() ?>
    </li>
</ul>
<div class="page-header">
    <h1>Salles du restaurant <?php echo $zone->getName() ?></h1>
</div>

<table class="table table-striped">
  <tbody>
    <?php foreach ($dining_rooms as $dining_room): ?>
    <tr>
      <td><?php echo link_to($dining_room->getName(), 'dining_room_detail', $dining_room) ?></td>
      <td style="text-align: right">
            <?php echo link_to(
                    '<i class="icon-cog icon-white"></i> Modifier', 
                    'dining_room_edit',
                    $dining_room, array('method' => 'get', 'class' => 'btn btn-info'))?>
            <?php echo link_to(
                    '<i class="icon-remove icon-white"></i> Supprimer', 
                    'dining_room_delete', 
                    $dining_room, array('method' => 'delete', 'class' => 'btn btn-danger','confirm' => "Voulez vous vraiment supprimer la salle ".strtolower($dining_room->getName())." ?")) ?>
        </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a class="btn btn-success" href="<?php echo url_for('dining_room_new', $zone) ?>">
      <i class="icon-pencil icon-white"></i>
      Nouveau
</a>
