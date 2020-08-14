<?php
namespace Crud\Custom\NovumOverheid\LifeEvent\Base;

use Crud\Custom\NovumOverheid;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumOverheid\LifeEvent;
use Model\Custom\NovumOverheid\LifeEventQuery;
use Model\Custom\NovumOverheid\Map\LifeEventTableMap;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify LifeEvent instead if you need to override or add functionality.
 */
abstract class CrudLifeEventManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumOverheid\CrudTrait;
	use NovumOverheid\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return LifeEventQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumOverheid\Map\LifeEventTableMap();
	}


	public function getShortDescription(): string
	{
		return "Levensgebeurtenissen.";
	}


	public function getEntityTitle(): string
	{
		return "LifeEvent";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumoverheid/lifeevents/life_event/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumoverheid/lifeevents/life_event/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Life event toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Life event aanpassen";
	}


	public function getDefaultOverviewFields(): array
	{
		return ['EventName', 'Code', 'EndpointId', 'Delete', 'Edit'];
	}


	public function getDefaultEditFields(): array
	{
		return ['EventName', 'Code', 'EndpointId'];
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return LifeEvent
	 */
	public function getModel(array $aData = null): LifeEvent
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oLifeEventQuery = LifeEventQuery::create();
		     $oLifeEvent = $oLifeEventQuery->findOneById($aData['id']);
		     if (!$oLifeEvent instanceof LifeEvent) {
		         throw new LogicException("LifeEvent should be an instance of LifeEvent but got something else." . __METHOD__);
		     }
		     $oLifeEvent = $this->fillVo($aData, $oLifeEvent);
		}
		else {
		     $oLifeEvent = new LifeEvent();
		     if (!empty($aData)) {
		         $oLifeEvent = $this->fillVo($aData, $oLifeEvent);
		     }
		}
		return $oLifeEvent;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return LifeEvent
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): LifeEvent
	{
		$oLifeEvent = $this->getModel($aData);


		 if(!empty($oLifeEvent))
		 {
		     $oLifeEvent = $this->fillVo($aData, $oLifeEvent);
		     $oLifeEvent->save();
		 }
		return $oLifeEvent;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param LifeEvent $oModel
	 * @return LifeEvent
	 */
	protected function fillVo(array $aData, LifeEvent $oModel): LifeEvent
	{
		isset($aData['event_name']) ? $oModel->setEventName($aData['event_name']) : null;
		isset($aData['code']) ? $oModel->setCode($aData['code']) : null;
		isset($aData['endpoint_id']) ? $oModel->setEndpointId($aData['endpoint_id']) : null;
		return $oModel;
	}
}
