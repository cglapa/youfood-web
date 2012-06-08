<?php

/**
 * table_order actions.
 *
 * @package    youfood
 * @subpackage table_order
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class table_orderActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->table_orders = array();
    $content = $request->getContent();
    if(!empty($content)) {
        $this->table_orders = json_decode($content, true);
        
    }
    var_dump($this->table_orders);
    die;
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->table_order = Doctrine_Core::getTable('TableOrder')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->table_order);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TableOrderForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TableOrderForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($table_order = Doctrine_Core::getTable('TableOrder')->find(array($request->getParameter('id'))), sprintf('Object table_order does not exist (%s).', $request->getParameter('id')));
    $this->form = new TableOrderForm($table_order);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($table_order = Doctrine_Core::getTable('TableOrder')->find(array($request->getParameter('id'))), sprintf('Object table_order does not exist (%s).', $request->getParameter('id')));
    $this->form = new TableOrderForm($table_order);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($table_order = Doctrine_Core::getTable('TableOrder')->find(array($request->getParameter('id'))), sprintf('Object table_order does not exist (%s).', $request->getParameter('id')));
    $table_order->delete();

    $this->redirect('table_order/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $table_order = $form->save();

      $this->redirect('table_order/edit?id='.$table_order->getId());
    }
  }
}
