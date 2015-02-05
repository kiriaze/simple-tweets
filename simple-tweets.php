<?php
/*
Plugin Name:     Simple Tweets
Plugin URI:      https://github.com/kiriaze/simple-tweets
Description:     Simple Tweets supports post formats.
Version:         1.0.1
Author:          Constantine Kiriaze (@kiriaze)
Author URI:      http://getsimple.io/about
License:         GNU General Public License v2 or later
License URI:     http://www.gnu.org/licenses/gpl-2.0.html
Copyright:       (c) 2013, Constantine Kiriaze
Text Domain:     simple
GitHub Plugin URI: https://github.com/kiriaze/simple-tweets
GitHub Branch:     master
*/

/*
    Copyright (C) 2013  Constantine Kiriaze (hello@kiriaze.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'SIMPLE_TWEETS_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define( 'SIMPLE_TWEETS_PLUGIN_PATH', plugin_dir_path(__FILE__) );
define( 'SIMPLE_TWEETS_PLUGIN_BASENAME', plugin_basename(__FILE__));

if ( function_exists( of_get_option() ) ) {
    //  Load options
    require_once( plugin_dir_path( __FILE__ ) . 'simple-tweets-options.php' );
}

//  Wrapped in after_setup_theme to utilize options
add_action('after_setup_theme', 'simple_tweets_plugin_init', 12);
function simple_tweets_plugin_init(){

    // Check theme options for values below
    $oauth_access_token        = of_get_option( 'social_twitter_oauth_token' ) ? of_get_option( 'social_twitter_oauth_token' ) : "16978818-X6wjOuO6WdsOtd4NPkuiG0AXtJ0FC8AGBBSOPB70a";
    $oauth_access_token_secret = of_get_option( 'social_twitter_oauth_token_secret' ) ? of_get_option( 'social_twitter_oauth_token_secret' ) : "9s86WB7CzbQ7I4wGgnVFI8luzVe6l9UbOb0q8J4d4";
    $consumer_key              = of_get_option( 'social_twitter_consumer_key' ) ? of_get_option( 'social_twitter_consumer_key' ) : "V4izD5vfx51znhPXaDGxdQ";
    $consumer_secret           = of_get_option( 'social_twitter_consumer_secret' ) ? of_get_option( 'social_twitter_consumer_secret' ) : "i9ACofSBMGBGCGzen81mQ6Evr7z5I0otFZKiiavQiOY";
    $username                  = of_get_option( 'social_twitter_username' ) ? of_get_option( 'social_twitter_username' ) : 'kiriaze';
    $count                     = of_get_option( 'social_twitter_count' ) ? of_get_option( 'social_twitter_count' ) : 3;
    $cache                     = of_get_option( 'social_twitter_cache' ) ? of_get_option( 'social_twitter_cache' ) : 15; // number of minutes, defaults to 15min

    define( 'oauth_access_token', $oauth_access_token);
    define( 'oauth_access_token_secret', $oauth_access_token_secret);
    define( 'consumer_key', $consumer_key);
    define( 'consumer_secret', $consumer_secret);
    define( 'username', $username);
    define( 'count', $count);
    define( 'cache', $cache * MINUTE_IN_SECONDS );

    //  Load class
    require_once( SIMPLE_TWEETS_PLUGIN_PATH . 'class-simple-tweets.php' );

}