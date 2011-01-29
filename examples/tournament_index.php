<?php

require_once(dirname(__FILE__) . '/../src/Challonge/API.php');
$file = dirname(__FILE__) . '/config.php';
if (file_exists($file))
{
    require_once($file);
}

$tournament = new ChallongeTournament();
$xml = $tournament->reqIndex();
var_dump($xml->asXML());

