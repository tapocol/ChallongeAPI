SUMMARY
-------

This is a thin PHP library for integration with the Challonge API. Uses cURL for http request and SimpleXML for the response handling. Just appends API Key

EXAMPLE
-------

    <?php
    
    require_once(dirname(__FILE__) . '/../src/Challonge/API.php');
    ChallongeAPI::$api_key = '# YOUR API KEY #';
    
    $tournament = new ChallongeTournament();
    $tournament->setParams(array(
        'tournament' => array(
            'name' => 'Test Tournament',
            'tournament_type' => 'single elimination',
            'url' => 'test' . md5(time() . microtime(true))
        )
    ));
    $xml = $tournament->reqCreate();

