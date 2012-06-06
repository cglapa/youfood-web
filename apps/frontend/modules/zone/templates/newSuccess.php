<ul class="breadcrumb">
    <li>
        <?php echo link_to('Liste des zones', 'zone') ?><span class="divider">></span>
    </li>
    <li class="active">
        Créer une zone
    </li>
</ul>
<div class="page-header">
    <h1>Créer une zone</h1>
</div>

<?php include_partial('form', array('form' => $form)) ?>
