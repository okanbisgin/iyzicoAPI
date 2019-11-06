<?php

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-vEuI9jAzCrEBtxaFN4AUCeQKppmrEaBq");
        $options->setSecretKey("sandbox-7qZBUoeI87BEflNdy3An8Aj4XWbeNThS");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");
        return $options;
    }
}