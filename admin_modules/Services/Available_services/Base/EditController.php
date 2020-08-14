<?php
namespace AdminModules\Custom\NovumOverheid\Services\Available_services\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumOverheid\AvailableServices\CrudAvailableServicesManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\Services\Available_services instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudAvailableServicesManager();
	}


	public function getPageTitle(): string
	{
		return "Beschikbare diensten";
	}
}
