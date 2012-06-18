<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table class="table table-striped">
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
            <button class="btn btn-info" type="submit">
                <i class="icon-ok icon-white"></i>
                Se connecter
            </button>
        </td>
      </tr>
    </tfoot>
  </table>
</form>