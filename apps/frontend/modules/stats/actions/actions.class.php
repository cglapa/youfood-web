<?php

/**
 * stats actions.
 *
 * @package    youfood
 * @subpackage stats
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class statsActions extends sfActions
{
  public function executeZone(sfWebRequest $request)
  {
        $this->zone = Doctrine::getTable('Zone')->find($request->getParameter('id'));
        $this->order_products = Doctrine::getTable('OrderProduct')->getStats($request->getParameter('id'), $request->getParameter('category'));
        $this->category = Doctrine::getTable('Category')->find($request->getParameter('category'));
  }
 
  public function executeIndex($request) {
        $this->categorys = Doctrine::getTable('Category')
                ->createQuery('a')
                ->execute();
        $this->zones = Doctrine::getTable('Zone')
                ->createQuery('a')
                ->execute();
  }
  
}
