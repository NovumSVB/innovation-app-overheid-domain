<?php 
namespace Crud\Custom\NovumOverheid\Logging\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumOverheid\Logging;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Logging)
		{
		     return "/custom/novumoverheid/services/logging/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Logging)
		{
		     return "/custom/novumoverheid/logging?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
