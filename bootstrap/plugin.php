<?php

/*
|--------------------------------------------------------------------------
| Create The Plugin
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Bones plugin instance
| which serves as the "glue" for all the components.
|
*/

$plugin = new \BusterWP\WPBones\Foundation\Plugin(
    realpath(__DIR__ . '/../')
);

/*
|--------------------------------------------------------------------------
| Actions and filters
|--------------------------------------------------------------------------
|
| Feel free to insert your actions and filters.
|
*/

add_action('edit_post', function ($ID) {
    busterBust(parse_url(get_permalink($ID))['path']);
});

add_action('trash_post', function ($ID) {
    busterBust(parse_url(get_permalink($ID))['path']);
});

add_action('untrashed_post', function ($ID) {
    busterBust(parse_url(get_permalink($ID))['path']);
});

add_action('delete_post', function ($ID) {
    busterBust(parse_url(get_permalink($ID))['path']);
});

/*
|--------------------------------------------------------------------------
| Return The Plugin
|--------------------------------------------------------------------------
|
| This script returns the plugin instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

/**
 * Fire when the plugin is loaded
 */
do_action('buster-wp_loaded');

return $plugin;