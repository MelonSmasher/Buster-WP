<?php

/*
|--------------------------------------------------------------------------
| Plugin Menus routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the menu routes for a plugin.
| In this context, the route are the menu link.
|
*/

return [
    'buster_wp' => [
        "page_title" => "Buster WP",
        "menu_title" => "Buster WP",
        'capability' => 'manage_options',
        'icon' => 'dashicons-networking',
        'items' => [
            [
                "page_title" => "Main View",
                "menu_title" => "Main View",
                'capability' => 'read',
                'route' => [
                    'get' => 'Dashboard\DashboardController@index',
                    'post' => 'Dashboard\DashboardController@saveOptions'
                ],
            ],
        ]
    ]
];
