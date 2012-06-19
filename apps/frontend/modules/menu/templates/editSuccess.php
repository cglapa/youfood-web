<?php slot('title', 'Modifier un menu') ?>

<ul class="breadcrumb">
    <li>
        <a href="<?php echo url_for('menu')?>">Liste des menus</a><span class="divider">></span>
    </li>
    <li class="active">
        <a href="<?php echo url_for('menu_new') ?>">Modifier le menu <?php echo $form->getObject()->getName() ?></a>
    </li>
</ul>


<div class="page-header">
    <h1>Modifier le menu <?php echo strtolower($form->getObject()->getName()) ?></h1>
</div>

<?php include_partial('form', array('form' => $form)) ?>
