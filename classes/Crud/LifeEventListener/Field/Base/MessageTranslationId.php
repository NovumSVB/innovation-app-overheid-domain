<?php
namespace Crud\Custom\NovumOverheid\LifeEventListener\Field\Base;

use Core\Utils;
use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IFilterableLookupField;
use Crud\IRequiredField;
use Model\Custom\NovumOverheid\MessageTranslationQuery;

/**
 * Base class that represents the 'message_translation_id' crud field from the 'life_event_listener' table.
 * This class is auto generated and should not be modified.
 */
abstract class MessageTranslationId extends GenericLookup implements IFilterableField, IEditableField, IFilterableLookupField, IRequiredField
{
	protected $sFieldName = 'message_translation_id';

	protected $sFieldLabel = 'Bericht vertaling / mapping';

	protected $sIcon = 'globe';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getMessageTranslationId';

	protected $sFqModelClassname = '\Model\Custom\NovumOverheid\LifeEventListener';


	public function isUniqueKey(): bool
	{
		return false;
	}


	public function getLookups($mSelectedItem = null)
	{
		$aAllRows = \Model\Custom\NovumOverheid\MessageTranslationQuery::create()->orderBytitle()->find();
		$aOptions = \Core\Utils::makeSelectOptions($aAllRows, "gettitle", $mSelectedItem, "getId");
		return $aOptions;
	}


	public function getVisibleValue($iItemId = null)
	{
		if($iItemId){
		    return \Model\Custom\NovumOverheid\MessageTranslationQuery::create()->findOneById($iItemId)->gettitle();
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


		if(!isset($aPostedData['message_translation_id']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Bericht vertaling / mapping" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
