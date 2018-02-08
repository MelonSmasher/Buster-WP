<?php

/*
|--------------------------------------------------------------------------
| Plugin deactivation
|--------------------------------------------------------------------------
|
| This file is included when the plugin is deactivated.
| Usually here you may enter a flush_rewrite_rules();
|
*/

BusterWP()->options->set('Buster_Server.host', null);
BusterWP()->options->set('Buster_Server.port', null);
BusterWP()->options->set('Buster_Server.uses_https', false);
BusterWP()->options->set('Buster_Server.api_key', null);
BusterWP()->options->set('Buster_Server.scheme_id', null);
BusterWP()->options->set('Buster_Server.enabled', false);

flush_rewrite_rules();