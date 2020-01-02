<?php

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-VqLT41Z4AkFnWa32NTKpz1XeH268nylE");
        $options->setSecretKey("sandbox-AONb9Zv8Ce26rc2LXIIKlmDOJkvEgfjv");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");
        return $options;
    }
}