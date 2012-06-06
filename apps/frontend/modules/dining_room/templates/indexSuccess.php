<div class="page-header">
    <h1>Liste des salles</h1>
</div>

<table class="table table-striped">
  <tbody>
    <?php foreach ($dining_rooms as $dining_room): ?>
    <tr>
      <td><?php echo $dining_room->getName() ?></td>
      <td style="text-align: right">
            <?php echo link_to(
                    '<i class="icon-cog icon-white"></i> Modifier', 
                    'dining_room_edit',
                    $dining_room, array('method' => 'get', 'class' => 'btn btn-info'))?>
            <?php echo link_to(
                    '<i class="icon-remove icon-white"></i> Supprimer', 
                    'dining_room_delete', 
                    $dining_room, array('method' => 'delete', 'class' => 'btn btn-danger','confirm' => "Voulez vous vraiment supprimer le plat ".strtolower($dining_room->getName())." ?")) ?>
        </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a class="btn btn-success" href="<?php echo url_for('dining_room_new') ?>">
      <i class="icon-pencil icon-white"></i>
      Nouveau
  </a>
