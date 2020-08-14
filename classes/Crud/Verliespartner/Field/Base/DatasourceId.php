<?php
namespace Crud\Custom\NovumOverheid\Verliespartner\Field\Base;

use Core\Utils;
use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IFilterableLookupField;
use Crud\IRequiredField;
use Model\System\DataSourceQuery;

/**
 * Base class that represents the 'datasource_id' crud field from the 'verlies_partner' table.
 * This class is auto generated and should not be modified.
 */
abstract class DatasourceId extends GenericLookup implements IFilterableField, IEditableField, IFilterableLookupField, IRequiredField
{
	protected $sFieldName = 'datasource_id';

	protected $sFieldLabel = 'Databron';

	protected $sIcon = 'globe';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getDatasourceId';

	protected $sFqModelClassname = '\Model\Custom\NovumOverheid\Verliespartner';


	public function isUniqueKey(): bool
	{
		return false;
	}


	public function getLookups($mSelectedItem = null)
	{
		$aAllRows = \Model\System\DataSourceQuery::create()->orderByTitel()->find();
		$aOptions = \Core\Utils::makeSelectOptions($aAllRows, "getTitel", $mSelectedItem, "getId");
		return $aOptions;
	}


	public function getVisibleValue($iItemId = null)
	{
		if($iItemId){
		    return \Model\System\DataSourceQuery::create()->findOneById($iItemId)->getTitel();
		}
		return null;
	}


	public function getDataType(): string
	{
		return 'lookup';
	}


	public function hasValidations()
	{
		return true;
	}


	public function validate($aPostedData)
	{
		$mResponse = false;
		$mParentResponse = parent::validate($aPostedData);


		if(!isset($aPostedData['datasource_id']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Databron" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
