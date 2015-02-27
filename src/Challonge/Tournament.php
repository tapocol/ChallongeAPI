<?php

/**
 * Challonge's Tournament API class
 */
class ChallongeTournament extends ChallongeAPI
{
	const PREFIX = "tournaments";
	
	public function reqIndex()
    {
        return $this->request(self::PREFIX);
    }

    public function reqCreate()
    {
        return $this->request(self::PREFIX, 'post');
    }

    public function reqShow($id)
    {
        return $this->request(self::PREFIX."/$id");
    }

    public function reqUpdate($id)
    {
        return $this->request(self::PREFIX."/$id", 'put');
    }

    public function reqDestroy($id)
    {
        return $this->request(self::PREFIX."/$id", 'delete');
    }

    /*public function reqPublish($id)
    {
        return $this->request("/publish/$id", 'post');
    }*/

    public function reqStart($id)
    {
        return $this->request(self::PREFIX."/$id/start", 'post');
    }

    public function reqReset($id)
    {
        return $this->request(self::PREFIX."/$id/reset", 'post');
    }
	
	public function reqFinalize($id)
    {
        return $this->request(self::PREFIX."/$id/finalize", 'post');
    }
	
	public function reqProcessCheckIns($id)
    {
        return $this->request(self::PREFIX."/$id/process_check_ins", 'post');
    }
	
	public function reqAbortCheckIn($id)
    {
        return $this->request(self::PREFIX."/$id/abort_check_in", 'post');
    }
}

