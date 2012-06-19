<?php slot('title', 'Statistique') ?>

<ul class="breadcrumb">
    <li class="active">
        <a href="<?php echo url_for('stats') ?>">Statistique de vente</a>
    </li>
</ul>

<div class="page-header">
    <h1>Statistique de vente</h1>
</div>

<table class="table table-striped">
    <tbody>
        <?php foreach ($zones as $zone): ?>
        <tr>
            <td><strong><?php echo $zone->getName() ?></strong></td>
            <form action="<?php echo url_for('stats_zone', $zone)?>" method="post">
                <td>

                        <select name="category">
                            <option value="0">Toutes</option>
                            <?php foreach ($categorys as $category): ?>
                            <option value="<?php echo $category->getId() ?>"><?php echo $category->getName() ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" style="visibility: hidden" />


                </td>
                <td style="text-align: left">
                    <button class="btn btn-info" type="submit">
                        <i class="icon-ok icon-white"></i>
                        Valider
                    </button>

                </td>
            </form>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>