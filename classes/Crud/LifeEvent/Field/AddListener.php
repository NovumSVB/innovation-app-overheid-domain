<?php
namespace Crud\Custom\NovumOverheid\LifeEvent\Field;

use Core\DeferredAction;
use Crud\Field;
use Crud\IEventField;
use Exception\LogicException;
use Model\System\DataSource;

class AddListener extends Field implements IEventField{

    protected $sFieldLabel = 'Listener toevoegen';

    function getIcon()
    {
        return 'comment-o';
    }

    function hasValidations() { return false; }
    function validate($aPostedData)
    {
        $mResponse = false;
        return $mResponse;
    }
    function getFieldTitle(){
        return $this->sFieldLabel;
    }
    function getOverviewHeader()
    {
        $aOut = [];
        $aOut[] = '<th class="iconcol">';
        $aOut[] = '    <a href="#" class="btn btn-default br2 btn-xs">';
        $aOut[] = '        <i class="fa fa-' . $this->getIcon() .'"></i>';
        $aOut[] = '    </a>';
        $aOut[] = '</th>';
        return join(PHP_EOL, $aOut);
    }
    function getOverviewValue($oDataSource)
    {
        if(!$oDataSource instanceof DataSource)
        {
            throw new LogicException("Expected an instance of Product, got ".get_class($mData));
        }

        $sReturnUrl = DeferredAction::get('after_view_endpoints');

        $aOut = [];
        $aOut[] = '<td class="xx">';
        $aOut[] = "    <a title=\"Bekijk endpoints\" href=\"/system/datasource_endpoint/overview?filter[data_source_id]=" . $oDataSource->getId() . "\" class=\"btn btn-success br2 btn-xs fs12 d\">";
        $aOut[] = '         <i class="fa fa-'.$this->getIcon().'"></i>';
        $aOut[] = '    </a>';

        $aOut[] = '</td>';

        return join(PHP_EOL, $aOut);
    }
    function getEditHtml($mData, $bReadonly)
    {
        throw new LogicException("Add field should not be there in edit view.");
    }
}
