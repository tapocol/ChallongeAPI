<?php

/**
 * Challonge's Participant API class
 */
class ChallongeParticipant extends ChallongeAPI
{
    protected $tournament_id;
	const PREFIX = "tournaments";

    public function __construct($tournament_id)
    {
        $this->tournament_id = self::PREFIX."/".$tournament_id;
    }

    public function reqIndex()
    {
        return $this->request("/{$this->tournament_id}/participants");
    }

    public function reqCreate()
    {
        return $this->request("/{$this->tournament_id}/participants", 'post');
    }
	
	public function reqBulkAdd()
    {
        return $this->request("/{$this->tournament_id}/participants/bulk_add", 'post');
    }

    public function reqShow($id)
    {
        return $this->request("/{$this->tournament_id}/participants/$id");
    }

    public function reqUpdate($id)
    {
        return $this->request("/{$this->tournament_id}/participants/$id", 'put');
    }
	
	public function reqCheckIn($id)
    {
        return $this->request("/{$this->tournament_id}/participants/$id/check_in", 'post');
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



