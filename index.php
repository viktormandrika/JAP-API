<?php

require_once __DIR__ . '/vendor/autoload.php';

\lib\Debug::prn(\lib\ServiceType::getFields(\lib\ServiceType::TYPE_DEFAULT));

$res = \lib\ServicesWraper::find()->filter('category', '♛ Instagram Auto Comments / Impressions / Saves / Reach')->filter('type', \lib\ServiceType::TYPE_PACKAGE)->one();

\lib\Debug::prn($res->getFields());