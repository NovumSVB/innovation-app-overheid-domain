<?php
namespace Crud\Custom\NovumOverheid\LifeEvent\Field\Base;

use Crud\Generic\Field\GenericString;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'event_name' crud field from the 'life_event' table.
 * This class is auto generated and should not be modified.
 */
abstract class EventName extends GenericString implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'event_name';

	protected $sFieldLabel = 'Gebeurtenis';

	protected $sIcon = 'tag';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getEventName';

	protected $sFqModelClassname = '\Model\Custom\NovumOverheid\LifeEvent';


	public function isUniqueKey(): bool
	{
		return false;
	}


	public function hasValidations()
	{
		return true;
	}


	public function validate($aPostedData)
	{
		$mResponse = false;
		$mParentResponse = parent::validate($aPostedData);


		if(!isset($aPostedData['event_name']))
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
