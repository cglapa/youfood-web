<ul class="breadcrumb">
    <li>
        <a href="<?php echo url_for('@homepage')?>">Liste des cat&eacute;gories</a><span class="divider">></span>
    </li>
    <li>
        <a href="<?php echo url_for('category_detail', $category)?>"><?php echo $category->getName() ?></a><span class="divider">></span>
    </li>
    <li class="active">
        <?php echo $product->getName() ?>
    </li>
</ul>

<div class="page-header">
    <h1><?php echo $category->getName() ?></h1>
</div>

<p>
    Le plat <?php echo $category->getName() ?> fait partie de la categorie <?php echo $category->getName() ?>
    <br /><br />
    <?php echo $category->getDescription() ?> 
</p>

<hr />

<a href="<?php echo url_for('category_detail', $category) ?>" class="btn btn-inverse">
    <i class="icon-arrow-left icon-white"></i>
    Retour
</a>
<a href="<?php echo url_for('product/edit?id='.$product->getId()) ?>" class="btn btn-info">
    <i class="icon-cog icon-white"></i>
    Modifier
</a>
<?php echo link_to(
        '<i class="icon-remove icon-white"></i> Supprimer', 
        'product_delete', 
        $product,
        array('method' => 'delete', 'class' => 'btn btn-danger','confirm' => "Voulez vous vraiment supprimer le plat ".strtolower($product->getName())." ?"))?>
</a>

