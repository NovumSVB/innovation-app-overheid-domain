<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_button_color_type\Base;

use AdminModules\GenericEditController;
use Crud\Component_button_color_type\CrudComponent_button_color_typeManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_button_color_type instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudComponent_button_color_typeManager();
	}


	public function getPageTitle(): string
	{
		return "component_button_color_type";
	}
}
