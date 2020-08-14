<?php
namespace Crud\Custom\NovumOverheid\AvailableServices\Base;

use Crud\Custom\NovumOverheid;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumOverheid\AvailableServices;
use Model\Custom\NovumOverheid\AvailableServicesQuery;
use Model\Custom\NovumOverheid\Map\AvailableServicesTableMap;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AvailableServices instead if you need to override or add functionality.
 */
abstract class CrudAvailableServicesManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumOverheid\CrudTrait;
	use NovumOverheid\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return AvailableServicesQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumOverheid\Map\AvailableServicesTableMap();
	}


	public function getShortDescription(): string
	{
		return "Alle beschikbare overheidsdiensten.";
	}


	public function getEntityTitle(): string
	{
		return "AvailableServices";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumoverheid/services/available_services/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumoverheid/services/available_services/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Beschikbare diensten toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Beschikbare diensten aanpassen";
	}


	public function getDefaultOverviewFields(): array
	{
		return ['DatasourceId', 'Title', 'IntroText', 'DefinitieUrl', 'CollectieUrl', 'ItemUrl', 'Delete', 'Edit'];
	}


	public function getDefaultEditFields(): array
	{
		return ['DatasourceId', 'Title', 'IntroText', 'DefinitieUrl', 'CollectieUrl', 'ItemUrl'];
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return AvailableServices
	 */
	public function getModel(array $aData = null): AvailableServices
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oAvailableServicesQuery = AvailableServicesQuery::create();
		     $oAvailableServices = $oAvailableServicesQuery->findOneById($aData['id']);
		     if (!$oAvailableServices instanceof AvailableServices) {
		         throw new LogicException("AvailableServices should be an instance of AvailableServices but got something else." . __METHOD__);
		     }
		     $oAvailableServices = $this->fillVo($aData, $oAvailableServices);
		}
		else {
		     $oAvailableServices = new AvailableServices();
		     if (!empty($aData)) {
		         $oAvailableServices = $this->fillVo($aData, $oAvailableServices);
		     }
		}
		return $oAvailableServices;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return AvailableServices
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): AvailableServices
	{
		$oAvailableServices = $this->getModel($aData);


		 if(!empty($oAvailableServices))
		 {
		     $oAvailableServices = $this->fillVo($aData, $oAvailableServices);
		     $oAvailableServices->save();
		 }
		return $oAvailableServices;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param AvailableServices $oModel
	 * @return AvailableServices
	 */
	protected function fillVo(array $aData, AvailableServices $oModel): AvailableServices
	{
		isset($aData['datasource_id']) ? $oModel->setDatasourceId($aData['datasource_id']) : null;
		isset($aData['title']) ? $oModel->setTitle($aData['title']) : null;
		isset($aData['intro_text']) ? $oModel->setIntroText($aData['intro_text']) : null;
		isset($aData['definitie_url']) ? $oModel->setDefinitieUrl($aData['definitie_url']) : null;
		isset($aData['collectie_url']) ? $oModel->setCollectieUrl($aData['collectie_url']) : null;
		isset($aData['item_url']) ? $oModel->setItemUrl($aData['item_url']) : null;
		return $oModel;
	}
}
