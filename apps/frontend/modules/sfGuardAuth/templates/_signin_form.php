<?php use_helper('I18N') ?>

<form id="form" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table class="table table-striped">
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
            <a href="#" class="btn btn-info" onclick="document.getElementById('form').submit()">
                <i class="icon-ok icon-white"></i>
                Se connecter
            </a>
            <input type="submit" style="visibility: hidden" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>