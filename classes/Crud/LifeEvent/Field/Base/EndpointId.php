<?php
namespace Crud\Custom\NovumOverheid\LifeEvent\Field\Base;

use Core\Utils;
use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IFilterableLookupField;
use Crud\IRequiredField;
use Model\System\DataSourceQuery;

/**
 * Base class that represents the 'endpoint_id' crud field from the 'life_event' table.
 * This class is auto generated and should not be modified.
 */
abstract class EndpointId extends GenericLookup implements IFilterableField, IEditableField, IFilterableLookupField, IRequiredField
{
	protected $sFieldName = 'endpoint_id';

	protected $sFieldLabel = 'Herkomst';

	protected $sIcon = 'tag';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getEndpointId';

	protected $sFqModelClassname = '\Model\Custom\NovumOverheid\LifeEvent';


	public function isUniqueKey(): bool
	{
		return false;
	}


	public function getLookups($mSelectedItem = null)
	{
		$aAllRows = \Model\System\DataSourceQuery::create()->orderBytitel()->find();
		$aOptions = \Core\Utils::makeSelectOptions($aAllRows, "gettitel", $mSelectedItem, "getId");
		return $aOptions;
	}


	public function getVisibleValue($iItemId = null)
	{
		if($iItemId){
		    return \Model\System\DataSourceQuery::create()->findOneById($iItemId)->gettitel();
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


		if(!isset($aPostedData['endpoint_id']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Herkomst" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
