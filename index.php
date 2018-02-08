<?php

/**
 * Plugin Name: Buster WP
 * Plugin URI: https://github.com/MelonSmasher/Buster-WP
 * Description: Buster WP is a WordPress client for your Buster server.
 * Version: 1.0.0
 * Author: MelonSmasher
 * Author URI: https://github.com/MelonSmasher
 * Text Domain: buster-wp
 * Domain Path: localization
 *
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels nice to relax.
|
*/
use BusterWP\WPBones\Foundation\Plugin;

require_once __DIR__ . '/bootstrap/autoload.php';

/*
|--------------------------------------------------------------------------
| Bootstrap the plugin
|--------------------------------------------------------------------------
|
| We need to bootstrap the plugin.
|
*/

// comodity define for text domain
define( 'BUSTERWP_TEXTDOMAIN', 'buster-wp' );

$GLOBALS[ 'BusterWP' ] = require_once __DIR__ . '/bootstrap/plugin.php';

if ( ! function_exists( 'BusterWP' ) ) {

  /**
   * Return the instance of plugin.
   *
   * @return Plugin
   */
  function BusterWP()
  {
    return $GLOBALS[ 'BusterWP' ];
  }
}