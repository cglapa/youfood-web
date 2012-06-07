<?php foreach ($table_orders as $table_order): ?>
    <tr onclick="window.location.href='<?php echo url_for('table_order_detail', $table_order)?>'">
        <td><?php echo link_to($table_order->getId(), 'table_order_detail', $table_order) ?></td>
        <td><?php echo $table_order->getDiningTable() ?></td>
        <td><?php echo $table_order->getDateTimeObject('created_at')->format('H:i') ?></td>
    </tr>
<?php endforeach; ?>