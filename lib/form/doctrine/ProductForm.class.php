<?php

/**
 * Product form.
 *
 * @package    youfood
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductForm extends BaseProductForm
{
  public function configure()
  {   
      $this->widgetSchema['category_id'] = new sfWidgetFormInputHidden();
      
      $this->widgetSchema['name'] = new sfWidgetFormInputText();
      
      $this->widgetSchema->setLabels(array(
          'name' => 'Nom',
         'price' => 'Prix'
      ));
  }
}
