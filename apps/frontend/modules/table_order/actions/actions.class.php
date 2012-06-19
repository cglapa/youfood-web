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
      if($request->getParameter('all') == "mine") {
          $this->table_orders = Doctrine_Core::getTable('TableOrder')->getByWaiter($this->getUser()->getGuardUser()->getId())->execute();
          $this->all = 'mine';
      }
      elseif($request->getParameter('all') == "all") {
          $this->table_orders = Doctrine::getTable('TableOrder')
                  ->createQuery('a')
                  ->execute();
          $this->all = 'all';
      }
      else
      {
          $this->table_orders = Doctrine_Core::getTable('TableOrder')->getUnclosedByWaiter($this->getUser()->getGuardUser()->getId())->execute();
          $this->all = null;
      }
  }
  
  public function executeAjax(sfWebRequest $request)
  {
    $this->table_orders = Doctrine_Core::getTable('TableOrder')->getUnclosedByWaiter($this->getUser()->getGuardUser()->getId())->execute();
    return $this->renderPartial('table_order/list', array('table_orders' => $this->table_orders));
  }
  
  public function executeClose(sfWebRequest $request)
  {
    $this->forward404Unless($table_order = Doctrine_Core::getTable('TableOrder')->find(array($request->getParameter('id'))), sprintf('Object table_order does not exist (%s).', $request->getParameter('id')));
    $table_order->setIsClosed(!$table_order->getIsClosed());
    $table_order->save();
    
    if($request->getParameter('all') == "all") {
        $this->redirect('/order/all');
    }
    else {
        $this->redirect('table_order');
    }
  }
  
  public function executeGetNew(sfWebRequest $request) {
    $this->table_orders = Doctrine_Core::getTable('TableOrder')->getUnclosedByWaiter($this->getUser()->getGuardUser()->getId())->execute();
  }
  
  public function executeCloseNew(sfWebRequest $request) {
    $table_order = Doctrine_Core::getTable('TableOrder')->find($request->getParameter('id'));
    $table_order->setIsNew(false);
    $table_order->save();
  }
  
  public function executeClickDetail(sfWebRequest $request) {
      $table_order = Doctrine_Core::getTable('TableOrder')->find($request->getParameter('id'));
      $table_order->setIsNew(false);
      $table_order->save();
      $this->redirect('table_order_detail', $table_order);
  }
}
