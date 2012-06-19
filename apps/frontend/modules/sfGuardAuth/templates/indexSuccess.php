<?php slot('title', 'Liste des serveurs') ?>

<div class="page-header">
    <h1>Liste des serveurs</h1>
</div>

<table class="table table-striped">
    <thead>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Identifiant</th>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user->getFirstName() ?></td>
            <td><?php echo $user->getLastName() ?></td>
            <td><?php echo $user->getUsername() ?></td>
            <td style="text-align: right; width: 23%" >
                <a href="<?php echo url_for('sf_guard_edit', $user)?>" class="btn btn-info">
                    <i class="icon-cog icon-white"></i>
                    Modifier
                </a>
                <?php echo link_to(
                    '<i class="icon-remove icon-white"></i> Supprimer', 
                    'sf_guard_delete', 
                    $user, array('method' => 'delete', 'class' => 'btn btn-danger','confirm' => "Voulez vous vraiment supprimer le serveur ".strtolower($user->getFirstName())." ".$user->getLastName()." ?")) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?php echo url_for('sf_guard_register')?>" class="btn btn-success">
    <i class="icon-pencil icon-white"></i>
    Nouveau
</a>