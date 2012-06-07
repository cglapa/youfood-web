<ul class="breadcrumb">
    <li>
        <?php echo link_to('Liste des zones', 'zone') ?><span class="divider">></span>
    </li>
    <li>
        <?php echo link_to('Salles de la zone '.strtolower($zone->getName()), 'zone_detail', $zone) ?><span class="divider">></span>
    </li>
    <li class="active">
        Créer une nouvelle salle dans la zone <?php echo strtolower($zone->getName()) ?>
    </li>
</ul>
<div class="page-header">
    <h1>Nouvelle salle</h1>
</div>

<?php include_partial('form', array('form' => $form, 'zone' => $zone)) ?>
