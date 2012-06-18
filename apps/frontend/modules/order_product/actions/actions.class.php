<?php

/**
 * order_product actions.
 *
 * @package    youfood
 * @subpackage order_product
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class order_productActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->table_order = Doctrine_Core::getTable('TableOrder')->find($request->getParameter('id'));
    $this->order_products = $this->table_order->getOrderProduct();
  }
}
