<?php

/**
 * Include and setup custom metaboxes and fields.
 *
 * @category OS Prayer Requests
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	// Underscore not used in this instance to show fields in Gravity Forms Back End List
	$prefix = 'cmb_';

	$meta_boxes[] = array(
		'id'         => 'prayers_metabox',
		'title'      => 'Prayer Request Details',
		'pages'      => array( 'os_prayer_request', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Prayer Request Information',
				'desc' => 'Enter or edit the information in the fields below. To Publish the post, click the blue Publish / Update button in the right sidebar.',
				'id'   => $prefix . 'osprtitle',
				'type' => 'title',
			),

			array(
				'name' => 'First Name',
				'desc' => '',
				'id'   => $prefix . 'ospr_fname',
				'type' => 'text',
			),

			array(
				'name' => 'Last Name',
				'desc' => '',
				'id'   => $prefix . 'ospr_lname',
				'type' => 'text',
			),
			
			array(
				'name'    => 'Privacy',
				'desc'    => 'By default, all prayer requests are public and appear on the FirstEPC.com website. Please select "Private" if you\'d like your prayer request to remain private and NOT show up on the website.',
				'id'      => $prefix . 'ospr_privacy',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Public', 'value' => 'public', ),
					array( 'name' => 'Private', 'value' => 'private', ),
				),
			),

		),
	);


	// Add other metaboxes as needed

	return $meta_boxes;
}