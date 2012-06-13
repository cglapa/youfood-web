<?php

/**
 * tablet actions.
 *
 * @package    youfood
 * @subpackage tablet
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tabletActions extends sfActions
{
  public function executeRequest(sfWebRequest $request)
  {
    $this->tablets = Doctrine_Core::getTable('TabletRequest')
      ->createQuery('a')
      ->execute();
    $this->dining_tables = Doctrine::getTable('DiningTable')->getUnusedDiningTable()->execute();
    foreach ($this->tablets as $key => $tablet) {
        if(time()-300 > $tablet->getDateTimeObject('last_check')->getTimestamp()) {
            $tablet->delete();
            unset($this->tablets[$key]);
        } 
            
    }
  }

  public function executeAssociated(sfWebRequest $request)
  {
    $this->tablets = Doctrine_Core::getTable('Tablet')
      ->createQuery('a')
      ->execute();
  }
  
  public function executeAssociation(sfWebRequest $request) 
  {
      $tablet = new Tablet();
      $tablet->setAndroidId($request->getParameter('id'));
      $tablet->setDiningTableId($request->getParameter('dining_table_id'));
      $tablet->save();
      
      $tablet_request = Doctrine_Core::getTable('TabletRequest')->find($tablet->getAndroidId());
      $tablet_request->delete();
      
      $this->redirect('tablet');
  }
  
  public function executeRemove(sfWebRequest $request) 
  {
      $tablet = Doctrine_Core::getTable('Tablet')->getTabletByAndroidId($request->getParameter('android_id'))->fetchOne();
      $tablet->delete();
      
      $this->redirect('tablet');
  }
  
  public function executeAjax(sfWebRequest $request)
  {
        $this->tablet_requests = Doctrine_Core::getTable('TabletRequest')
                ->createQuery('a')
                ->execute();
        foreach ($this->tablet_requests as $key => $tablet) {
            if(time()-300 > $tablet->getDateTimeObject('last_check')->getTimestamp()) {
                $tablet->delete();
                unset($this->tablet_requests[$key]);
            } 

        }
  }
  
  public function executeCloseNew(sfWebRequest $request) {
      $tablet_request = Doctrine_Core::getTable('TabletRequest')->find($request->getParameter('android_id'));
      $tablet_request->setIsNew(false);
      $tablet_request->save();
  }
}
