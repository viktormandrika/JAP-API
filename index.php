<?php

require_once __DIR__ . '/vendor/autoload.php';


//$res = \lib\ServicesWrapper::find()->filter('category', '♛ Instagram Auto Comments / Impressions / Saves / Reach')->filter('type', \lib\ServiceType::TYPE_PACKAGE)->one();
$service = \lib\ServicesWrapper::find()->filter('service', 2192)->one();


\lib\Debug::prn($service->getFields());
$order = \lib\Orders::newOrder($service, ['link' => 'instagram.com', 'quantity' => 10]);

echo 'Объект заказа';
\lib\Debug::prn($order);


$status = \lib\Orders::getStatus(153819226);
\lib\Debug::prn($status);


/**
 * Создать заказ
 * Статический метод newOrder в классе Orders
 * newOrder принимает объект сервиса первым параметром и массив полей вторым.
 *
 * Проверка статусе
 * Статический метод getStatus в классе Orders
 * getStatus принимает ID заказа
 *
 * Последовательность
 * 1. Загрузка сервиса по ID через ServiceWrapper
 * $service = ServicesWrapper::find()->filter('service', 2192)->one();
 *
 * 2. затем передаем объект $service в метод new Order, вторым параметром передаем значения полей
 * $order = \lib\Orders::newOrder($service, ['link' => 'instagram.com', 'quantity' => 10]);
 *
 * 3. Для проверки статуса заказа просто передаем ID
 * $status = \lib\Orders::getStatus(153819226);
 */