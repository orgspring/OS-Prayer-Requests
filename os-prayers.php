<?php

/**
 * OS Prayers
 *
 * A plugin that generates an organized table for displaying a list of newsletters featuring
 * title, date, description, link, and thumbnail image. Columns are also sortable.
 *
 * @package   OS Prayers
 * @author    Craig Grella <info@orgspring.com>
 * @license   GPL-2.0+
 * @link      http://orgspring.com/newsletter-tables-plugin/
 * @copyright 2013 Craig Grella
 *
 * @wordpress-plugin
 * Plugin Name: OS Prayers
 * Plugin URI:  http://orgspring.com/os-prayers/
 * Description: A plugin that generates an organized table for displaying a list of prayers requests featuring title, date, description, and link. Columns are also sortable.
 * Version:     0.1.0
 * Author:      Craig Grella
 * Author URI:  http://orgspring.com/
 * Text Domain: os-prayers
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once( plugin_dir_path( __FILE__ ) . 'class-os-prayers.php' );
OS_PRAYERS::get_instance();