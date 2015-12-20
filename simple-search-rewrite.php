<?php
/*
Plugin Name:        Simple Search Rewrite
Plugin URI:         https://github.com/craigsimps/simple-search-rewrite/
Description:        Redirects search results from /?s=query to /search/query/, converts %20 to +.
Version:            1.0.0
Author:             Craig Simpson <craig@designed2.co.uk>
Author URI:         https://github.com/craigsimps/
License:            GPLv3
License URI:        http://opensource.org/licenses/GPL-3.0
Text Domain:        simple-search-rewrite
*/

namespace D2\SimpleSearchRewrite;

add_action( 'template_redirect', __NAMESPACE__ . '\\redirect' );
/**
 * Redirects search results from /?s=query to /search/query/, converts %20 to +.
 *
 * @link http://txfx.net/wordpress-plugins/nice-search/
 *
 * @since 1.0.0
 */
function redirect() {
	global $wp_rewrite;

	if ( no_rewrite_set( $wp_rewrite ) ) {
		return;
	}

	$search_base = $wp_rewrite->search_base;
	if ( is_search_permalink( $search_base ) ) {
		wp_redirect( get_search_link() );
		exit();
	}
}


add_filter( 'wpseo_json_ld_search_url', __NAMESPACE__ . '\\rewrite' );
/**
 * Filter the WP SEO search URL.
 *
 * @param $url
 * @return mixed
 * @since 1.0.0
 */
function rewrite( $url ) {
	return str_replace( '/?s=', '/search/', $url );
}

/**
 * @param $wp_rewrite
 * @return bool
 * @since 1.0.0
 */
function no_rewrite_set( $wp_rewrite ) {
	return ! isset( $wp_rewrite ) || ! is_object( $wp_rewrite ) || ! $wp_rewrite->get_search_permastruct();
}

/**
 * @param $search_base
 * @return bool
 * @since 1.0.0
 */
function is_search_permalink( $search_base ) {
	return is_search() && ! is_admin() && strpos( $_SERVER['REQUEST_URI'], "/{$search_base}/" ) === false && strpos( $_SERVER['REQUEST_URI'], '&' ) === false;
}
