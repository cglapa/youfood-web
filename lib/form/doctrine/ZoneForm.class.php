<?php

/**
 * Zone form.
 *
 * @package    youfood
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ZoneForm extends BaseZoneForm
{
  public function configure()
  {
      $this->widgetSchema['name'] = new sfWidgetFormInputText();
      
      $this->getWidgetSchema()->setLabel('name', 'Nom du restaurant');
  }
}
