<form action="<?php echo url_for('tablet_association') ?>" method="post" id="form_<?php echo $androidId ?>_gritter">
    <input type="hidden" name="id" value="<?php echo $androidId ?>" />
    <select name="dining_table_id">
        <?php foreach ($dining_tables as $dining_table): ?>
        <option value="<?php echo $dining_table->getId() ?>">
            <?php echo $dining_table->getDiningRoom()->getName()." - ".$dining_table->getName() ?>
        </option>
        <?php endforeach; ?>
    </select>
    <a class="btn btn-success" href="#" onclick="document.getElementById('form_<?php echo $androidId ?>_gritter').submit()">
        <i class="icon-ok icon-white"></i>
    </a>
</form>