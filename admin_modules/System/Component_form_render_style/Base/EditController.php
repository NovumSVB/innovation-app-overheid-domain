<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_form_render_style\Base;

use AdminModules\GenericEditController;
use Crud\Component_form_render_style\CrudComponent_form_render_styleManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_form_render_style instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudComponent_form_render_styleManager();
	}


	public function getPageTitle(): string
	{
		return "component_form_render_style";
	}
}
