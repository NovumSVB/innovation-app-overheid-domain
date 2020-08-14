<?php 
namespace Crud\Custom\NovumOverheid\LifeEvent\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumOverheid\LifeEvent;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof LifeEvent)
		{
		     return "/custom/novumoverheid/lifeevents/life_event/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof LifeEvent)
		{
		     return "/custom/novumoverheid/life_event?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
