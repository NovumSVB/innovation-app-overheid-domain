<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_button_group_size\Base;

use AdminModules\GenericEditController;
use Crud\Component_button_group_size\CrudComponent_button_group_sizeManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_button_group_size instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudComponent_button_group_sizeManager();
	}


	public function getPageTitle(): string
	{
		return "component_button_group_size";
	}
}
