<?php
/* Options for ThemeStek Custom Heading element */
$allparams = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Text source', 'liviza' ),
		'param_name'  => 'source',
		'value'       => array(
			esc_html__( 'Custom text', 'liviza' )        => '',
			esc_html__( 'Post or Page Title', 'liviza' ) => 'post_title'
		),
		'std'         => '',
		'description' => esc_html__( 'Select text source.', 'liviza' )
	),
	array(
		'type'        => 'textarea',
		'heading'     => esc_html__( 'Text', 'liviza' ),
		'param_name'  => 'text',
		'admin_label' => true,
		'value'       => esc_html__( 'This is custom heading element', 'liviza' ),
		'description' => esc_html__( 'Note: If you are using non-latin characters be sure to activate them under Settings/Visual Composer/General Settings.', 'liviza' ),
		'dependency'  => array(
			'element'   => 'source',
			'is_empty'  => true,
		),
	),
	array(
		'type'        => 'vc_link',
		'heading'     => esc_html__( 'URL (Link)', 'liviza' ),
		'param_name'  => 'link',
		'description' => esc_html__( 'Add link to custom heading.', 'liviza' ),
		// compatible with btn2 and converted from href{btn1}
	),
	array(
		'type'       => 'font_container',
		'param_name' => 'font_container',
		'value'      => 'tag:h2|text_align:left',
		'settings'   => array(
			'fields'   => array(
				'tag'                     => 'h2', // default value h2
				'text_align',
				'font_size',
				'line_height',
				'color',
				'tag_description'         => esc_html__( 'Select element tag.', 'liviza' ),
				'text_align_description'  => esc_html__( 'Select text alignment.', 'liviza' ),
				'font_size_description'   => esc_html__( 'Enter font size.', 'liviza' ),
				'line_height_description' => esc_html__( 'Enter line height.', 'liviza' ),
				'color_description'       => esc_html__( 'Select heading color.', 'liviza' ),
			),
		),
		'std'        => 'tag:h2',
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Use theme default font family?', 'liviza' ),
		'param_name'  => 'use_theme_fonts',
		//'value'       => array( esc_html__( 'Yes', 'liviza' ) => 'yes' ),
		'value'       => array(
			esc_html__( 'Yes, use default fonts', 'liviza' )               => 'yes',
			esc_html__( 'No, use custom fonts (select below)', 'liviza' )  => 'no'
		),
		'std'         => array( esc_html__( 'Yes', 'liviza' ) => 'yes' ),
		'description' => esc_html__( 'Use font family from the theme.', 'liviza' ),
		'std'         => 'yes',
	),
	array(
		'type'       => 'google_fonts',
		'param_name' => 'google_fonts',
		'value'      => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
		'std'        => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
		'settings'   => array(
			'fields'   => array(
				'font_family_description' => esc_html__( 'Select font family.', 'liviza' ),
				'font_style_description'  => esc_html__( 'Select font styling.', 'liviza' )
			)
		),
		'dependency' => array(
			'element'            => 'use_theme_fonts',
			'value_not_equal_to' => 'yes',
		),
	)
);
$params = array_merge(
	$allparams,
	array(
		vc_map_add_css_animation(),
		themestek_vc_ele_extra_class_option(),
		themestek_vc_ele_css_editor_option(),
	)
);
global $themestek_sc_params_custom_heading;
$themestek_sc_params_custom_heading = $params;
vc_map( array(
	'name'     => esc_html__( 'ThemeStek Custom Heading', 'liviza' ),
	'base'     => 'themestek-custom-heading',
	'icon'     => 'icon-themestek-vc',
	'show_settings_on_create' => true,
	'category' => esc_html__( 'THEMESTEK', 'liviza' ),
	'params'   => $params
) );
