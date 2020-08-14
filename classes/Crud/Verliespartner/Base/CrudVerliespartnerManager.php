<?php
namespace Crud\Custom\NovumOverheid\Verliespartner\Base;

use Crud\Custom\NovumOverheid;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumOverheid\Map\VerliespartnerTableMap;
use Model\Custom\NovumOverheid\Verliespartner;
use Model\Custom\NovumOverheid\VerliespartnerQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Verliespartner instead if you need to override or add functionality.
 */
abstract class CrudVerliespartnerManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumOverheid\CrudTrait;
	use NovumOverheid\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return VerliespartnerQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumOverheid\Map\VerliespartnerTableMap();
	}


	public function getShortDescription(): string
	{
		return "Verlies partner endpointn.";
	}


	public function getEntityTitle(): string
	{
		return "Verliespartner";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumoverheid/verliespartner/verlies_partner/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumoverheid/verliespartner/verlies_partner/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Verlies partner toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Verlies partner aanpassen";
	}


	public function getDefaultOverviewFields(): array
	{
		return ['OverledenPersoon', 'Doodsoorzaak', 'Datum', 'DatasourceId', 'Delete', 'Edit'];
	}


	public function getDefaultEditFields(): array
	{
		return ['OverledenPersoon', 'Doodsoorzaak', 'Datum', 'DatasourceId'];
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return Verliespartner
	 */
	public function getModel(array $aData = null): Verliespartner
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oVerliespartnerQuery = VerliespartnerQuery::create();
		     $oVerliespartner = $oVerliespartnerQuery->findOneById($aData['id']);
		     if (!$oVerliespartner instanceof Verliespartner) {
		         throw new LogicException("Verliespartner should be an instance of Verliespartner but got something else." . __METHOD__);
		     }
		     $oVerliespartner = $this->fillVo($aData, $oVerliespartner);
		}
		else {
		     $oVerliespartner = new Verliespartner();
		     if (!empty($aData)) {
		         $oVerliespartner = $this->fillVo($aData, $oVerliespartner);
		     }
		}
		return $oVerliespartner;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Verliespartner
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Verliespartner
	{
		$oVerliespartner = $this->getModel($aData);


		 if(!empty($oVerliespartner))
		 {
		     $oVerliespartner = $this->fillVo($aData, $oVerliespartner);
		     $oVerliespartner->save();
		 }
		return $oVerliespartner;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Verliespartner $oModel
	 * @return Verliespartner
	 */
	protected function fillVo(array $aData, Verliespartner $oModel): Verliespartner
	{
		isset($aData['overleden_persoon']) ? $oModel->setOverledenPersoon($aData['overleden_persoon']) : null;
		isset($aData['doodsoorzaak']) ? $oModel->setDoodsoorzaak($aData['doodsoorzaak']) : null;
		isset($aData['datum']) ? $oModel->setDatum($aData['datum']) : null;
		isset($aData['datasource_id']) ? $oModel->setDatasourceId($aData['datasource_id']) : null;
		return $oModel;
	}
}
