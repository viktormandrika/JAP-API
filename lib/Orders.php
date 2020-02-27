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

    /**
     * Orders constructor.
     * @param integer $order
     */
    public function __construct($order = null)
    {
        $this->data['key'] = Config::$key;
        $this->url = Config::$url;
        $this->fields['order'] = $order;

        return $this;
    }

    /**
     * @param array $data
     * @return object $this
     */
    public function setFields(array $data)
    {
        foreach ($data as $field => $value) {
            $this->fields{$field} = $value;
        }
        return $this;
    }

    /**
     * @param object $service
     * @param array $fields
     * @return Orders
     */
    public static function newOrder($service, array $fields)
    {
        $order = new self();
        $order->fields['action'] = 'add';
        $order->service = $service;
        $order->fields['service'] = $service->service;
        return $order->setFields($fields)->setRequest($order->fields)->request();

    }

    /**
     * @property int @order_id
     */
    public static function getStatus($order_id)
    {
        $obj = new self($order_id);
        $obj->data['action'] = 'status';
        return $obj->setRequest($obj->fields)->request();

    }
}