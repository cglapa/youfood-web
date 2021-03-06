<?php slot('title', 'Créer une salle') ?>

<ul class="breadcrumb">
    <li>
        <?php echo link_to('Liste des restaurants', 'zone') ?><span class="divider">></span>
    </li>
    <li>
        <?php echo link_to('Salles du restaurant '.$zone->getName(), 'zone_detail', $zone) ?><span class="divider">></span>
    </li>
    <li class="active">
        Créer une nouvelle salle dans la zone <?php echo $zone->getName() ?>
    </li>
</ul>
<div class="page-header">
    <h1>Nouvelle salle</h1>
</div>

<?php include_partial('form', array('form' => $form, 'zone' => $zone)) ?>
