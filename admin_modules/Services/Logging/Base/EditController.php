<?php
namespace AdminModules\Custom\NovumOverheid\Services\Logging\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumOverheid\Logging\CrudLoggingManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\Services\Logging instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudLoggingManager();
	}


	public function getPageTitle(): string
	{
		return "Logging";
	}
}
