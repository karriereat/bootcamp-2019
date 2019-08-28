<?php

const SERVER_ERROR = 'Ups! etwas ist schief gelaufen';

const TIME_FORMAT = 'd.m.Y';

const DATABASE = [
    'host' => '',
    'user' => '',
    'password' => '',
    'name' => ''
];

//Change this to 'prod' in live systems
const ENV_PROD = 'pro';
const ENV_DEV = 'dev';

const ENVIRONMENT = ENV_DEV;
const TEMPLATE_PATH = __DIR__ . '/templates';
