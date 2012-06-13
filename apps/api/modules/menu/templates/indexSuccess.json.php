{
  "status": "<?php echo ($tablet ? 'ok' : 'nok')?>"<?php if($tablet): ?>,
  "category": [
  <?php $nb = count($categorys); $i = 0; foreach ($categorys as $category): ++$i ?>
      {
    <?php $nb1 = count($category); $j = 0; foreach ($category as $key => $value): ++$j ?>
    <?php if($key != 'product'): ?>
      "<?php echo $key ?>": <?php echo json_encode($value).($nb1 == $j ? '' : ',') ?>
      
    <?php else: ?>
      "product": [
      <?php $nb2 = $value->count(); $k = 0; foreach ($value as $products): ++$k?>
            {
            <?php $nb3 = $products->count(); $l = 0; foreach ($products as $keyP => $valueP): ++$l;?>
            "<?php echo $keyP ?>": <?php echo json_encode($valueP)?><?php echo $nb3 == $l ? '' : ',' ?>
            
            <?php endforeach; ?>
      }<?php echo $nb2 == $k ? '' : ',' ?>
      
      <?php endforeach; ?>
      
              ]
    <?php endif; ?>
<?php endforeach ?>
    }<?php echo $nb == $i ? '' : ',' ?>
        
<?php endforeach ?>
  ]
  <?php endif; ?>
  
}