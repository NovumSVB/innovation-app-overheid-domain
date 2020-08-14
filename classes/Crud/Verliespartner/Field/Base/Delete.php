<?php 
namespace Crud\Custom\NovumOverheid\Verliespartner\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumOverheid\Verliespartner;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Verliespartner)
		{
		     return "/custom/novumoverheid/verliespartner/verlies_partner/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Verliespartner)
		{
		     return "/custom/novumoverheid/verlies_partner?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
