<?php

/**
 * MenuTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MenuTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object MenuTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Menu');
    }
    
    public function getJSONArray($androidId) {
       $menu = Doctrine::getTable('Menu')->findOneBy('is_available', true);
       if($menu) {
            $tablet = Doctrine::getTable('Tablet')->getTabletByAndroidId($androidId)->fetchOne();
            if($tablet) {
                $menu_products = Doctrine::getTable('MenuProduct')->findBy('menu_id', $menu->getId());
                $category_array = array();
                $created_categories = array();
                $i = 0;
                foreach ($menu_products as $menu_product) {
                    if($menu_product->getIsAvailable()) {
                            $product = array(
                                "id" => $menu_product->getProduct()->getId(),
                                "name" => $menu_product->getProduct()->getName(), 
                                "price" => $menu_product->getProduct()->getPrice(),
                                "description" => $menu_product->getProduct()->getDescription(),
                                "thumbnail" => "",
                                "image" => ""
                            );
                            if($menu_product->getProduct()->getImage()) {
                                $product["thumbnail"] = base64_encode(file_get_contents(sfConfig::get('sf_upload_dir').'/products/thumbnails/'.$menu_product->getProduct()->getImage()));
                                $product["image"] = 'uploads/products/'.$menu_product->getProduct()->getImage();
                            }
                            $category = $menu_product->getProduct()->getCategory();
                            if(!isset($created_categories[$category->getId()])) {
                                array_push($category_array, array(
                                    "id" => $category->getId(),
                                    "name" => $category->getName(),
                                    "product" => array($product)
                                ));
                                $created_categories[$category->getId()] = $i;
                                $i++;
                            }
                            else {
                                array_push($category_array[$created_categories[$category->getId()]]["product"], $product);
                            }
                    }

                }

                return array("status" => "ok", "category" => $category_array);
            }
            else {
                return array("status" => "nok");
            }
       }
       else {
           return array("status" => "ok");
       }
   }
}