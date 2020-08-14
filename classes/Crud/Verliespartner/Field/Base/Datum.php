<?php
namespace Crud\Custom\NovumOverheid\Verliespartner\Field\Base;

use Crud\Generic\Field\GenericDateTime;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'datum' crud field from the 'verlies_partner' table.
 * This class is auto generated and should not be modified.
 */
abstract class Datum extends GenericDateTime implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'datum';

	protected $sFieldLabel = 'Datum';

	protected $sIcon = 'calendar';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getDatum';

	protected $sFqModelClassname = '\Model\Custom\NovumOverheid\Verliespartner';


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


		if(!isset($aPostedData['datum']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Datum" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
