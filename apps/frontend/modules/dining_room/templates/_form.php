<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form id="form" action="<?php echo url_for('dining_room_'.($form->getObject()->isNew() ? 'create' : 'update'), ($form->getObject()->isNew() ? $zone : $dining_room)) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped">
    <tfoot>
      <tr>
        <td colspan="2">
          <a href="<?php echo url_for('zone_detail', $zone) ?>" class="btn btn-inverse">
              <i class="icon-arrow-left icon-white"></i>
              Retour
          </a>
          <a href="#" onclick="document.getElementById('form').submit()" class="btn btn-success">
              <i class="icon-white icon-pencil"></i>
              <?php echo ($form->getObject()->isNew() ? 'Créer' : 'Modifier') ?>
          </a>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
