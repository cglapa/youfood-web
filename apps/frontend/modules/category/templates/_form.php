<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('category/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped">
    <tfoot>
      <tr>
        <td colspan="2">
          <a href="<?php echo url_for('category/index') ?>" class="btn btn-inverse">
              <i class="icon-arrow-left icon-white"></i>
              Retour
          </a>
          <button type="submit" class="btn btn-success">
              <i class="icon-pencil icon-white"></i>
              <?php echo ($form->getObject()->isNew() ? 'Créer' : 'Modifier') ?>
          </button>
          <?php if($form->getObject()->isNew()): ?>
          <button type="submit" class="btn btn-info" name="again" value="true">
              <i class="icon-pencil icon-white"></i>
              Créer et encore
          </button>  
          <?php endif; ?>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
