<?php

/*
|--------------------------------------------------------------------------
| Plugin activation
|--------------------------------------------------------------------------
|
| This file is included when the plugin is activated the first time.
| Usually you will use this file to register your custom post types or
| to perform some db delta process.
|
*/

BusterWP()->options->set('Buster_Server.host', null);
BusterWP()->options->set('Buster_Server.port', null);
BusterWP()->options->set('Buster_Server.uses_https', false);
BusterWP()->options->set('Buster_Server.api_key', null);
BusterWP()->options->set('Buster_Server.scheme_id', null);
BusterWP()->options->set('Buster_Server.enabled', false);