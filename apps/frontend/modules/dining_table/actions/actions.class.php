<?php

/**
 * dining_table actions.
 *
 * @package    youfood
 * @subpackage dining_table
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dining_tableActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->dining_tables = Doctrine_Core::getTable('DiningTable')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->dining_table = Doctrine_Core::getTable('DiningTable')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->dining_table);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DiningTableForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DiningTableForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($dining_table = Doctrine_Core::getTable('DiningTable')->find(array($request->getParameter('id'))), sprintf('Object dining_table does not exist (%s).', $request->getParameter('id')));
    $this->form = new DiningTableForm($dining_table);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($dining_table = Doctrine_Core::getTable('DiningTable')->find(array($request->getParameter('id'))), sprintf('Object dining_table does not exist (%s).', $request->getParameter('id')));
    $this->form = new DiningTableForm($dining_table);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($dining_table = Doctrine_Core::getTable('DiningTable')->find(array($request->getParameter('id'))), sprintf('Object dining_table does not exist (%s).', $request->getParameter('id')));
    $dining_table->delete();

    $this->redirect('dining_table/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $dining_table = $form->save();

      $this->redirect('dining_table/edit?id='.$dining_table->getId());
    }
  }
}
