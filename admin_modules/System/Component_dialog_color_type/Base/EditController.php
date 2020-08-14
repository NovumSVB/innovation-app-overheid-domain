<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_dialog_color_type\Base;

use AdminModules\GenericEditController;
use Crud\Component_dialog_color_type\CrudComponent_dialog_color_typeManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_dialog_color_type instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudComponent_dialog_color_typeManager();
	}


	public function getPageTitle(): string
	{
		return "component_dialog_color_type";
	}
}
