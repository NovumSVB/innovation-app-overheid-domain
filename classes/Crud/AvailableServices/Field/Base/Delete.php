<?php 
namespace Crud\Custom\NovumOverheid\AvailableServices\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumOverheid\AvailableServices;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof AvailableServices)
		{
		     return "/custom/novumoverheid/services/available_services/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof AvailableServices)
		{
		     return "/custom/novumoverheid/available_services?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
