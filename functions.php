<?php

use Buster\Client;

if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Global functions
|--------------------------------------------------------------------------
|
| Here you can insert your global function loaded by composer settings.
|
*/

if (!function_exists('busterBust')) {

    function busterBust($path)
    {
        if (BusterWP()->options->get('Buster_Server.enabled') === 'true') {

            $apiKey = BusterWP()->options->get('Buster_Server.api_key');
            $apiHost = BusterWP()->options->get('Buster_Server.host');
            $apiPort = BusterWP()->options->get('Buster_Server.port');
            $useHttps = (BusterWP()->options->get('Buster_Server.uses_https') === 'true') ? true : false;
            $schemeId = BusterWP()->options->get('Buster_Server.scheme_id');

            $buster = new Client($apiKey, $apiHost, $apiPort, $useHttps);
            $buster->bust($path, $schemeId);
        }
    }
}

if (!function_exists('busterBustAll')) {

    function busterBustAll()
    {
        if (BusterWP()->options->get('Buster_Server.enabled') === 'true') {

            $apiKey = BusterWP()->options->get('Buster_Server.api_key');
            $apiHost = BusterWP()->options->get('Buster_Server.host');
            $apiPort = BusterWP()->options->get('Buster_Server.port');
            $useHttps = (BusterWP()->options->get('Buster_Server.uses_https') === 'true') ? true : false;
            $schemeId = BusterWP()->options->get('Buster_Server.scheme_id');

            $buster = new Client($apiKey, $apiHost, $apiPort, $useHttps);
            $buster->bustAll($schemeId);
        }
    }
}