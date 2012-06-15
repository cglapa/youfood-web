<div class="page-header">
    <h1>Ajouter un produit au menu <?php echo strtolower($menu->getName()) ?></h1>
</div>

<?php include_partial('form', array('form' => $form, 'menu' => $menu)) ?>
