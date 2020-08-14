<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_list_view\Base;

use AdminModules\GenericEditController;
use Crud\Component_list_view\CrudComponent_list_viewManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_list_view instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudComponent_list_viewManager();
	}


	public function getPageTitle(): string
	{
		return "component_list_view";
	}
}
