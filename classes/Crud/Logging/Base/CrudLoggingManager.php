<?php
namespace Crud\Custom\NovumOverheid\Logging\Base;

use Crud\Custom\NovumOverheid;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumOverheid\Logging;
use Model\Custom\NovumOverheid\LoggingQuery;
use Model\Custom\NovumOverheid\Map\LoggingTableMap;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Logging instead if you need to override or add functionality.
 */
abstract class CrudLoggingManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumOverheid\CrudTrait;
	use NovumOverheid\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return LoggingQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumOverheid\Map\LoggingTableMap();
	}


	public function getShortDescription(): string
	{
		return "Alle beschikbare overheidsdiensten.";
	}


	public function getEntityTitle(): string
	{
		return "Logging";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumoverheid/services/logging/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumoverheid/services/logging/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Logging toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Logging aanpassen";
	}


	public function getDefaultOverviewFields(): array
	{
		return ['DatasourceId', 'Delete', 'Edit'];
	}


	public function getDefaultEditFields(): array
	{
		return ['DatasourceId'];
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return Logging
	 */
	public function getModel(array $aData = null): Logging
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oLoggingQuery = LoggingQuery::create();
		     $oLogging = $oLoggingQuery->findOneById($aData['id']);
		     if (!$oLogging instanceof Logging) {
		         throw new LogicException("Logging should be an instance of Logging but got something else." . __METHOD__);
		     }
		     $oLogging = $this->fillVo($aData, $oLogging);
		}
		else {
		     $oLogging = new Logging();
		     if (!empty($aData)) {
		         $oLogging = $this->fillVo($aData, $oLogging);
		     }
		}
		return $oLogging;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Logging
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Logging
	{
		$oLogging = $this->getModel($aData);


		 if(!empty($oLogging))
		 {
		     $oLogging = $this->fillVo($aData, $oLogging);
		     $oLogging->save();
		 }
		return $oLogging;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Logging $oModel
	 * @return Logging
	 */
	protected function fillVo(array $aData, Logging $oModel): Logging
	{
		isset($aData['datasource_id']) ? $oModel->setDatasourceId($aData['datasource_id']) : null;
		return $oModel;
	}
}
