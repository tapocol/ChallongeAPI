<?php

require_once(dirname(__FILE__) . '/../src/Challonge/API.php');
$file = dirname(__FILE__) . '/config.php';
if (file_exists($file))
{
    require_once($file);
}

$tournament = new ChallongeTournament();
$tournament->setParams(array(
    'tournament' => array(
        'name' => 'Test Tournament',
        'tournament_type' => 'single elimination',
        'url' => 'test' . md5(time() . microtime(true))
    )
));
$xml = $tournament->reqCreate();
var_dump($xml->asXML());

