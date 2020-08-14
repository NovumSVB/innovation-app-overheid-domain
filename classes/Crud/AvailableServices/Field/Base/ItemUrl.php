<?php
namespace Crud\Custom\NovumOverheid\AvailableServices\Field\Base;

use Crud\Generic\Field\GenericString;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'item_url' crud field from the 'available_services' table.
 * This class is auto generated and should not be modified.
 */
abstract class ItemUrl extends GenericString implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'item_url';

	protected $sFieldLabel = 'Item url';

	protected $sIcon = 'globe';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getItemUrl';

	protected $sFqModelClassname = '\Model\Custom\NovumOverheid\AvailableServices';


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


		if(!isset($aPostedData['item_url']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Item url" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
