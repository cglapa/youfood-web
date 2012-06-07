<ul class="breadcrumb">
    <li>
        <?php echo link_to('Liste des zones', 'zone') ?><span class="divider">></span>
    </li>
    <li>
        <?php echo link_to('Salles de la zone '.strtolower($zone->getName()), 'zone_detail', $zone) ?><span class="divider">></span>
    </li>
    <li>
        <?php echo link_to('Liste des tables de la salle '.strtolower($dining_room->getName()), 'dining_room_detail', $dining_room) ?><span class="divider">></span>
    </li>
    <li class="active">
        Nouvelle table
    </li>
</ul>

<div class="page-header">
    <h1>Nouvelle table</h1>
</div>

<?php include_partial('form', array('form' => $form, 'dining_room' => $dining_room)) ?>
