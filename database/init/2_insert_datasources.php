<?php

require_once '0_always_runs.php';

use Model\System\DataSourceQuery;

$aDataSources = [

    [
        'code'          => 'SVB',
        'titel'         => 'Sociale verzekeringsbank',
        'url'           => 'https://api.svb.demo.novum.nu/openapi.json',
        'documentation' => 'https://api.svb.demo.novum.nu/',
        'description'   => 'An API that simulates the dutch government agency "Sociale verzekeringsbank", the organisation that implements the Dutch national insurance schemes including those for old age pension',
        'git_repo'      => 'https://gitlab.com/NovumGit/innovation-app-svb-api',
        'packagist_url' => 'https://packagist.org/packages/novum/api-svb',
        'docker_image'  => ''
    ],
    [
        'code'          => 'BRP',
        'titel'         => 'Basisregistratie persoonsgegevens',
        'url'           => 'https://api.gemeente.demo.novum.nu/openapi.json',
        'description'   => 'An API that simulates the dutch BRP (Basisregistratie persoonsgegevens). The Personal Records Database (BRP) contains the personal data of people who live in the Netherlands (residents) and of people who live abroad.',
        'documentation' => 'https://api.gemeente.demo.novum.nu/',
        'git_repo'      => 'https://gitlab.com/NovumGit/innovation-app-gemeente-api',
        'packagist_url' => 'https://packagist.org/packages/novum/api-gemeente',
        'docker_image'  => ''
    ],

    [
         'code'          => 'UWV',
         'titel'         => 'Uitvoeringsinstituut Werknemersverzekeringen',
         'url'           => 'https://api.uwv.demo.novum.nu/openapi.json',
         'description'   => 'An API that simulates the dutch government agency UWV or Uitvoeringsinstituut Werknemersverzekeringen. The UWV is the Employee Insurance Agency in the Netherlands. They are an independent administrative authority commissioned by the Ministry of Social Affairs and Employment (SZW).',
         'documentation' => 'https://api.uwv.demo.novum.nu/',
         'git_repo'      => 'https://gitlab.com/NovumGit/innovation-app-uwv-api',
         'packagist_url' => 'https://packagist.org/packages/novum/api-uwv',
         'docker_image'  => ''
    ],
    [
        'code'          => 'DIGID',
        'titel'         => 'DigiD',
        'url'           => 'https://api.digid.demo.novum.nu/openapi.json',
        'description'   => 'An API that simulates DigID. DigiD is an identity management platform which government agencies of the Netherlands, including the Tax and Customs Administration and Dienst Uitvoering Onderwijs, can use to verify the identity of Dutch residents on the Internet. ',
        'documentation' => 'https://api.digid.demo.novum.nu/',
        'git_repo'      => 'https://gitlab.com/NovumGit/innovation-app-digid-api',
        'packagist_url' => 'https://packagist.org/packages/novum/api-digid',
        'docker_image'  => ''
    ],
    [
        'code'          => 'BRI',
        'titel'         => 'Belastingdienst',
        'url'           => 'https://api.belastingdienst.demo.novum.nu/openapi.json',
        'description'   => 'An API that simulates the dutch "Basisregistratie inkomen", the main database of the dutch tax authorities.',
        'documentation' => 'https://api.belastingdienst.demo.novum.nu/',
        'git_repo'      => 'https://gitlab.com/NovumGit/innovation-app-belastingdienst-api',
        'packagist_url' => 'https://packagist.org/packages/novum/api-belastingdienst',
        'docker_image'  => ''
    ],
    [
        'code'          => 'BUR',
        'titel'         => 'Burger',
        'url'           => 'https://api.burger.demo.novum.nu/openapi.json',
        'description'   => 'An API intended simulate all dutch civilians and mimic their interactions with their government',
        'documentation' => 'https://api.burger.demo.novum.nu/',
        'git_repo'      => 'https://gitlab.com/NovumGit/innovation-app-burger-api',
        'packagist_url' => 'https://packagist.org/packages/novum/api-burger',
        'docker_image'  => ''
    ],
    [
        'code'          => 'CBS',
        'titel'         => 'Centraal Bureau voor de Statistiek',
        'url'           => 'https://api.cbs.demo.novum.nu/openapi.json',
        'description'   => 'An API that simulates the dutch "Centraal Bureau voor de Statistiek", used for importing real statistical data with the intention of generating a realistic simulation data.',
        'documentation' => 'https://api.cbs.demo.novum.nu/',
        'git_repo'      => 'https://gitlab.com/NovumGit/innovation-app-cbs-api',
        'packagist_url' => 'https://packagist.org/packages/novum/api-cbs',
        'docker_image'  => ''
    ],
    [
        'code'          => 'CJIB',
        'titel'         => 'Centraal Justitieel Incassobureau',
        'url'           => 'https://api.cjib.demo.novum.nu/openapi.json',
        'description'   => 'An API that simulates the dutch government agency "Centraal Justitieel Incassobureau"',
        'documentation' => 'https://api.cjib.demo.novum.nu/',
        'git_repo'      => 'https://gitlab.com/NovumGit/innovation-app-cjib-api',
        'packagist_url' => 'https://packagist.org/packages/novum/api-cjib',
        'docker_image'  => ''
    ],
    [
        'code'          => 'JENV',
        'titel'         => 'Ministerie van Justitie en Veiligheid',
        'url'           => 'https://api.justitie.demo.novum.nu/openapi.json',
        'description'   => 'An API that simulates the dutch ministry of justice (Ministerie van Justitie en Veiligheid)',
        'documentation' => 'https://api.justitie.demo.novum.nu/',
        'git_repo'      => 'https://gitlab.com/NovumGit/innovation-app-justitie-api',
        'packagist_url' => 'https://packagist.org/packages/novum/api-justitie',
        'docker_image'  => ''
    ],
    [
        'code'          => 'EENO',
        'titel'         => 'Een overheid',
        'url'           => 'https://api.overheid.demo.novum.nu',
        'description'   => 'An API that represents the dutch government as a whole. It contains meta information about all the other endpoints. The text that you are reading right now actually comes from this API. ',
        'documentation' => 'https://api.overheid.demo.novum.nu/openapi.json',
        'git_repo'      => 'https://gitlab.com/NovumGit/innovation-app-overheid-api',
        'packagist_url' => 'https://packagist.org/packages/novum/api-overheid',
        'docker_image'  => ''
    ],

];

foreach ($aDataSources as $aDataSource)
{

    $oDataSourceQuery = DataSourceQuery::create();
    $oDataSourceQuery->filterByCode($aDataSource['code']);
    $oDataSource = $oDataSourceQuery->findOneOrCreate();
    $oDataSource->setDescription($aDataSource['description']);

    $oDataSource->setTitel($aDataSource['titel']);
    if (\Core\Environment::isDevel())
    {
        $sDocUrl = str_replace('.novum.nu', '.novum.nuidev.nl', $aDataSource['documentation']);
        $sDocUrl = str_replace('https://', 'http://', $sDocUrl);

        $oDataSource->setDocumentation($sDocUrl);

        $sEndpointUrl = str_replace('.novum.nu', '.novum.nuidev.nl', $aDataSource['url']);
        $sEndpointUrl = str_replace('https://', 'http://', $sEndpointUrl);
        $oDataSource->setUrl($sEndpointUrl);
    } else
    {
        $oDataSource->setDocumentation($aDataSource['documentation']);
        $oDataSource->setUrl($aDataSource['url']);
    }
    $oDataSource->save();
}
