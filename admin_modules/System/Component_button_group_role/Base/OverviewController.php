<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_button_group_role\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Component_button_group_role\CrudComponent_button_group_roleManager;
use Crud\FormManager;
use Model\System\LowCode\ButtonGroup\Component_button_group_role;
use Model\System\LowCode\ButtonGroup\Component_button_group_roleQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_button_group_role instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "component_button_group_role";
	}


	public function getModule(): string
	{
		return "Component_button_group_role";
	}


	public function getManager(): FormManager
	{
		return new CrudComponent_button_group_roleManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return Component_button_group_roleQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof Component_button_group_role){
		    LogActivity::register("System", "component_button_group_role verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("component_button_group_role verwijderd.");
		}
		else
		{
		       StatusMessage::warning("component_button_group_role niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit component_button_group_role item wilt verwijderen?");
		$sTitle = Translate::fromCode("Zeker weten?");
		$sOkUrl = $this->getManager()->getOverviewUrl() . "?id=" . $iId . "&_do=Delete";
		$sNOUrl = $this->getRequestUri();
		$sYes = Translate::fromCode("Ja");
		$sCancel = Translate::fromCode("Annuleren");
		$aButtons  = [
		   new StatusMessageButton($sYes, $sOkUrl, $sYes, "warning"),
		   new StatusMessageButton($sCancel, $sNOUrl, $sCancel, "info"),
		];
		StatusModal::warning($sMessage, $sTitle, $aButtons);
	}
}
