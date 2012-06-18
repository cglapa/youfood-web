<?php

/**
 * product actions.
 *
 * @package    youfood
 * @subpackage product
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class productActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->products = Doctrine_Core::getTable('Category')->getProducts($request->getParameter('id'));
    $this->category = Doctrine_Core::getTable('Category')->find($request->getParameter('id'));
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->product = Doctrine_Core::getTable('Product')->find(array($request->getParameter('id')));
    $this->category = Doctrine_Core::getTable('Category')->find($this->product->getCategory_id());
    $this->forward404Unless($this->product);
  }

  public function executeNew(sfWebRequest $request)
  {
      $this->category = Doctrine_Core::getTable('Category')->find($request->getParameter('id'));
      $this->form = new ProductForm();
      $this->form->setDefault('category_id', $this->category->getId());
  }

  public function executeCreate(sfWebRequest $request)
  {
      $this->category = Doctrine_Core::getTable('Category')->find($request->getParameter('id'));
      
      $this->forward404Unless($request->isMethod(sfRequest::POST));

      $this->form = new ProductForm();

      $this->processForm($request, $this->form);

      $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
      $this->product = Doctrine_Core::getTable('Product')->find($request->getParameter('id'));
      $this->category = Doctrine_Core::getTable('Category')->find($this->product->getCategoryId());
      $this->forward404Unless($product = Doctrine_Core::getTable('Product')->find(array($request->getParameter('id'))), sprintf('Object product does not exist (%s).', $request->getParameter('id')));
      $this->form = new ProductForm($product);
  }

  public function executeUpdate(sfWebRequest $request)
  {
      $this->product = Doctrine_Core::getTable('Product')->find($request->getParameter('id'));
      $this->category = Doctrine_Core::getTable('Category')->find($this->product->getCategoryId());
      
      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
      $this->forward404Unless($product = Doctrine_Core::getTable('Product')->find(array($request->getParameter('id'))), sprintf('Object product does not exist (%s).', $request->getParameter('id')));
      $this->form = new ProductForm($product);

      $this->processForm($request, $this->form);

      $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($product = Doctrine_Core::getTable('Product')->find(array($request->getParameter('id'))), sprintf('Object product does not exist (%s).', $request->getParameter('id')));
    $this->category = Doctrine::getTable('Category')->find($product->getCategory_id());
    $product->delete();
    
    $this->redirect('category_detail', $this->category);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $product = $form->save();
      
      if($request->getParameter('again') == 'true')
        $this->redirect ('product_new', $product->getCategory());
      else
        $this->redirect('/category/'.$product->getCategoryId());
    }
  }
}
