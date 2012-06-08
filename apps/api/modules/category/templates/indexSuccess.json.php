[
<?php $nb = count($products); $i = 0; foreach ($products as $product): ++$i ?>
"category": {
<?php $nb1 = count($product); $j = 0; foreach ($product as $key => $value): ++$j ?>
  "<?php echo $key ?>": <?php echo json_encode($value).($nb1 == $j ? '' : ',') ?>
 
<?php endforeach ?>
}<?php echo $nb == $i ? '' : ',' ?>
 
<?php endforeach ?>
]