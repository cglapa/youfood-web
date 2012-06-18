<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php //echo $form->renderFormTag(($form->getObject()->isNew() ? 'product_create' : 'product_update')) ?>
<form action="<?php echo url_for(($form->getObject()->isNew() ? 'product_create' : 'product_update'), ($form->getObject()->isNew() ? $category : $product)) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped">
    <tfoot>
      <tr>
        <td colspan="2">
          <a href="<?php echo url_for('category_detail', $category) ?>" class="btn btn-inverse">
              <i class="icon-arrow-left icon-white"></i>
              Retour
          </a>
          <button type="submit" class="btn btn-success">
              <i class="icon-white icon-pencil"></i>
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
