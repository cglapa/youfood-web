<?php if($table_orders->count() > 0): ?>
<?php $nb = $table_orders->count(); $i = 0; ?>
{
    "table_order": [
    <?php foreach ($table_orders as $table_order): ++$i ?>
    
        {
            "id": <?php echo json_encode($table_order->getId()) ?>,
            "dining_table": <?php echo json_encode($table_order->getDiningTable()->getName()) ?>,
            "created_at": <?php echo json_encode($table_order->getDateTimeObject('created_at')->format('H:i')) ?>,
            "is_new": "<?php echo json_encode($table_order->getIsNew()) ?>"
      
        }<?php echo $nb == $i ? '' : ',' ?><?php endforeach; ?>
        
    ]
}
<?php endif; ?>