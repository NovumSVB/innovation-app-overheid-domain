<?php
namespace AdminModules\Custom\NovumOverheid\Services\Available_services\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Custom\NovumOverheid\AvailableServices\CrudAvailableServicesManager;
use Crud\FormManager;
use Model\Custom\NovumOverheid\AvailableServices;
use Model\Custom\NovumOverheid\AvailableServicesQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\Services\Available_services instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "Beschikbare diensten";
	}


	public function getModule(): string
	{
		return "AvailableServices";
	}


	public function getManager(): FormManager
	{
		return new CrudAvailableServicesManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return AvailableServicesQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof AvailableServices){
		    LogActivity::register("Services", "Beschikbare diensten verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("Beschikbare diensten verwijderd.");
		}
		else
		{
		       StatusMessage::warning("Beschikbare diensten niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit Beschikbare diensten item wilt verwijderen?");
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
