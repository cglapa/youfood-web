<?php

/**
 * auth actions.
 *
 * @package    youfood
 * @subpackage auth
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class authActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $tablet = Doctrine::getTable('Tablet')->getTabletByAndroidId($request->getParameter('id'))->fetchOne();
    if($tablet)
        $this->status = 'ok';
    else
    {
        $this->status = 'nok';
        $tablet = Doctrine::getTable('TabletRequest')->find($request->getParameter('id'));
        if($tablet)
          $this->moreinfo = 'still_waiting';
        else
        {
          $this->moreinfo = 'request_pending';
          $tablet = new TabletRequest();
          $tablet->setAndroidId($request->getParameter('id'));
        }
        $tablet->setLastCheck(time());
        $tablet->save();
    }
  }
}
