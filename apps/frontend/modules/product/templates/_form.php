<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

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
