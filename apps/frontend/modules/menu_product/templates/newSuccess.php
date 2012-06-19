<?php slot('title', 'Ajouter un produit') ?>

<ul class="breadcrumb">
    <li>
        <a href="<?php echo url_for('menu')?>">Liste des menus</a><span class="divider">></span>
    </li>
    <li>
        <a href="<?php echo url_for('menu_detail', $menu)?>">Liste des plats du menu <?php echo $menu->getName() ?></a><span class="divider">></span>
    </li>
    <li class="active">
        Ajouter un produit au menu <?php echo $menu->getName() ?>
    </li>
</ul>

<div class="page-header">
    <h1>Ajouter un produit au menu <?php echo $menu->getName() ?></h1>
</div>

<?php include_partial('form', array('form' => $form, 'menu' => $menu)) ?>
