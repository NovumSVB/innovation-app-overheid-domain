<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_modal\Base;

use AdminModules\GenericEditController;
use Crud\Component_modal\CrudComponent_modalManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_modal instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudComponent_modalManager();
	}


	public function getPageTitle(): string
	{
		return "component_modal";
	}
}
