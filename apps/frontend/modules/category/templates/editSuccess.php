<ul class="breadcrumb">
    <li>
        <a href="<?php echo url_for('category')?>">Liste des cat&eacute;gories</a><span class="divider">></span>
    </li>
    <li class="active">
        Modifier une catégorie
    </li>
</ul>

<div class="page-header">
    <h1>Modifier une catégorie</h1>
</div>

<?php include_partial('form', array('form' => $form)) ?>
