<?php

/**
 * table_order actions.
 *
 * @package    youfood
 * @subpackage table_order
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class orderActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $table_order = array();
    $content = $request->getContent();
    if(!empty($content)) {
        $table_order_json = json_decode($content, true);
        $this->tablet = Doctrine::getTable('Tablet')->getTabletByAndroidId($table_order_json["android_id"])->fetchOne();
        if($this->tablet) {       
            $table_order = new TableOrder();
            $table_order->setDiningTableId($this->tablet->getDiningTableId());
            $table_order->setPayKey($table_order_json["pay_key"]);
            $table_order->save();

            foreach($table_order_json["products"] as $product_order_json) {
                $product_order = new OrderProduct();
                $product_order->setProductId($product_order_json["id"]);
                $product_order->setQuantity($product_order_json["quantity"]);
                $product_order->setTableOrder($table_order);
                $product_order->save();
            }
        }
    }
  }
}
