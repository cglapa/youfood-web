<?php slot('title', 'Tablettes associées') ?>

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
        <th></th>
    </thead>
    <tbody>
        <?php foreach($tablets as $tablet): ?>
        <tr>
            <td><?php echo $tablet->getAndroidId() ?></td>
            <td><?php echo $tablet->getDiningTable() ?></td>
            <td style="text-align: right">
                <a class="btn btn-danger" href="<?php echo url_for('tablet_remove', $tablet)?>">
                    <i class="icon-remove icon-white"></i>
                    Supprimer
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>