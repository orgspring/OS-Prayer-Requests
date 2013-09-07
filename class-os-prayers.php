<?php

/**
 * OS PRAYERS
 *
 * @package   OS PRAYERS
 * @author    Craig Grella <info@orgspring.com>
 * @license   GPL-2.0+
 * @link      http://orgspring.com/os-prayers/
 * @copyright 2013 OrgSpring, Inc.
 */


class OS_PRAYERS {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   0.1.0
	 *
	 * @var     string
	 */
	private $version;

	/**
	 * Unique identifier for the plugin. This value is also used as the text domain
	 * when internationalizing strings of text.
	 *
	 * @since    0.1.0
	 *
	 * @var      string
	 */
	private $plugin_slug;

	/**
	 * A reference to an instance of this class.
	 *
	 * @since    0.2.0
	 *
	 * @var      OS_PRAYERS
	 */
	private static $instance;

	/**
	 * An implementation of the Singleton Pattern for instantiating the plugin
	 *
	 * @since     0.2.0
	 * @version   0.2.0
	 */
	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;

	}

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions. Sets ability to use custom template page for archive view on post category - with single-[cat slug].
	 *
	 * @since     0.1.0
	 * @version   0.2.0
	 */
	private function __construct() {

		$this->version = '0.2.0';
		$this->plugin_slug = 'os-prayers';
		
		// Bring in Custom Post Type for Prayers
		include_once('prayers-posttype.php' );


		// Bring in the admin stylesheets

		
		// Bring in Custom meta boxes
		add_action( 'init', array( $this, 'cmb_initialize_cmb_meta_boxes' ) );
		require_once ('includes/metabox/prayer-boxes.php');

		// Alter Prayer Request Query
		add_action( 'pre_get_posts', array( $this,'os_prayer_query' ) );
		
		// Alter Prayer Request Query
		add_action('admin_head', array( $this,'plugin_header'));
		
	}



	/**
	 * Initialize the metabox class.
	 *
	 * @version    0.2.0
	 * @since      0.2.0
	 */	
	 
	 public function cmb_initialize_cmb_meta_boxes() {
	
		if ( ! class_exists( 'cmb_Meta_Box' ) )
			require_once 'includes/metabox/init.php';
	
	}
	
	
	/**
	 * Customize Prayer Requests Query using Post Meta, and display only posts labeled Public
	 * 
	 * @author Bill Erickson
	 * @link http://www.billerickson.net/customize-the-wordpress-query/
	 * @param object $query data
	 *
	 */
	public function os_prayer_query( $query ) {
		
		if( $query->is_main_query() && !$query->is_feed() && !is_admin() && is_post_type_archive( 'os_prayer_request' ) ) {
			$meta_query = array(
				array(
					'key' => 'cmb_ospr_privacy',
					'value' => 'public',
					'compare' => '=='
				)
			);
			$query->set( 'meta_query', $meta_query );
			$query->set( 'meta_key', 'cmb_ospr_privacy' );
		}
	 
	}
	
	/**
	 * Customize WordPress Admin Icons
	 * 
	 * @author Craig Grella
	 * @link http://orgspring.com
	 *
	 */	
	
	public function plugin_header() {
    global $post_type;
    ?>
    <style>
	    <?php if (($_GET['post_type'] == 'os_prayer_request')) : ?>
	    #icon-edit { background:transparent url('<?php echo 'includes/book-open-bookmark.png';?>') no-repeat; }     
	    <?php endif; ?>
	    #adminmenu #menu-posts-os_prayer_request div.wp-menu-image{background:transparent url("<?php echo 'includes/book-open-bookmark.png';?>") no-repeat center center;}
	    #adminmenu #menu-posts-os_prayer_request:hover div.wp-menu-image,#adminmenu #menu-posts-os_prayer_request.wp-has-current-submenu div.wp-menu-image{background:transparent url("<?php echo 'includes/book-open-bookmark.png';?>") no-repeat center center;}  
	</style>
	<?php
	}
	
}