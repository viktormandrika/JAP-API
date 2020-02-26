<?php


namespace lib;


use traits\Request;

class ServicesWrapper
{
    use Request;

    public $request;
    public $services = [];

    public static function find()
    {
        $model = new self();
        $model->request = $model->setRequest(['action'=>'services'])->request()->asArray();

        return $model;
    }

    public function filter($key, $value)
    {
        $newArr = [];
        foreach ($this->request as $item) {
            if($item[$key] == $value){
                $newArr[] = $item;
            }
        }
        $this->request = $newArr;
        return $this;
    }

    public function all()
    {
        foreach ($this->request as $item) {
            $this->services[] = new Services($item);
        }
        return $this->services;
    }

    public function one()
    {
        return new Services($this->request[0]);
    }

}