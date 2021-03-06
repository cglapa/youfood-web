<?php

/**
 * ProductTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ProductTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ProductTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Product');
    }
    
    public function getProductInArray() {
       $products = Doctrine_Query::create()
               ->from('Product p')
               ->execute();
       $products_array = array();
       $i = 0;
       foreach ($products as $product) {
           $products_array[$i] = array(
             'id' => $product->getId(),
             'name' => $product->getName(),
             'price' => $product->getPrice(),
             'description' => $product->getDescription(),
             'category_id' => $product->getCategoryId()
           );
           $i++;
       }
       return $products_array;
   }
   
   public function getProduct()
    {
        return $this->createQuery('p');
    }
    
    
   public function getUnassociated($menuId) {
       $products = $this->getProduct()
               ->where('p.id NOT IN (select product_id FROM menu_product WHERE menu_id = ?)', $menuId)
               ->orderBy('p.category_id, p.name')
               ->execute();
       
       $products_array = array();
       foreach ($products as $product) {
           $products_array[$product->getId()] = $product->getName();
       }
       
       return $products_array;
   }
}