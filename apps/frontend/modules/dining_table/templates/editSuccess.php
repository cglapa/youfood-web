<ul class="breadcrumb">
    <li>
        <?php echo link_to('Liste des restaurants', 'zone') ?><span class="divider">></span>
    </li>
    <li>
        <?php echo link_to('Salles du restaurant '.strtolower($zone->getName()), 'zone_detail', $zone) ?><span class="divider">></span>
    </li>
    <li>
        <?php echo link_to('Liste des tables de la salle '.strtolower($dining_room->getName()), 'dining_room_detail', $dining_room) ?><span class="divider">></span>
    </li>
    <li class="active">
        Modifier la table <?php echo strtolower($dining_table->getName()) ?>
    </li>
</ul>

<div class="page-header">
    <h1>Modifier la table <?php echo strtolower($dining_table->getName()) ?></h1>
</div>

<?php include_partial('form', array('form' => $form, 'dining_room' => $dining_room, 'dining_table' => $dining_table)) ?>
