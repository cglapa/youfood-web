<?php foreach ($table_orders as $table_order): ?>
    <tr>
        <td><?php echo link_to($table_order->getId(), 'table_order_detail', $table_order) ?></td>
        <td><?php echo $table_order->getDiningTable() ?></td>
        <td><?php echo $table_order->getDateTimeObject('created_at')->format('H:i') ?></td>
        <td style="text-align: right;"><?php echo link_to(
                    '<i class="icon-'.($table_order->getIsClosed() ? 'edit' : 'lock').' icon-white"></i> '.($table_order->getIsClosed() ? 'Ouvrir' : 'Clôturer'), 
                    '@table_order_close?id='.$table_order->getId().'&all='.($all ? 'all' : '0'), 
                    array('method' => 'get', 'class' => 'btn btn-'.($table_order->getIsClosed() ? 'primary' : 'warning')))?></td>
    </tr>
<?php endforeach; ?>