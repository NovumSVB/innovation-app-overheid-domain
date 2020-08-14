<?php
namespace Crud\Custom\NovumOverheid\LifeEventListener\Field\Base;

use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'endpoint_id' crud field from the 'life_event_listener' table.
 * This class is auto generated and should not be modified.
 */
abstract class EndpointId extends GenericLookup implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'endpoint_id';

	protected $sFieldLabel = 'Bestemming';

	protected $sIcon = 'globe';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getEndpointId';

	protected $sFqModelClassname = '\Model\Custom\NovumOverheid\LifeEventListener';


	public function isUniqueKey(): bool
	{
		return false;
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
		     $mResponse[] = 'Het veld "Bestemming" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
