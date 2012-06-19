<?php slot('title', 'Modifier une salle') ?>

<ul class="breadcrumb">
    <li>
        <?php echo link_to('Liste des restaurants', 'zone') ?><span class="divider">></span>
    </li>
    <li>
        <?php echo link_to('Salles du restaurant '.$zone->getName(), 'zone_detail', $zone) ?><span class="divider">></span>
    </li>
    <li class="active">
        Modifier la salle <?php echo $dining_room->getName() ?>
    </li>
</ul>

<div class="page-header">
    <h1>Modifier la salle <?php echo $form->getObject('name') ?></h1>
</div>

<?php include_partial('form', array('form' => $form, 'dining_room' => $dining_room, 'zone' => $zone)) ?>
