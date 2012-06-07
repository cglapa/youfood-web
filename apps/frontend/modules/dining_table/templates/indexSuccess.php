<div class="page-header">
    <h1>Tables de la salle <?php echo $dining_room->getName() ?></h1>
</div>

<table class="table table-striped">
  <tbody>
    <?php foreach ($dining_tables as $dining_table): ?>
    <tr>
      <td><a href="<?php echo url_for('dining_table/show?id='.$dining_table->getId()) ?>"><?php echo $dining_table->getName() ?></a></td>
      <td><?php echo $dining_table->getSeats() ?> place<?php if($dining_table->getSeats() > 1) echo 's'?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('dining_table/new') ?>">New</a>
