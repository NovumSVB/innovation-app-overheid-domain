<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_form_button_location\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Component_form_button_location\CrudComponent_form_button_locationManager;
use Crud\FormManager;
use Model\System\LowCode\Form\Component_form_button_location;
use Model\System\LowCode\Form\Component_form_button_locationQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_form_button_location instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "component_form_button_location";
	}


	public function getModule(): string
	{
		return "Component_form_button_location";
	}


	public function getManager(): FormManager
	{
		return new CrudComponent_form_button_locationManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return Component_form_button_locationQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof Component_form_button_location){
		    LogActivity::register("System", "component_form_button_location verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("component_form_button_location verwijderd.");
		}
		else
		{
		       StatusMessage::warning("component_form_button_location niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit component_form_button_location item wilt verwijderen?");
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
