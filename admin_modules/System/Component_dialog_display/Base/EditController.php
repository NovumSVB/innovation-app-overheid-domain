<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_dialog_display\Base;

use AdminModules\GenericEditController;
use Crud\Component_dialog_display\CrudComponent_dialog_displayManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_dialog_display instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudComponent_dialog_displayManager();
	}


	public function getPageTitle(): string
	{
		return "component_dialog_display";
	}
}
