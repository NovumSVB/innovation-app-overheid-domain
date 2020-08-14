<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_modal_button_location\Base;

use AdminModules\GenericEditController;
use Crud\Component_modal_button_location\CrudComponent_modal_button_locationManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_modal_button_location instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudComponent_modal_button_locationManager();
	}


	public function getPageTitle(): string
	{
		return "component_modal_button_location";
	}
}
