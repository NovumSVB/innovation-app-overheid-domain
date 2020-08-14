<?php
use Core\Cfg;

/***
* This file is generated, please do not modify manually.
*/

if(isset($_SERVER['IS_DEVEL']))
{
    $aConfig = [
        'PROTOCOL' => 'http',
        'ADMIN_PROTOCOL' => 'http',
        'CUSTOM_FOLDER' => 'NovumOverheid',
        'ABSOLUTE_ROOT' => $_SERVER['SYSTEM_ROOT'],
        'DOMAIN' => 'overheid.demo.novum.nuidev.nl',
        /* Je zoekt waarschijnlijk Config::getDataDir() */
        'DATA_DIR' => '../'
    ];
}
else
{
    $aConfig = [
        'PROTOCOL' => 'https',
        'ADMIN_PROTOCOL' => 'https',
        'CUSTOM_FOLDER' => 'NovumOverheid',
        'DOMAIN' => 'overheid.demo.novum.nuidev.nl',
        'ABSOLUTE_ROOT' => '/var/www/1overheid/overheid/system/',
        'DATA_DIR' => '/home/novum/data/overheid'
    ];
}

$aConfig['CUSTOM_NAMESPACE'] = 'NovumOverheid';

Cfg::set($aConfig);

