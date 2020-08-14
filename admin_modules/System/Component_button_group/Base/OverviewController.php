<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_button_group\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Component_button_group\CrudComponent_button_groupManager;
use Crud\FormManager;
use Model\System\LowCode\ButtonGroup\Component_button_group;
use Model\System\LowCode\ButtonGroup\Component_button_groupQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_button_group instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "component_button_group";
	}


	public function getModule(): string
	{
		return "Component_button_group";
	}


	public function getManager(): FormManager
	{
		return new CrudComponent_button_groupManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return Component_button_groupQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof Component_button_group){
		    LogActivity::register("System", "component_button_group verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("component_button_group verwijderd.");
		}
		else
		{
		       StatusMessage::warning("component_button_group niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit component_button_group item wilt verwijderen?");
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
