<?php
/* On doit inclure manuellement
l'action du plugin car l'autoloading ne fonctionne pas dans ce cas. */
require_once(sfConfig::get('sf_plugins_dir').
'/sfDoctrineGuardPlugin/modules/sfGuardAuth/lib/BasesfGuardAuthActions.class.php');

/* Notre action dérive de celle fournie par le module
    afin d'hériter de ses actions propres. */
class sfGuardAuthActions extends BasesfGuardAuthActions
{
  public function executeRegister(sfWebRequest $request) {
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

        $this->redirect('@sf_guard_list');
      }
      /* Sinon le formulaire ainsi que l'erreur sera ré-affiché */
    }
  }
  
  public function executeIndex(sfWebRequest $request) {
      $this->users = Doctrine_Core::getTable('sfGuardUser')
              ->createQuery('a')
              ->execute();
  }
  
  public function executeEdit(sfWebRequest $request)
  {
      $this->forward404Unless($user = Doctrine_Core::getTable('sfGuardUser')->find(array($request->getParameter('id'))), sprintf('Object waiter does not exist (%s).', $request->getParameter('id')));
      $this->form = new sfGuardRegisterForm($user);
      $this->user = $user;
  }

  public function executeUpdate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
      $this->forward404Unless($user = Doctrine_Core::getTable('sfGuardUser')->find(array($request->getParameter('id'))), sprintf('Object waiter does not exist (%s).', $request->getParameter('id')));
      $this->user = $user;
      $this->form = new sfGuardRegisterForm($user);

      $this->processForm($request, $this->form);

      $this->setTemplate('edit');
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $form->save();

      $this->redirect('sf_guard_list');
    }
  }
}
?>