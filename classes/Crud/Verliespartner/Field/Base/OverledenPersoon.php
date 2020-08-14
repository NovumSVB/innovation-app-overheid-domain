<?php
namespace Crud\Custom\NovumOverheid\Verliespartner\Field\Base;

use Crud\Generic\Field\GenericString;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'overleden_persoon' crud field from the 'verlies_partner' table.
 * This class is auto generated and should not be modified.
 */
abstract class OverledenPersoon extends GenericString implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'overleden_persoon';

	protected $sFieldLabel = 'BSN overleden persoon';

	protected $sIcon = 'tag';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getOverledenPersoon';

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


		if(!isset($aPostedData['overleden_persoon']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "BSN overleden persoon" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
