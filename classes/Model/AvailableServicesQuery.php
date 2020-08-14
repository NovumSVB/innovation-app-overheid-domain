<?php

namespace Model\Custom\NovumOverheid;

use Model\Custom\NovumOverheid\Base\AvailableServicesQuery as BaseAvailableServicesQuery;
use Model\System\DataSourceQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'available_services' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class AvailableServicesQuery extends BaseAvailableServicesQuery
{

    function __construct(string $dbName = 'hurah', string $modelName = '\\Model\\Custom\\NovumOverheid\\AvailableServices', ?string $modelAlias = null)
    {

        $oDataSourceQuery = DataSourceQuery::create();

        $aAllDataSources = $oDataSourceQuery->find();

        foreach($aAllDataSources as $oDataSource)
        {
            $oDataSource->getUrl();

            // $oDataSource->toArray()->get
            // var_dump($oDataSource->toArray());
        }

        exit();


        parent::__construct($dbName, $modelName, $modelAlias);
    }


}
