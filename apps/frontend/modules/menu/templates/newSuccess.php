<?php slot('title', 'Créer un menu') ?>

<ul class="breadcrumb">
    <li>
        <a href="<?php echo url_for('menu')?>">Liste des menus</a><span class="divider">></span>
    </li>
    <li class="active">
        <a href="<?php echo url_for('menu_new') ?>">Créer un nouveau menu</a>
    </li>
</ul>

<div class="page-header">
    <h1>Nouveau menu</h1>
</div>

<?php include_partial('form', array('form' => $form)) ?>
