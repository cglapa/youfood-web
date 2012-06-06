<?php

/**
 * dining_room actions.
 *
 * @package    youfood
 * @subpackage dining_room
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dining_roomActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->dining_rooms = Doctrine_Core::getTable('Zone')->getDiningRooms($request->getParameter('id'));
    $this->zone = Doctrine_Core::getTable('Zone')->find($this->dining_rooms[0]->getZoneId());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->dining_room = Doctrine_Core::getTable('DiningRoom')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->dining_room);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DiningRoomForm();
    $this->zone = Doctrine_Core::getTable('Zone')->find($request->getParameter('id'));
    $this->form->setDefault('zone_id', $this->zone->getId());
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DiningRoomForm();
    
    $this->zone = Doctrine_Core::getTable('Zone')->find($request->getParameter('id'));
    $this->form->setDefault('zone_id', $this->zone->getId());
    
    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($dining_room = Doctrine_Core::getTable('DiningRoom')->find(array($request->getParameter('id'))), sprintf('Object dining_room does not exist (%s).', $request->getParameter('id')));
    $this->dining_room = $dining_room;
    $this->zone = Doctrine_Core::getTable('Zone')->find($dining_room->getZoneId());
    $this->form = new DiningRoomForm($dining_room);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($dining_room = Doctrine_Core::getTable('DiningRoom')->find(array($request->getParameter('id'))), sprintf('Object dining_room does not exist (%s).', $request->getParameter('id')));
    $this->form = new DiningRoomForm($dining_room);
    $this->dining_room = $dining_room;
    $this->zone = Doctrine_Core::getTable('Zone')->find($dining_room->getZoneId());
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($dining_room = Doctrine_Core::getTable('DiningRoom')->find(array($request->getParameter('id'))), sprintf('Object dining_room does not exist (%s).', $request->getParameter('id')));
    $id = $dining_room->getZoneId();
    $dining_room->delete();

    $this->redirect('/zone/room/'.$id);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $dining_room = $form->save();

      $this->redirect('/zone/room/'.$dining_room->getZoneId());
    }
  }
}
