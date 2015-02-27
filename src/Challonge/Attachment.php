<?php

/**
 * Challonge's Match API class
 */
class ChallongeAttachment extends ChallongeAPI
{
    protected $tournament_id;
	const PREFIX = "tournaments";

    public function __construct($tournament_id, $match_id)
    {
        $this->ids = self::PREFIX."/".$tournament_id."/matches/".$match_id."/attachments";
    }

    public function reqIndex()
    {
        return $this->request("/{$this->ids}");
    }

    public function reqCreate()
    {
        return $this->request("/{$this->ids}",'post');
    }

    public function reqShow($id)
    {
        return $this->request("/{$this->ids}/$id");
    }
	
	public function reqUpdate($id)
    {
        return $this->request("/{$this->ids}/$id",'put');
    }
	
	public function reqDestroy($id)
    {
        return $this->request("/{$this->ids}/$id",'delete');
    }
}

