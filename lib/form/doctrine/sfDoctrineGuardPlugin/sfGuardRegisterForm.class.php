<?php

/**
 * sfGuardRegisterForm for registering new users
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: BasesfGuardChangeUserPasswordForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardRegisterForm extends BasesfGuardRegisterForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
      $this->getWidgetSchema()->setLabels(array(
          'first_name' => 'Prénom',
          'last_name' => 'Nom',
          'password' => 'Mot de passe',
          'password_again' => 'Vérification du mot de passe',
          'username' => 'Identifiant serveur'
      ));
      unset($this['email_address']);
  }
}