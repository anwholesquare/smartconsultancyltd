<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
$liviza_theme_options		   = get_option('liviza_theme_options');
$pf_cat_title_singular     = ( !empty($liviza_theme_options['pf_cat_title_singular']) ) ? esc_html($liviza_theme_options['pf_cat_title_singular']) : esc_html__('Portfolio Category', 'liviza') ;
$service_cat_title_singular     = ( !empty($liviza_theme_options['service_cat_title_singular']) ) ? esc_html($liviza_theme_options['service_cat_title_singular']) : esc_html__('Service Category', 'liviza') ;
$team_group_title_singular = ( !empty($liviza_theme_options['team_group_title_singular']) ) ? esc_html($liviza_theme_options['team_group_title_singular']) : esc_html__('Team Group', 'liviza') ;
// Taxonomy Options
$themestek_taxonomy_options     = array();
// For Portfolio Category
$themestek_taxonomy_options[]   = array(
	'id'       => 'themestek_taxonomy_options',
	'taxonomy' => 'themestek-portfolio-category', // category, post_tag or your custom taxonomy name
	'fields'   => array(
		array(
			'id'            => 'tax_featured_image',
			'type'          => 'upload',
			'title' => esc_html__('Featured Image URL', 'liviza'),
			'after' => '<p>' . sprintf( esc_html__('Select featured image for this %s. Please upload the image first from media section.', 'liviza'), $pf_cat_title_singular ) . '</p>',
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_html__('Upload', 'liviza'),
				'frame_title'  => esc_html__('Select an image', 'liviza'),
				'insert_title' => esc_html__('Use this image', 'liviza'),
			),
		),
		array(
			'id'            => 'tax_titlebar_image',
			'type'          => 'upload',
			'title' => esc_html__('Titlebar Bakground Image URL', 'liviza'),
			'after' => '<p>' . sprintf( esc_html__('Select Titlebar background image for this %s. Please upload the image first from media section.', 'liviza'), $pf_cat_title_singular ) . '</p>',
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_html__('Upload', 'liviza'),
				'frame_title'  => esc_html__('Select an image', 'liviza'),
				'insert_title' => esc_html__('Use this image', 'liviza'),
			),
		),
	),
);
// For Service Category
$themestek_taxonomy_options[]   = array(
	'id'       => 'themestek_taxonomy_options',
	'taxonomy' => 'themestek-service-category', // category, post_tag or your custom taxonomy name
	'fields'   => array(
		array(
			'id'            => 'tax_featured_image',
			'type'          => 'upload',
			'title' => esc_html__('Featured Image URL', 'liviza'),
			'after' => '<p>' . sprintf( esc_html__('Select featured image for this %s. Please upload the image first from media section.', 'liviza'), $service_cat_title_singular ) . '</p>',
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_html__('Upload', 'liviza'),
				'frame_title'  => esc_html__('Select an image', 'liviza'),
				'insert_title' => esc_html__('Use this image', 'liviza'),
			),
		),
		array(
			'id'            => 'tax_titlebar_image',
			'type'          => 'upload',
			'title' => esc_html__('Titlebar Bakground Image URL', 'liviza'),
			'after' => '<p>' . sprintf( esc_html__('Select Titlebar background image for this %s. Please upload the image first from media section.', 'liviza'), $service_cat_title_singular ) . '</p>',
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_html__('Upload', 'liviza'),
				'frame_title'  => esc_html__('Select an image', 'liviza'),
				'insert_title' => esc_html__('Use this image', 'liviza'),
			),
		),
	),
);
// For Team Group
$themestek_taxonomy_options[]   = array(
	'id'       => 'themestek_taxonomy_options',
	'taxonomy' => 'themestek-team-group', // category, post_tag or your custom taxonomy name
	'fields'   => array(
		array(
			'id'            => 'tax_featured_image',
			'type'          => 'upload',
			'title' => esc_html__('Featured Image URL', 'liviza'),
			'after' => '<p>' . sprintf( esc_html__('Select featured image for this %s. Please upload the image first from media section.', 'liviza'), $team_group_title_singular ) . '</p>',
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_html__('Upload', 'liviza'),
				'frame_title'  => esc_html__('Select an image', 'liviza'),
				'insert_title' => esc_html__('Use this image', 'liviza'),
			),
		),
		array(
			'id'            => 'tax_titlebar_image',
			'type'          => 'upload',
			'title' => esc_html__('Titlebar Bakground Image URL', 'liviza'),
			'after' => '<p>' . sprintf( esc_html__('Select Titlebar background image for this %s. Please upload the image first from media section.', 'liviza'), $team_group_title_singular ) . '</p>',
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_html__('Upload', 'liviza'),
				'frame_title'  => esc_html__('Select an image', 'liviza'),
				'insert_title' => esc_html__('Use this image', 'liviza'),
			),
		),
	),
);
