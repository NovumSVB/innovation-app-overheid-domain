<?php
$servicename = 'overheid';
$password = 'Mkwhwm!2020'; // Makkelijker kunnen we het wel maken!

$aScripts = glob('../../_default/novum/*');

foreach ($aScripts as $sScript)
{
    echo "Importing $sScript" . PHP_EOL;
    require_once $sScript;
}

require_once '1_installer_state.php';
require_once '2_insert_datasources.php';
require_once '3_insert_life_events.php';

