<ul class="breadcrumb">
    <li class="active">
        <?php echo link_to('Requêtes d\'association', 'tablet_request')?><span class="divider">|</span>
    </li>
    <li>
        <?php echo link_to('Tablettes associées', 'tablet')?>
    </li>
</ul>

<div class="page-header">
    <h1>Requêtes d'association</h1>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Identifiant</th>
      <th>Dernière activité</th>
      <th>Table</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tablets as $tablet): ?>
    <tr>
      <td><?php echo $tablet->getAndroidId() ?></td>
      <td><?php echo ($tablet->getLastCheck() ? $tablet->getDateTimeObject('last_check')->format('d/m/Y H:i') : $tablet->getDateTimeObject('created_at')->format('d/m/Y H:i')) ?></td>
      <td>
          <form id="form_<?php echo $tablet->getAndroidId() ?>" action="<?php echo url_for('tablet_association') ?>" method="post">
              <input type="hidden" value="<?php echo $tablet->getAndroidId() ?>" name="id" />
              <select name="dining_table_id">
                  <?php foreach ($dining_tables as $dining_table): ?>
                    <option value="<?php echo $dining_table->getId() ?>"><?php echo $dining_table->getName() ?></option>
                  <?php endforeach; ?>
              </select>
          </form>
      </td>
      <td>
          <a href="#" class="btn btn-success" onclick="document.getElementById('form_<?php echo $tablet->getAndroidId() ?>').submit()">
              <i class="icon-ok icon-white"></i>
              Valider
          </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
