<?php

/**
 * Challonge's Tournament API class
 */
class ChallongeTournament extends ChallongeAPI
{
    public function reqIndex()
    {
        return $this->request();
    }

    public function reqCreate()
    {
        return $this->request('', 'post');
    }

    public function reqShow($id)
    {
        return $this->request("/$id");
    }

    public function reqUpdate($id)
    {
        return $this->request("/$id", 'put');
    }

    public function reqDestroy($id)
    {
        return $this->request("/$id", 'delete');
    }

    public function reqPublish($id)
    {
        return $this->request("/publish/$id", 'post');
    }

    public function reqStart($id)
    {
        return $this->request("/start/$id", 'post');
    }

    public function reqReset($id)
    {
        return $this->request("/reset/$id", 'post');
    }
}

