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
      $this->widgetSchema['image'] = new sfWidgetFormInputFile(array(
        'label' => 'Image du plat',
      ));
      
      $this->widgetSchema->setLabels(array(
          'name' => 'Nom',
          'price' => 'Prix',
          'available' => 'Disponible'
      ));
      
      $this->validatorSchema['image'] = new sfValidatorFile(array(
        'required'   => true,
        'path'       => sfConfig::get('sf_upload_dir').'/products/',
        'mime_types' => 'web_images',
        'max_size'   => '500000'
      ));
  }
}
