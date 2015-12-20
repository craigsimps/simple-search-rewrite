# Simple Search Rewrite
* Contributors: craigsimps
* Donate link: http://designed2.co.uk/
* Tags: search, rewrite, permalinks
* Requires at least: 3.5.0
* Tested up to: 4.4
* License: GPLv3
* License URI: http://opensource.org/licenses/GPL-3.0
* Stable tag: 1.0.0

Redirects search results from /?s=query to /search/query/, and converts %20 to +.

## Description

This is a super-simple plugin which will turn WordPress' default `/?s=query%20terms` into `/search/query+terms/` if you have pretty permalinks enabled.

This is something which I have been placing into a theme include or in a core functionality plugin until recently, but it makes sense to separate this functionality out into an individual plugin so it can be switched on and off independently.

The plugin has no administrative interface or control panel. Activation turns it on, deactivation turns it off. Once activated, performing a search using the standard WP search widget should give you a much nicer search URL.

## Installation

1. Install plugin.
2. Activate the plugin through the 'Plugins' page in WordPress dashboard.

## Changelog

### 1.0
* Initial Commit.