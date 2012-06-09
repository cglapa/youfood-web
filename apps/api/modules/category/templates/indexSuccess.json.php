{
  "category": [
<?php $nb = count($categorys); $i = 0; foreach ($categorys as $category): ++$i ?>
    {
<?php $nb1 = count($category); $j = 0; foreach ($category as $key => $value): ++$j ?>
      "<?php echo $key ?>": <?php echo json_encode($value).($nb1 == $j ? '' : ',') ?>
 
<?php endforeach ?>
    }<?php echo $nb == $i ? '' : ',' ?>
 
<?php endforeach ?>
  ],
  "product": [
<?php $nb = count($products); $i = 0; foreach ($products as $product): ++$i ?>
    {
<?php $nb1 = count($product); $j = 0; foreach ($product as $key => $value): ++$j ?>
      "<?php echo $key ?>": <?php echo json_encode($value).($nb1 == $j ? '' : ',') ?>
 
<?php endforeach ?>
    }<?php echo $nb == $i ? '' : ',' ?>
 
<?php endforeach ?>
  ]
}