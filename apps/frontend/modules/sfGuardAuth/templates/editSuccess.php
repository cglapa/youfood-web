<?php slot('title', 'Modifier un serveur') ?>

<div class="page-header">
    <h1>Modifier le serveur <?php echo $user->getFirstName()." ".$user->getLastName() ?></h1>
</div>

<form id="form" action="<?php echo url_for('sf_guard_update', $user) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <input type="hidden" name="sf_method" value="put" />
  <table class="table table-striped">
    <?php echo $form ?>
    <tr>
      <td colspan="2">
          <a href="<?php echo url_for('sf_guard_list') ?>" class="btn btn-inverse">
              <i class="icon-arrow-left icon-white"></i>
              Retour
          </a>
          <a class="btn btn-success" href="#" onclick="document.getElementById('form').submit()">
              <i class="icon-ok icon-white"></i>
              Créer !
          </a>
          <input type="submit" style="visibility: hidden" />
      </td>
    </tr>
  </table>
</form>