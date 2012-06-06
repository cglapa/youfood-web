<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $dining_table->getId() ?></td>
    </tr>
    <tr>
      <th>Seats:</th>
      <td><?php echo $dining_table->getSeats() ?></td>
    </tr>
    <tr>
      <th>Zone:</th>
      <td><?php echo $dining_table->getZoneId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('dining_table/edit?id='.$dining_table->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('dining_table/index') ?>">List</a>
