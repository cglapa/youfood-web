<?php

/**
 * zone actions.
 *
 * @package    youfood
 * @subpackage zone
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class zoneActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->zones = Doctrine_Core::getTable('Zone')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->zone = Doctrine_Core::getTable('Zone')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->zone);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ZoneForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ZoneForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($zone = Doctrine_Core::getTable('Zone')->find(array($request->getParameter('id'))), sprintf('Object zone does not exist (%s).', $request->getParameter('id')));
    $this->form = new ZoneForm($zone);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($zone = Doctrine_Core::getTable('Zone')->find(array($request->getParameter('id'))), sprintf('Object zone does not exist (%s).', $request->getParameter('id')));
    $this->form = new ZoneForm($zone);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($zone = Doctrine_Core::getTable('Zone')->find(array($request->getParameter('id'))), sprintf('Object zone does not exist (%s).', $request->getParameter('id')));
    $zone->delete();

    $this->redirect('zone/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $zone = $form->save();

      $this->redirect('zone/edit?id='.$zone->getId());
    }
  }
}
