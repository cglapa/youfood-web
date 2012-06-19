<?php slot('title', 'Créer un restaurant') ?>

<ul class="breadcrumb">
    <li>
        <?php echo link_to('Liste des restaurants', 'zone') ?><span class="divider">></span>
    </li>
    <li class="active">
        Créer un restaurant
    </li>
</ul>
<div class="page-header">
    <h1>Créer un restaurant</h1>
</div>

<?php include_partial('form', array('form' => $form)) ?>
