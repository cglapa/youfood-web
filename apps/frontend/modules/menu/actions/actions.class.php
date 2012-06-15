<?php

/**
 * menu actions.
 *
 * @package    youfood
 * @subpackage menu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class menuActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->menus = Doctrine_Core::getTable('Menu')
      ->createQuery('a')
      ->execute();
  }
  
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MenuForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MenuForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($menu = Doctrine_Core::getTable('Menu')->find(array($request->getParameter('id'))), sprintf('Object menu does not exist (%s).', $request->getParameter('id')));
    $this->form = new MenuForm($menu);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($menu = Doctrine_Core::getTable('Menu')->find(array($request->getParameter('id'))), sprintf('Object menu does not exist (%s).', $request->getParameter('id')));
    $this->form = new MenuForm($menu);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($menu = Doctrine_Core::getTable('Menu')->find(array($request->getParameter('id'))), sprintf('Object menu does not exist (%s).', $request->getParameter('id')));
    $menu->delete();

    $this->redirect('menu/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $menu = $form->save();

      $this->redirect('menu');
    }
  }
  
  public function executeUpdateMain(sfWebRequest $request)
  {
      $new_main_menu = Doctrine::getTable('Menu')->find($request->getParameter('id'));
      if($new_main_menu) {
        $main_menu = Doctrine::getTable('Menu')->findOneBy('is_available', true);
        if($main_menu) {
            $main_menu->setIsAvailable(false);
            $main_menu->save();
        }
        
        $new_main_menu->setIsAvailable(true);
        $new_main_menu->save();
      }
      $this->redirect('menu');
  }
}
