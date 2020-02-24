<?php


namespace lib;

/**
 * Class Services
 * @package lib
 * @property string $service
 * @property string $name
 * @property string $type
 * @property string $category
 * @property string $rate
 * @property integer $min
 * @property integer $max
 * @property integer $average_time
 * @property boolean $dripfeed
 *
 */
class Services
{
    public $service;
    public $name;
    public $type;
    public $category;
    public $rate;
    public $min;
    public $max;
    public $dripfeed;
    public $average_time;

    public function __construct($data = [])
    {
        if ($data) {
            $this->load($data);
        }
    }

    public function load($data)
    {
        foreach ((array)$data as $key => $datum) {
            $this->{$key} = $datum;
        }
    }

    public function getFields()
    {
        return ServiceType::getFields($this->type);
    }

}