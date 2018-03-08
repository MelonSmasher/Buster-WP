<?php

/*
|--------------------------------------------------------------------------
| Custom page routes
|--------------------------------------------------------------------------
|
| Here is where you can register all page routes for your custom view.
| Then you will use $plugin->getPageUrl( 'custom_page' ) to get the URL.
|
*/

return [
    'purge_all' => [
        'title' => 'Buster Purge All',
        'capability' => 'read',
        'route' => [
            'get' => 'DashboardController@bustAll'
        ]
    ],
    'purge_page' => [
        'title' => 'Buster Purge Page',
        'capability' => 'read',
        'route' => [
            'post' => 'DashboardController@bustPage'
        ]
    ]
];