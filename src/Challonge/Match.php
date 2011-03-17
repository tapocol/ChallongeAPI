<?php

/**
 * Challonge's Match API class
 */
class ChallongeMatch extends ChallongeAPI
{
    protected $tournament_id;

    public function __construct($tournament_id)
    {
        $this->tournament_id = $tournament_id;
    }

    public function reqIndex()
    {
        return $this->request("/{$this->tournament_id}/matches");
    }

    public function reqShow($id)
    {
        return $this->request("/{$this->tournament_id}/matches/$id");
    }

    public function reqUpdate($id)
    {
        return $this->request("/{$this->tournament_id}/matches/$id", 'put');
    }
}

