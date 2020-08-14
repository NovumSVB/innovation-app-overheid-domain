<?php
namespace AdminModules\Custom\NovumOverheid\System\Component_modal_render_style\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Component_modal_render_style\CrudComponent_modal_render_styleManager;
use Crud\FormManager;
use Model\System\LowCode\Modal\Component_modal_render_style;
use Model\System\LowCode\Modal\Component_modal_render_styleQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumOverheid\System\Component_modal_render_style instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "component_modal_render_style";
	}


	public function getModule(): string
	{
		return "Component_modal_render_style";
	}


	public function getManager(): FormManager
	{
		return new CrudComponent_modal_render_styleManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return Component_modal_render_styleQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof Component_modal_render_style){
		    LogActivity::register("System", "component_modal_render_style verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("component_modal_render_style verwijderd.");
		}
		else
		{
		       StatusMessage::warning("component_modal_render_style niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit component_modal_render_style item wilt verwijderen?");
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
