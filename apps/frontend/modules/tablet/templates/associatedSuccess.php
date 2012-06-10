<ul class="breadcrumb">
    <li>
        <?php echo link_to('Requêtes d\'association', 'tablet_request')?><span class="divider">|</span>
    </li>
    <li class="active">
        <?php echo link_to('Tablettes associées', 'tablet')?>
    </li>
</ul>

<div class="page-header">
    <h1>Tablettes associées</h1>
</div>

<table class="table table-striped">
    <thead>
        <th>Identifiant</th>
        <th>Table</th>
    </thead>
    <tbody>
        <?php foreach($tablets as $tablet): ?>
        <tr>
            <td><?php echo $tablet->getAndroidId() ?></td>
            <td><?php echo $tablet->getDiningTable() ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>