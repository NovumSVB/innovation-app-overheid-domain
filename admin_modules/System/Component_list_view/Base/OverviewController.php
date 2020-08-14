<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_list_view\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Component_list_view\CrudComponent_list_viewManager;
use Crud\FormManager;
use Model\System\LowCode\ListView\Component_list_view;
use Model\System\LowCode\ListView\Component_list_viewQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_list_view instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "component_list_view";
	}


	public function getModule(): string
	{
		return "Component_list_view";
	}


	public function getManager(): FormManager
	{
		return new CrudComponent_list_viewManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return Component_list_viewQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof Component_list_view){
		    LogActivity::register("System", "component_list_view verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("component_list_view verwijderd.");
		}
		else
		{
		       StatusMessage::warning("component_list_view niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit component_list_view item wilt verwijderen?");
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
