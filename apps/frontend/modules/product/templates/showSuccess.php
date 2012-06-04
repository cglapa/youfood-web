<ul class="breadcrumb">
    <li>
        <a href="<?php echo url_for('@homepage')?>">Liste des cat&eacute;gories</a><span class="divider">></span>
    </li>
    <li>
        <a href="<?php echo url_for('category_detail', $category)?>">Liste des plats <?php echo strtolower($category->getName()) ?></a><span class="divider">></span>
    </li>
    <li class="active">
        <?php echo $product->getName() ?>
    </li>
</ul>

<h1 class="page-header"><?php echo $product->getName() ?></h1>

<p>
    Le plat <?php echo $product->getName() ?> fait partie de la categorie <?php echo $category->getName() ?>
    <br /><br />
    <?php echo $product->getDescription() ?> 
</p>

<hr />

<a href="<?php echo url_for('product/edit?id='.$product->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('product/index') ?>">List</a>
