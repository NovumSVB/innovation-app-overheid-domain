<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_table\Base;

use AdminModules\GenericEditController;
use Crud\Component_table\CrudComponent_tableManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_table instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudComponent_tableManager();
	}


	public function getPageTitle(): string
	{
		return "component_table";
	}
}
