<div class="page-header">
    <h1>Création d'un compte serveur</h1>
</div>

<form id="form" action="<?php echo url_for('sfGuardAuth/register') ?>" method="POST">
  <table class="table table-striped">
    <?php echo $form ?>
    <tr>
      <td colspan="2">
          <a href="<?php echo url_for('sf_guard_list') ?>" class="btn btn-inverse">
              <i class="icon-arrow-left icon-white"></i>
              Retour
          </a>
          <button class="btn btn-success" type="submit">
              <i class="icon-ok icon-white"></i>
              Créer !
          </button>
          <?php if($form->getObject()->isNew()): ?>
          <button type="submit" class="btn btn-info" name="again" value="true">
              <i class="icon-pencil icon-white"></i>
              Créer et encore
          </button>  
          <?php endif; ?>
      </td>
    </tr>
  </table>
</form>
