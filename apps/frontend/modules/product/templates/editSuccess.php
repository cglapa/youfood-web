<ul class="breadcrumb">
    <li>
        <a href="<?php echo url_for('category')?>">Liste des cat&eacute;gories</a><span class="divider">></span>
    </li>
    <li>
        <a href="<?php echo url_for('category_detail', $category) ?>"><?php echo $category->getName() ?></a><span class="divider">></span>
    </li>
    <li class="active">
        Modifier le plat <?php echo strtolower($category->getName()) ?>
    </li>
</ul>

<div class="page-header">
    <h1>Modifier un plat</h1>
</div>

<?php include_partial('form', array('form' => $form, 'category' => $category, 'product' => $product)) ?>
