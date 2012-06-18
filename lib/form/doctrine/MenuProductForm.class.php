<?php

/**
 * MenuProduct form.
 *
 * @package    youfood
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MenuProductForm extends BaseMenuProductForm
{
    private $_menu_id;
    
    public function __construct($menu_id, $object = null, $options = array(), $CSRFSecret = null) {
        $this->_menu_id = $menu_id;
        parent::__construct($object, $options, $CSRFSecret);
    }
    public function configure()
  {
      $this->getWidgetSchema()->setLabels(array(
          'product_id' => 'Plat'
      ));
      
      unset($this['is_available']);
      
      $this->widgetSchema['product_id'] = new sfWidgetFormSelect(array(
          'choices' => Doctrine::getTable('Product')->getUnassociated($this->_menu_id) 
        ));
  }
}
