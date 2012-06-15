<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form id="form" action="<?php echo url_for('menu_product_'.($form->getObject()->isNew() ? 'create' : 'update'), $menu) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped">
    <tfoot>
      <tr>
        <td colspan="2">
          <a href="<?php echo url_for('menu_detail', $menu) ?>" class="btn btn-inverse">
              <i class="icon-arrow-left icon-white"></i>
              Retour
          </a>
            <a href="#" class="btn btn-success" onclick="document.getElementById('form').submit()">
                <i class="icon-pencil icon-white"></i>
                <?php echo ($form->getObject()->isNew() ? 'Ajouter' : 'Modifier')?>
            </a>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
