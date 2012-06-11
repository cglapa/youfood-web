<?php
/* On doit inclure manuellement
l'action du plugin car l'autoloading ne fonctionne pas dans ce cas. */
require_once(sfConfig::get('sf_plugins_dir').
'/sfDoctrineGuardPlugin/modules/sfGuardAuth/lib/BasesfGuardAuthActions.class.php');

/* Notre action dérive de celle fournie par le module
    afin d'hériter de ses actions propres. */
class sfGuardAuthActions extends BasesfGuardAuthActions
{
  public function executeRegister($request) {
    /* Passe le formulaire à la vue. */
    $this->form = new sfGuardRegisterForm();

    /* Si l'action est appelé via la méthode POST... */
    if ($request->isMethod('post')) {
      $this->form->bind(
        $request->getParameter('sf_guard_user')
      );

      /* ...et que les données sont valides */
      if ($this->form->isValid()) {

        /* On crée l'utilisateur */
        $sf_guard_user = $this->form->save();

        $this->redirect('@homepage');
      }
      /* Sinon le formulaire ainsi que l'erreur sera ré-affiché */
    }
  }
}
?>