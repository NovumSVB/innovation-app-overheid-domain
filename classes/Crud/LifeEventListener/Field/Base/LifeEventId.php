<?php
namespace Crud\Custom\NovumOverheid\LifeEventListener\Field\Base;

use Core\Utils;
use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IFilterableLookupField;
use Crud\IRequiredField;
use Model\Custom\NovumOverheid\LifeEventQuery;

/**
 * Base class that represents the 'life_event_id' crud field from the 'life_event_listener' table.
 * This class is auto generated and should not be modified.
 */
abstract class LifeEventId extends GenericLookup implements IFilterableField, IEditableField, IFilterableLookupField, IRequiredField
{
	protected $sFieldName = 'life_event_id';

	protected $sFieldLabel = 'Gebeurtenis';

	protected $sIcon = 'flash';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getLifeEventId';

	protected $sFqModelClassname = '\Model\Custom\NovumOverheid\LifeEventListener';


	public function isUniqueKey(): bool
	{
		return false;
	}


	public function getLookups($mSelectedItem = null)
	{
		$aAllRows = \Model\Custom\NovumOverheid\LifeEventQuery::create()->orderByeventName()->find();
		$aOptions = \Core\Utils::makeSelectOptions($aAllRows, "geteventName", $mSelectedItem, "getId");
		return $aOptions;
	}


	public function getVisibleValue($iItemId = null)
	{
		if($iItemId){
		    return \Model\Custom\NovumOverheid\LifeEventQuery::create()->findOneById($iItemId)->geteventName();
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


		if(!isset($aPostedData['life_event_id']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Gebeurtenis" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
