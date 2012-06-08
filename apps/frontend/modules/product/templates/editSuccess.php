<ul class="breadcrumb">
    <li>
        <a href="<?php echo url_for('@homepage')?>">Liste des cat&eacute;gories</a><span class="divider">></span>
    </li>
    <li>
        <a href="<?php echo url_for('category_detail', $product) ?>"><?php echo $product->getName() ?></a><span class="divider">></span>
    </li>
    <li class="active">
        Modifier le plat <?php echo strtolower($product->getName()) ?>
    </li>
</ul>

<div class="page-header">
    <h1>Modifier un plat</h1>
</div>

<?php include_partial('form', array('form' => $form, 'category' => $product, 'product' => $product)) ?>
