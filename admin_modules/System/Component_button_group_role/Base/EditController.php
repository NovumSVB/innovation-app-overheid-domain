<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_button_group_role\Base;

use AdminModules\GenericEditController;
use Crud\Component_button_group_role\CrudComponent_button_group_roleManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_button_group_role instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudComponent_button_group_roleManager();
	}


	public function getPageTitle(): string
	{
		return "component_button_group_role";
	}
}
