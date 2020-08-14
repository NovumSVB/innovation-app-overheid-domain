<?php
namespace Crud\Custom\NovumOverheid\LifeEventListener\Base;

use Crud\Custom\NovumOverheid;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumOverheid\LifeEventListener;
use Model\Custom\NovumOverheid\LifeEventListenerQuery;
use Model\Custom\NovumOverheid\Map\LifeEventListenerTableMap;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify LifeEventListener instead if you need to override or add functionality.
 */
abstract class CrudLifeEventListenerManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumOverheid\CrudTrait;
	use NovumOverheid\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return LifeEventListenerQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumOverheid\Map\LifeEventListenerTableMap();
	}


	public function getShortDescription(): string
	{
		return "Levensgebeurtenis ontvangers";
	}


	public function getEntityTitle(): string
	{
		return "LifeEventListener";
	}


	public function getOverviewUrl(): string
	{
		return "";
	}


	public function getEditUrl(): string
	{
		return "";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Life event listeners toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Life event listeners aanpassen";
	}


	public function getDefaultOverviewFields(): array
	{
		return ['LifeEventId', 'DatasourceEndpointId', 'MessageTranslationId'];
	}


	public function getDefaultEditFields(): array
	{
		return ['LifeEventId', 'DatasourceEndpointId', 'MessageTranslationId'];
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return LifeEventListener
	 */
	public function getModel(array $aData = null): LifeEventListener
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oLifeEventListenerQuery = LifeEventListenerQuery::create();
		     $oLifeEventListener = $oLifeEventListenerQuery->findOneById($aData['id']);
		     if (!$oLifeEventListener instanceof LifeEventListener) {
		         throw new LogicException("LifeEventListener should be an instance of LifeEventListener but got something else." . __METHOD__);
		     }
		     $oLifeEventListener = $this->fillVo($aData, $oLifeEventListener);
		}
		else {
		     $oLifeEventListener = new LifeEventListener();
		     if (!empty($aData)) {
		         $oLifeEventListener = $this->fillVo($aData, $oLifeEventListener);
		     }
		}
		return $oLifeEventListener;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return LifeEventListener
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): LifeEventListener
	{
		$oLifeEventListener = $this->getModel($aData);


		 if(!empty($oLifeEventListener))
		 {
		     $oLifeEventListener = $this->fillVo($aData, $oLifeEventListener);
		     $oLifeEventListener->save();
		 }
		return $oLifeEventListener;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param LifeEventListener $oModel
	 * @return LifeEventListener
	 */
	protected function fillVo(array $aData, LifeEventListener $oModel): LifeEventListener
	{
		isset($aData['life_event_id']) ? $oModel->setLifeEventId($aData['life_event_id']) : null;
		isset($aData['datasource_endpoint_id']) ? $oModel->setDatasourceEndpointId($aData['datasource_endpoint_id']) : null;
		isset($aData['message_translation_id']) ? $oModel->setMessageTranslationId($aData['message_translation_id']) : null;
		return $oModel;
	}
}
