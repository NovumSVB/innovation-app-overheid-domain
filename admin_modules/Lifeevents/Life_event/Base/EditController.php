<?php
namespace AdminModules\Custom\NovumOverheid\Lifeevents\Life_event\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumOverheid\LifeEvent\CrudLifeEventManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\Lifeevents\Life_event instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudLifeEventManager();
	}


	public function getPageTitle(): string
	{
		return "Life event";
	}
}
