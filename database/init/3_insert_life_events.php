<?php
use Model\Custom\NovumOverheid\LifeEventQuery;
use Model\Custom\NovumOverheid\LifeEvent;

$aLifeEvents = [

    ["Ouderlijk huis verlaten", 'OHV'],
    ["Verlies van partner", 'VVP'],
    ["Rijbewijs halen", 'RBH'],
    ["Diploma behaald", 'DPB'],
    ["Relatiebreuk", 'RB'],
    ["Huwelijk", 'HUW'],
    ["Geregistreerd partnerschap", 'GPS'],
    ["Start pensioen", 'PEN'],
    ["Emigratie", 'EMI'],
    ["Studeren", 'STU'],
    ["Werkloos", 'WL'],
    ["Ouder worden", 'HUW'],
    ["Overleiden", 'OVL'],
    ["Verhuizen", 'VH'],
];

foreach($aLifeEvents as $aLifeEvent)
{
    echo "Add " . $aLifeEvent[0] . PHP_EOL;
    $oLifeEventQuery = LifeEventQuery::create();
    $oLifeEventQuery->filterByCode($aLifeEvent[1]);
    $oLifeEvent = $oLifeEventQuery->findOneOrCreate();
    $oLifeEvent->setEventName($aLifeEvent[0]);
    $oLifeEvent->save();
}
