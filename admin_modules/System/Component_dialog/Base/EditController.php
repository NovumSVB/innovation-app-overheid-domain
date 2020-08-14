<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_dialog\Base;

use AdminModules\GenericEditController;
use Crud\Component_dialog\CrudComponent_dialogManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_dialog instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudComponent_dialogManager();
	}


	public function getPageTitle(): string
	{
		return "component_dialog";
	}
}
