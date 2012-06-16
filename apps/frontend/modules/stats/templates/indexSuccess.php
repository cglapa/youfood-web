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
            <td>
                <form id="category_<?php echo $zone->getId() ?>" action="<?php echo url_for('stats_zone', $zone)?>" method="post">
                    <select name="category">
                        <option value="0">Toutes</option>
                        <?php foreach ($categorys as $category): ?>
                        <option value="<?php echo $category->getId() ?>"><?php echo $category->getName() ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="submit" style="visibility: hidden" />
                </form>
                
            </td>
            <td style="text-align: left">
                <a class="btn btn-info" href="#" onclick="document.getElementById('category_<?php echo $zone->getId() ?>').submit()">
                    <i class="icon-ok icon-white"></i>
                    Valider
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>