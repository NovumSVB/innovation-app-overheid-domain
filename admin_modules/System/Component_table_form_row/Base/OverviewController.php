<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_table_form_row\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Component_table_form_row\CrudComponent_table_form_rowManager;
use Crud\FormManager;
use Model\System\LowCode\TableFormRow\Component_table_form_row;
use Model\System\LowCode\TableFormRow\Component_table_form_rowQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_table_form_row instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "component_table_form_row";
	}


	public function getModule(): string
	{
		return "Component_table_form_row";
	}


	public function getManager(): FormManager
	{
		return new CrudComponent_table_form_rowManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return Component_table_form_rowQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof Component_table_form_row){
		    LogActivity::register("System", "component_table_form_row verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("component_table_form_row verwijderd.");
		}
		else
		{
		       StatusMessage::warning("component_table_form_row niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit component_table_form_row item wilt verwijderen?");
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
