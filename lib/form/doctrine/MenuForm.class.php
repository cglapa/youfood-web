<?php

/**
 * Menu form.
 *
 * @package    youfood
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MenuForm extends BaseMenuForm
{
  public function configure()
  {
      $this->widgetSchema['name'] = new sfWidgetFormInputText();
      $this->getWidget('name')->setLabel('Nom');
      unset($this['is_available']);
  }
}
