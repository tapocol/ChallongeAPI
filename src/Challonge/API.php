<?php

require_once(dirname(__FILE__) . '/Tournament.php');
require_once(dirname(__FILE__) . '/Participant.php');
require_once(dirname(__FILE__) . '/Match.php');

define('CHALLONGE_RESPONSE_OK', '200');
define('CHALLONGE_RESPONSE_INVALID_KEY', '401');
define('CHALLONGE_RESPONSE_NOT_FOUND', '404');
define('CHALLONGE_RESPONSE_VALIDATION_ERROR', '422');

class ChallongeAPI
{
    const API_URL = 'https://api.challonge.com/v1/';
    const API_EXT = '.xml';
    static public $api_key;
    protected $params = array();

    public function setParam($name, $value)
    {
        $this->params[$name] = $value;
    }

    public function getParam($name, $default = null)
    {
        return array_key_exists($name, $this->params) ? $this->params[$name] : $default;
    }

    public function setParams($params)
    {
        foreach ($params as $name => $value)
        {
            $this->setParam($name, $value);
        }
    }

    public function request($url_append = '', $method = 'get', $params = array())
    {
        $params = array_merge($this->params, $params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        switch($method)
        {
            case 'get':
                curl_setopt($ch, CURLOPT_URL, $this->prepareURL($url_append, $params));
				break;
            case 'post':
                curl_setopt($ch, CURLOPT_URL, $this->prepareURL($url_append));
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params, '', '&'));
                break;
            case 'put':
                $params['_method'] = 'put';
                curl_setopt($ch, CURLOPT_URL, $this->prepareURL($url_append));
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params, '', '&'));
                break;
            case 'delete':
                $params['_method'] = 'delete';
                curl_setopt($ch, CURLOPT_URL, $this->prepareURL($url_append));
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params, '', '&'));
                break;
            default:
                return false;
        }
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        if ($response === false)
        {
            $response = '<local><error>' . curl_error($ch) . '</error></local>';
        }
        curl_close($ch);
        return $this->handleResponse($response);
    }

    public function prepareURL($url_append, $params = array())
    {
		return self::API_URL . $url_append . self::API_EXT . '?' . http_build_query(array_merge($params, array('api_key' => self::$api_key)), '', '&');
    }

    protected function handleResponse($response)
    {
        libxml_use_internal_errors(true);
        try{
            $return_object = new SimpleXMLElement($response);
            //For some html responses, an exception isn't thrown.
            if(!$return_object){
                return simplexml_load_string('<local><error> Unable to parse XML </error></local>');
            }
        }
        catch(Exception $e)
        {
            return simplexml_load_string('<local><error> Unable to parse XML </error></local>');
        }
        return $return_object;
    }
}

