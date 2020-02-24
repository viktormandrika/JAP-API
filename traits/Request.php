<?php


namespace traits;


trait Request
{
    protected $_request;

    protected function request()
    {
        $url = 'https://justanotherpanel.com/api/v2';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "key=1875208bfb0cb03d1f5a1e797a62228a&action=services");

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