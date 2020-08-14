<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_form\Base;

use AdminModules\GenericEditController;
use Crud\Component_form\CrudComponent_formManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_form instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudComponent_formManager();
	}


	public function getPageTitle(): string
	{
		return "component_form";
	}
}
