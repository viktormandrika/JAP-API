<?php


namespace lib;


use traits\Request;

class Orders
{
    use Request;
    /**
     * @property array $fields
     * @property object $service
     * @property integer $order
       */
    protected $fields = [];
    protected $service;
    protected $order;

    public function __construct($order = null)
    {
        $this->data['key'] = Config::$key;
        $this->url = Config::$url;
        $this->fields['order'] = $order;

        return $this;
    }

    public function setFields(array $data)
    {
        foreach ($data as $field => $value) {
            $this->fields{$field} = $value;
        }
        return $this;
    }

    public static function newOrder($service, array $fields)
    {
        $order = new self();
        $order->fields['action'] = 'add';
        $order->service = $service;
        $order->fields['service'] = $service->service;
        foreach (ServiceType::getFields($service->type) as $key => $data) {
            $order->fields{$data} = null;
        }
        $order->setFields($fields)->setRequest($order->fields)->request()->asArray();
        return $order;
    }

    public static function getStatus($order)
    {
        $obj = new self($order);
        $obj->data['action'] = 'status';
        $obj->setRequest($obj->fields)->request()->asJson();
        return $obj;
    }
}