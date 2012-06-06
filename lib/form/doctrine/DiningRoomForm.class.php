<?php

/**
 * DiningRoom form.
 *
 * @package    youfood
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DiningRoomForm extends BaseDiningRoomForm
{
  public function configure()
  {
      $this->widgetSchema['name'] = new sfWidgetFormInputText();
      $this->getWidgetSchema()->setLabels(array('name' => 'Nom de la salle'));
      $this->widgetSchema['zone_id'] = new sfWidgetFormInputHidden();
  }
}
