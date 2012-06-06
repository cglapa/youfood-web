<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $zone->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $zone->getName() ?></td>
    </tr>
    <tr>
      <th>Dining room:</th>
      <td><?php echo $zone->getDiningRoomId() ?></td>
    </tr>
    <tr>
      <th>Dining table:</th>
      <td><?php echo $zone->getDiningTableId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('zone/edit?id='.$zone->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('zone/index') ?>">List</a>
