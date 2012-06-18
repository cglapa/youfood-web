<?php

/**
 * menu_product actions.
 *
 * @package    youfood
 * @subpackage menu_product
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class menu_productActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->menu_products = Doctrine::getTable('MenuProduct')->getArrayCategoryInMenu($request->getParameter('id'));
    $this->menu = Doctrine::getTable('Menu')->find($request->getParameter('id'));
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->menu = Doctrine::getTable('Menu')->find($request->getParameter('id'));
    if($this->menu) {
        $this->form = new MenuProductForm($this->menu->getId());
        $this->form->setDefault('menu_id', $this->menu->getId());
    }
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->menu = Doctrine::getTable('Menu')->find($request->getParameter('id'));
    if($this->menu) {
        $this->form = new MenuProductForm($this->menu->getId());
        
        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($menu_product = Doctrine_Core::getTable('MenuProduct')->find(array($request->getParameter('id'))), sprintf('Object menu_product does not exist (%s).', $request->getParameter('id')));
    $menu = Doctrine::getTable('MenuProduct')->find($menu_product->getMenuId());
    $menu_product->delete();

    $this->redirect('menu_detail', $menu);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $menu_product = $form->save();
      $menu = $menu_product->getMenu();
      $this->redirect('menu_detail', $menu);
    }
  }
  
  public function executeAvailable(sfWebRequest $request)
  {
      $menu_product = Doctrine::getTable('MenuProduct')->find($request->getParameter('id'));
      $menu_product->setIsAvailable(!$menu_product->getIsAvailable());
      $menu_product->save();
      
      $this->redirect('menu_detail', $menu_product->getMenu());
  }
}
