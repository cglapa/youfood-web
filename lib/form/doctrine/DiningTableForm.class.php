<?php

/**
 * DiningTable form.
 *
 * @package    youfood
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DiningTableForm extends BaseDiningTableForm
{
  public function configure()
  {
      $this->widgetSchema['name'] = new sfWidgetFormInputText();
      
      $this->widgetSchema['dining_room_id'] = new sfWidgetFormInputHidden();
      
      $this->getWidgetSchema()->setLabels(array(
         'name' => 'Nom',
         'seats'=> 'Nombre de places' 
      ));
  }
}
