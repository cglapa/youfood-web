<?php

/**
 * help_request actions.
 *
 * @package    youfood
 * @subpackage help_request
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class help_requestActions extends sfActions
{
  public function executeList(sfWebRequest $request) {
      if($request->getMethod() == 'POST') {
          $tablet = Doctrine::getTable('Tablet')->getTabletByAndroidId($request->getParameter('androidId'))->fetchOne();
          $help = $request->getParameter('help');
          if($help >= 0 && $help < 3) {
            $tablet->setHelp($request->getParameter('help'));
            $tablet->save();
          }
      }
      else {
          $tablets = Doctrine::getTable('Tablet')->getHelpRequestByWaiter($this->getUser()->getGuardUser()->getId())->execute();
          $tablets_array = array();
          foreach($tablets as $tablet) {
            $tablet = array(
                "androidId" => $tablet->getAndroidId(),
                "diningTable" => $tablet->getDiningTable()->getName()
                );
                array_push($tablets_array, $tablet);
          }
          $this->jsonArray = array("tablet" => $tablets_array);
      }
  }
}
