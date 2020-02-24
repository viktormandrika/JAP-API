<?php


namespace lib;


class ServiceType
{
    const TYPE_DEFAULT = 'Default';
    const TYPE_PACKAGE = 'Package';

    public $fields = [
        self::TYPE_DEFAULT => ['link', 'quantity', 'runs', 'interval'],
        self::TYPE_PACKAGE => ['link'],
    ];

    public static function getFields($type)
    {
        $obf = new self();
        return $obf->fields[$type];
    }


}