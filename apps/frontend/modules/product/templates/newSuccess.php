<?php slot('title', 'Créer un plat') ?>

<ul class="breadcrumb">
    <li>
        <a href="<?php echo url_for('category')?>">Liste des cat&eacute;gories</a><span class="divider">></span>
    </li>
    <li>
        <a href="<?php echo url_for('category_detail', $category) ?>"><?php echo $category->getName() ?></a><span class="divider">></span>
    </li>
    <li class="active">
        Créer un plat
    </li>
</ul>

<div class="page-header">
    <h1>Créer un plat</h1>
</div>

<?php include_partial('form', array('form' => $form, 'category' => $category)) ?>
