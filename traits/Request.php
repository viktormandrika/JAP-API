<?php


namespace traits;


use lib\Config;
use lib\Debug;

trait Request
{
    /**
     * Class Services
     * @package lib
     * @property array $_request
     * @property string $url
     * @property array $data
     *
     */
    protected $_request;
    protected $url;
    protected $data = [];

    public function __construct()
    {
        $this->data['key'] = Config::$key;
        $this->url = Config::$url;
        return $this;

    }

    public function setRequest($data)
    {
        foreach ((array)$data as $key => $datum) {
            $this->data{$key} = $datum;
        }
        return $this;
    }

    protected function request()
    {
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $this->_request = curl_exec($ch);

        return $this;

    }

    protected function asJson()
    {

        return $this->_request;
    }

    protected function asArray()
    {
        return json_decode($this->_request, true);
    }

}