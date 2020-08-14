<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_button\Base;

use AdminModules\GenericEditController;
use Crud\Component_button\CrudComponent_buttonManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_button instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudComponent_buttonManager();
	}


	public function getPageTitle(): string
	{
		return "component_button";
	}
}
