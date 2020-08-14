<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_table_form_row\Base;

use AdminModules\GenericEditController;
use Crud\Component_table_form_row\CrudComponent_table_form_rowManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_table_form_row instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudComponent_table_form_rowManager();
	}


	public function getPageTitle(): string
	{
		return "component_table_form_row";
	}
}
