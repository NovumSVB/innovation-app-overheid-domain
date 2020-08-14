<?php
namespace Crud\Custom\NovumOverheid\Verliespartner\Field\Base;

use Crud\Generic\Field\GenericTextarea;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'doodsoorzaak' crud field from the 'verlies_partner' table.
 * This class is auto generated and should not be modified.
 */
abstract class Doodsoorzaak extends GenericTextarea implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'doodsoorzaak';

	protected $sFieldLabel = 'Omschrijving';

	protected $sIcon = 'info';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getDoodsoorzaak';

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


		if(!isset($aPostedData['doodsoorzaak']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Omschrijving" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
