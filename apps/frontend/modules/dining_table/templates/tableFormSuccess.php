<select id="<?php echo $androidId ?>">
    <?php foreach ($dining_tables as $dining_table): ?>
    <option value="<?php echo $dining_table->getId() ?>">
        <?php echo $dining_table->getDiningRoom()->getName()." - ".$dining_table->getName() ?>
    </option>
    <?php endforeach; ?>
</select>
<a class="btn btn-success" href="#" onclick="association(<?php echo $androidId ?>)">
    <i class="icon-ok icon-white"></i>
</a>