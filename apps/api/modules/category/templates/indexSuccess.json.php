[
<?php $nb = count($categorys); $i = 0; foreach ($categorys as $category): ++$i ?>
"category": {
<?php $nb1 = count($category); $j = 0; foreach ($category as $key => $value): ++$j ?>
  "<?php echo $key ?>": <?php echo json_encode($value).($nb1 == $j ? '' : ',') ?>
 
<?php endforeach ?>
}<?php echo $nb == $i ? '' : ',' ?>
 
<?php endforeach ?>
]