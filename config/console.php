<?php

$config = [
    'id' => 'blaah-console',
    'basePath' => dirname(__DIR__),
    //'bootstrap' => [''],
    'controllerNamespace' => 'tonisormisson\adventofcode2022\commands',
    'aliases' => [
        '@input' => "@app/assets/input",
    ],
    'components' => [
    ],
    'params' => [],
];
return $config;