<?php

/**
 * Challonge's Participant API class
 */
class ChallongeParticipant extends ChallongeAPI
{
    protected $tournament_id;

    public function __construct($tournament_id)
    {
        $this->tournament_id = $tournament_id;
    }

    public function reqIndex()
    {
        return $this->request("/{$this->tournament_id}/participants");
    }

    public function reqCreate()
    {
        return $this->request("/{$this->tournament_id}/participants", 'post');
    }

    public function reqShow($id)
    {
        return $this->request("/{$this->tournament_id}/participants/$id");
    }

    public function reqUpdate($id)
    {
        return $this->request("/{$this->tournament_id}/participants/$id", 'put');
    }

    public function reqDestroy($id)
    {
        return $this->request("/{$this->tournament_id}/participants/$id", 'delete');
    }

    public function reqRandomize()
    {
        return $this->request("/{$this->tournament_id}/participants/randomize", 'post');
    }
}

