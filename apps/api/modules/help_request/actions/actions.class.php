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
  public function executeIndex(sfWebRequest $request)
  {
      $tablet = Doctrine::getTable('Tablet')->getTabletByAndroidId($request->getParameter('id'))->fetchOne();
      
      /*
       * 3 valeurs pour le champ Help :
       * -> 0 = aucune demande d'aide
       * -> 1 = demande en cours, pas encore validé par le serveur
       * -> 2 = demande en cours, validé par le serveur (= le serveur arrive)
       */
      if($tablet->getHelp() == 2) {
          $this->status = 'ok';
      }
      elseif ($tablet->getHelp() == 1) {
          $this->status = 'nok';
          $this->moreInfo = 'still_waiting';
      }
      else {
          $this->status = 'nok';
          $this->moreInfo = 'request_pending';
          $tablet->setHelp(1);
          $tablet->save();
      }
  }
}
