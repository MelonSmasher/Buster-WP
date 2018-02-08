<?php

/*
|--------------------------------------------------------------------------
| Plugin options
|--------------------------------------------------------------------------
|
| Here is where you can insert the options model of your plugin.
| These options model will store in WordPress options table
| (usually wp_options).
| You'll get these options by using `$plugin->options` property
|
*/

return [
    'Buster_Server' => [
        'host' => null,
        'port' => null,
        'uses_https' => false,
        'api_key' => null,
        'scheme_id' => null,
        'enabled' => false,
    ]
];