<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_dialog_color_type\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Component_dialog_color_type\CrudComponent_dialog_color_typeManager;
use Crud\FormManager;
use Model\System\LowCode\Dialog\Component_dialog_color_type;
use Model\System\LowCode\Dialog\Component_dialog_color_typeQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_dialog_color_type instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "component_dialog_color_type";
	}


	public function getModule(): string
	{
		return "Component_dialog_color_type";
	}


	public function getManager(): FormManager
	{
		return new CrudComponent_dialog_color_typeManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return Component_dialog_color_typeQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof Component_dialog_color_type){
		    LogActivity::register("System", "component_dialog_color_type verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("component_dialog_color_type verwijderd.");
		}
		else
		{
		       StatusMessage::warning("component_dialog_color_type niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit component_dialog_color_type item wilt verwijderen?");
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
