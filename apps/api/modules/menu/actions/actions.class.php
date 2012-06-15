<?php

/**
 * category actions.
 *
 * @package    youfood
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class menuActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->jsonArray = Doctrine::getTable('Menu')->getJSONArray($request->getParameter('androidId'));
  }
}
