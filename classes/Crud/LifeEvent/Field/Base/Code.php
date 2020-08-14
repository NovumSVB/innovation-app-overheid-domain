<?php
namespace Crud\Custom\NovumOverheid\LifeEvent\Field\Base;

use Crud\Generic\Field\GenericString;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'code' crud field from the 'life_event' table.
 * This class is auto generated and should not be modified.
 */
abstract class Code extends GenericString implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'code';

	protected $sFieldLabel = 'Afkorting, read-only';

	protected $sIcon = 'tag';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getCode';

	protected $sFqModelClassname = '\Model\Custom\NovumOverheid\LifeEvent';


	public function isUniqueKey(): bool
	{
		return true;
	}


	public function hasValidations()
	{
		return true;
	}


	public function validate($aPostedData)
	{
		$mResponse = false;
		$mParentResponse = parent::validate($aPostedData);


		if(!isset($aPostedData['code']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Afkorting, read-only" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
