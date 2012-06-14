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
  public function executeIndex(sfWebRequest $request)
  {
    $this->table_orders = Doctrine_Core::getTable('TableOrder')
      ->createQuery('a')
      ->execute();
  }
  
}
