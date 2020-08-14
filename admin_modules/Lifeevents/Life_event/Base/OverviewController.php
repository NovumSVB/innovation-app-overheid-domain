<?php
namespace AdminModules\Custom\NovumOverheid\Lifeevents\Life_event\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Custom\NovumOverheid\LifeEvent\CrudLifeEventManager;
use Crud\FormManager;
use Model\Custom\NovumOverheid\LifeEvent;
use Model\Custom\NovumOverheid\LifeEventQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\Lifeevents\Life_event instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "Life event";
	}


	public function getModule(): string
	{
		return "LifeEvent";
	}


	public function getManager(): FormManager
	{
		return new CrudLifeEventManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return LifeEventQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof LifeEvent){
		    LogActivity::register("Lifeevents", "Life event verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("Life event verwijderd.");
		}
		else
		{
		       StatusMessage::warning("Life event niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit Life event item wilt verwijderen?");
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
