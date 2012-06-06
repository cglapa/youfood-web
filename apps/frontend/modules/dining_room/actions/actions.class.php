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
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->dining_room = Doctrine_Core::getTable('DiningRoom')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->dining_room);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DiningRoomForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DiningRoomForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($dining_room = Doctrine_Core::getTable('DiningRoom')->find(array($request->getParameter('id'))), sprintf('Object dining_room does not exist (%s).', $request->getParameter('id')));
    $this->form = new DiningRoomForm($dining_room);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($dining_room = Doctrine_Core::getTable('DiningRoom')->find(array($request->getParameter('id'))), sprintf('Object dining_room does not exist (%s).', $request->getParameter('id')));
    $this->form = new DiningRoomForm($dining_room);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($dining_room = Doctrine_Core::getTable('DiningRoom')->find(array($request->getParameter('id'))), sprintf('Object dining_room does not exist (%s).', $request->getParameter('id')));
    $id = $dining_room->getZoneId();
    $dining_room->delete();

    $this->redirect('zone/'.$id);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $dining_room = $form->save();

      $this->redirect('zone/'.$dining_room->getZoneId());
    }
  }
}
