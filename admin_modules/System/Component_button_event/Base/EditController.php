<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_button_event\Base;

use AdminModules\GenericEditController;
use Crud\Component_button_event\CrudComponent_button_eventManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_button_event instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudComponent_button_eventManager();
	}


	public function getPageTitle(): string
	{
		return "component_button_event";
	}
}
