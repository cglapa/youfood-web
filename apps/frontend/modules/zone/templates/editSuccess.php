<?php slot('title', 'Modifier un restaurant') ?>

<ul class="breadcrumb">
    <li>
        <?php echo link_to('Liste des restaurants', 'zone') ?><span class="divider">></span>
    </li>
    <li class="active">
        Modifier le restaurant <?php echo strtolower($form->getObject('name')) ?>
    </li>
</ul>
<div class="page-header">
    <h1>Modifier le restaurant <?php echo strtolower($form->getObject('name')) ?></h1>
</div>

<?php include_partial('form', array('form' => $form)) ?>
