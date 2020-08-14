<?php
namespace Crud\Custom\NovumOverheid\LifeEventListener\Field\Base;

use Core\Utils;
use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IFilterableLookupField;
use Crud\IRequiredField;
use Model\System\DataSourceQuery;

/**
 * Base class that represents the 'datasource_endpoint_id' crud field from the 'life_event_listener' table.
 * This class is auto generated and should not be modified.
 */
abstract class DatasourceEndpointId extends GenericLookup implements IFilterableField, IEditableField, IFilterableLookupField, IRequiredField
{
	protected $sFieldName = 'datasource_endpoint_id';

	protected $sFieldLabel = 'Bestemming';

	protected $sIcon = 'globe';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getDatasourceEndpointId';

	protected $sFqModelClassname = '\Model\Custom\NovumOverheid\LifeEventListener';


	public function isUniqueKey(): bool
	{
		return false;
	}


	public function getLookups($mSelectedItem = null)
	{
		$aAllRows = \Model\System\DataSourceQuery::create()->orderByitemUrl()->find();
		$aOptions = \Core\Utils::makeSelectOptions($aAllRows, "getitemUrl", $mSelectedItem, "getId");
		return $aOptions;
	}


	public function getVisibleValue($iItemId = null)
	{
		if($iItemId){
		    return \Model\System\DataSourceQuery::create()->findOneById($iItemId)->getitemUrl();
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


		if(!isset($aPostedData['datasource_endpoint_id']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Bestemming" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
