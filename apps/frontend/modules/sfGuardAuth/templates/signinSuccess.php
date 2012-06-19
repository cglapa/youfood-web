<?php use_helper('I18N') ?>
<?php slot('title', 'Connexion') ?>

<div class="page-header">
    <h1>Se connecter</h1>
</div>

<?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>