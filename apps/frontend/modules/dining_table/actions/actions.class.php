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
    $this->dining_tables = Doctrine_Core::getTable('DiningRoom')->getDiningTables($request->getParameter('id'));
    $this->dining_room = Doctrine_Core::getTable('DiningRoom')->find($request->getParameter('id'));
    $this->zone = Doctrine_Core::getTable('Zone')->find($this->dining_room->getZoneId());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->dining_room = Doctrine_Core::getTable('DiningRoom')->find($request->getParameter('id'));
    $this->zone = Doctrine_Core::getTable('Zone')->find($this->dining_room->getZoneId());
    $this->form = new DiningTableForm();
    $this->form->setDefault('dining_room_id', $this->dining_room->getId());
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->dining_room = Doctrine_Core::getTable('DiningRoom')->find($request->getParameter('id'));
    $this->zone = Doctrine_Core::getTable('Zone')->find($this->dining_room->getZoneId());
    
    $this->form = new DiningTableForm();

    $this->form->setDefault('dining_room_id', $this->dining_room->getId());
    
    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($dining_table = Doctrine_Core::getTable('DiningTable')->find(array($request->getParameter('id'))), sprintf('Object dining_table does not exist (%s).', $request->getParameter('id')));
    $this->form = new DiningTableForm($dining_table);
    $this->dining_room = Doctrine_Core::getTable('DiningRoom')->find($dining_table->getDiningRoomId());
    $this->zone = Doctrine_Core::getTable('Zone')->find($this->dining_room->getZoneId());
    $this->dining_table = $dining_table;
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($dining_table = Doctrine_Core::getTable('DiningTable')->find(array($request->getParameter('id'))), sprintf('Object dining_table does not exist (%s).', $request->getParameter('id')));
    $this->form = new DiningTableForm($dining_table);
    $this->dining_room = Doctrine_Core::getTable('DiningRoom')->find($dining_table->getDiningRoomId());
    $this->zone = Doctrine_Core::getTable('Zone')->find($this->dining_room->getZoneId());
    $this->dining_table = $dining_table;
    
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($dining_table = Doctrine_Core::getTable('DiningTable')->find(array($request->getParameter('id'))), sprintf('Object dining_table does not exist (%s).', $request->getParameter('id')));
    $dining_table->delete();
    $dining_room = Doctrine_Core::getTable('DiningRoom')->find($dining_table->getDiningRoomId());

    $this->redirect('dining_room_detail', $dining_room);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $dining_table = $form->save();
      $dining_room = Doctrine_Core::getTable('DiningRoom')->find($dining_table->getDiningRoomId());

      $this->redirect('dining_room_detail', $dining_room);
    }
  }
  
  public function executeTableForm(sfWebRequest $request) 
  {
      $this->setLayout(false);
      $this->androidId = $request->getParameter('android_id');
      $this->dining_tables = Doctrine::getTable('DiningTable')->getUnusedDiningTable()->execute();
  }
}
