<?php

/**
 * order_product actions.
 *
 * @package    youfood
 * @subpackage order_product
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class order_productActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->table_order = Doctrine_Core::getTable('TableOrder')->find($request->getParameter('id'));
    $this->order_products = $this->table_order->getOrderProduct();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->order_product = Doctrine_Core::getTable('OrderProduct')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->order_product);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new OrderProductForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new OrderProductForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($order_product = Doctrine_Core::getTable('OrderProduct')->find(array($request->getParameter('id'))), sprintf('Object order_product does not exist (%s).', $request->getParameter('id')));
    $this->form = new OrderProductForm($order_product);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($order_product = Doctrine_Core::getTable('OrderProduct')->find(array($request->getParameter('id'))), sprintf('Object order_product does not exist (%s).', $request->getParameter('id')));
    $this->form = new OrderProductForm($order_product);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($order_product = Doctrine_Core::getTable('OrderProduct')->find(array($request->getParameter('id'))), sprintf('Object order_product does not exist (%s).', $request->getParameter('id')));
    $order_product->delete();

    $this->redirect('order_product/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $order_product = $form->save();

      $this->redirect('order_product/edit?id='.$order_product->getId());
    }
  }
}
