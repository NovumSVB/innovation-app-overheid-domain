<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_mind_map\Base;

use AdminModules\GenericEditController;
use Crud\Component_mind_map\CrudComponent_mind_mapManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_mind_map instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudComponent_mind_mapManager();
	}


	public function getPageTitle(): string
	{
		return "component_mind_map";
	}
}
