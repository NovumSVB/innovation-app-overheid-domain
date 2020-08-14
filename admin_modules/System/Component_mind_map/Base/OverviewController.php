<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_mind_map\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Component_mind_map\CrudComponent_mind_mapManager;
use Crud\FormManager;
use Model\System\LowCode\MindMap\Component_mind_map;
use Model\System\LowCode\MindMap\Component_mind_mapQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_mind_map instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "component_mind_map";
	}


	public function getModule(): string
	{
		return "Component_mind_map";
	}


	public function getManager(): FormManager
	{
		return new CrudComponent_mind_mapManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return Component_mind_mapQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof Component_mind_map){
		    LogActivity::register("System", "component_mind_map verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("component_mind_map verwijderd.");
		}
		else
		{
		       StatusMessage::warning("component_mind_map niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit component_mind_map item wilt verwijderen?");
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
