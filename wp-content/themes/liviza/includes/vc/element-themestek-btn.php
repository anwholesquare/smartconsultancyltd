<?php
/* Options for ThemeStek Button */
global $themestek_pixel_icons;
$icons_params = vc_map_integrate_shortcode( 'themestek-icon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
		// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	), array(
		'element' => 'add_icon',
		'value' => 'true',
	)
);
// populate integrated themestek-icons params.
if ( is_array( $icons_params ) && ! empty( $icons_params ) ) {
	foreach ( $icons_params as $key => $param ) {
		if ( is_array( $param ) && ! empty( $param ) ) {
			if ( 'i_type' === $param['param_name'] ) {
				// Do nothing
			}
			if ( isset( $param['admin_label'] ) ) {
				// remove admin label
				unset( $icons_params[ $key ]['admin_label'] );
			}
		}
	}
}
$params = array_merge(
	array(
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Text', 'liviza' ),
			'param_name' => 'title',
			'value'      => esc_html__( 'Text on the button', 'liviza' ),
		),
		array(
			'type' => 'vc_link',
			'heading' => esc_html__( 'URL (Link)', 'liviza' ),
			'param_name' => 'link',
			'description' => esc_html__( 'Add link to button.', 'liviza' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Style', 'liviza' ),
			'description' => esc_html__( 'Select button display style.', 'liviza' ),
			'param_name' => 'style',
			'std'		 => 'flat',
			'value' => array(
				esc_html__( 'Flat', 'liviza' ) => 'flat',
				esc_html__( 'Modern', 'liviza' ) => 'modern',
				esc_html__( 'Classic', 'liviza' ) => 'classic',
				esc_html__( 'Outline', 'liviza' ) => 'outline',
				esc_html__( '3d', 'liviza' ) => '3d',
				esc_html__( 'Simple Text', 'liviza' ) => 'text',
				esc_html__( 'Custom', 'liviza' ) => 'custom',
				esc_html__( 'Outline custom', 'liviza' ) => 'outline-custom',
				esc_html__( 'Gradient', 'liviza' ) => 'gradient',
				esc_html__( 'Gradient Custom', 'liviza' ) => 'gradient-custom',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Gradient Color 1', 'liviza' ),
			'param_name' => 'gradient_color_1',
			'description' => esc_html__( 'Select first color for gradient.', 'liviza' ),
			'param_holder_class' => 'themestek_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => vc_get_shared( 'colors-dashed' ),
			'std' => 'turquoise',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Gradient Color 2', 'liviza' ),
			'param_name' => 'gradient_color_2',
			'description' => esc_html__( 'Select second color for gradient.', 'liviza' ),
			'param_holder_class' => 'themestek_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => vc_get_shared( 'colors-dashed' ),
			'std' => 'blue',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Gradient Color 1', 'liviza' ),
			'param_name' => 'gradient_custom_color_1',
			'description' => esc_html__( 'Select first color for gradient.', 'liviza' ),
			'param_holder_class' => 'themestek_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => '#dd3333',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient-custom' ),
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Gradient Color 2', 'liviza' ),
			'param_name' => 'gradient_custom_color_2',
			'description' => esc_html__( 'Select second color for gradient.', 'liviza' ),
			'param_holder_class' => 'themestek_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => '#eeee22',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient-custom' ),
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Button Text Color', 'liviza' ),
			'param_name' => 'gradient_text_color',
			'description' => esc_html__( 'Select button text color.', 'liviza' ),
			'param_holder_class' => 'themestek_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => '#ffffff',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient-custom' ),
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Background', 'liviza' ),
			'param_name' => 'custom_background',
			'description' => esc_html__( 'Select custom background color for your element.', 'liviza' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'custom' )
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std' => '#ededed',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Text', 'liviza' ),
			'param_name' => 'custom_text',
			'description' => esc_html__( 'Select custom text color for your element.', 'liviza' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'custom' )
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std' => '#666',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Outline and Text', 'liviza' ),
			'param_name' => 'outline_custom_color',
			'description' => esc_html__( 'Select outline and text color for your element.', 'liviza' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'outline-custom' )
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
			'std' => '#666',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Hover background', 'liviza' ),
			'param_name' => 'outline_custom_hover_background',
			'description' => esc_html__( 'Select hover background color for your element.', 'liviza' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'outline-custom' )
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
			'std' => '#666',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Hover text', 'liviza' ),
			'param_name' => 'outline_custom_hover_text',
			'description' => esc_html__( 'Select hover text color for your element.', 'liviza' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'outline-custom' )
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
			'std' => '#fff',
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Shape', 'liviza' ),
			'description' => esc_html__( 'Select button shape.', 'liviza' ),
			'param_name'  => 'shape',
			'std'		  => 'rounded',
			'value'       => array(
				esc_html__( 'Square', 'liviza' ) => 'square',
				esc_html__( 'Rounded', 'liviza' ) => 'rounded',
				esc_html__( 'Round', 'liviza' ) => 'round',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Color', 'liviza' ),
			'param_name' => 'color',
			'description' => esc_html__( 'Select button color.', 'liviza' ),
			'param_holder_class' => 'themestek_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => array(
							esc_html__( '[Skin Color]', 'liviza' ) => 'skincolor',
							esc_html__( 'Classic Grey', 'liviza' ) => 'default',
							esc_html__( 'Classic Blue', 'liviza' ) => 'primary',
							esc_html__( 'Classic Turquoise', 'liviza' ) => 'info',
							esc_html__( 'Classic Green', 'liviza' ) => 'success',
							esc_html__( 'Classic Orange', 'liviza' ) => 'warning',
							esc_html__( 'Classic Red', 'liviza' ) => 'danger',
							esc_html__( 'Classic Black', 'liviza' ) => 'inverse'
					   ) + themestek_vc_get_shared( 'colors-dashed' ),
			'std' => 'skincolor',
			'dependency' => array(
				'element' => 'style',
				'value_not_equal_to' => array( 'custom', 'outline-custom' )
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Button Size', 'liviza' ),
			'param_name' => 'size',
			'description' => esc_html__( 'Select button display size.', 'liviza' ),
			'std' => 'md',
			'value' => themestek_vc_get_shared( 'sizes' ),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Button Text Bold?', 'liviza' ),
			'param_name'  => 'font_weight',
			'description' => esc_html__( 'Select YES if you like to bold the font text.', 'liviza' ),
			'std'         => 'yes',
			'value'       => array(
				esc_html__( 'Yes', 'liviza' ) => 'yes',
				esc_html__( 'No', 'liviza' )  => 'no',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Alignment', 'liviza' ),
			'param_name' => 'align',
			'description' => esc_html__( 'Select button alignment.', 'liviza' ),
			'value' => array(
				esc_html__( 'Inline', 'liviza' ) => 'inline',
				esc_html__( 'Left', 'liviza' ) => 'left',
				esc_html__( 'Right', 'liviza' ) => 'right',
				esc_html__( 'Center', 'liviza' ) => 'center'
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Set full width button?', 'liviza' ),
			'param_name' => 'button_block',
			'dependency' => array(
				'element'            => 'align',
				'value_not_equal_to' => 'inline',
			),
			'value'      => array(
				esc_html__( 'No', 'liviza' )  => 'false',
				esc_html__( 'Yes', 'liviza' ) => 'true',
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Add icon?', 'liviza' ),
			'param_name' => 'add_icon',
			'value'      => array(
				esc_html__( 'No',  'liviza' ) => '',
				esc_html__( 'Yes', 'liviza' ) => 'true',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon Alignment', 'liviza' ),
			'description' => esc_html__( 'Select icon alignment.', 'liviza' ),
			'param_name' => 'i_align',
			'value' => array(
				esc_html__( 'Left', 'liviza' ) => 'left',
				// default as well
				esc_html__( 'Right', 'liviza' ) => 'right',
			),
			'dependency' => array(
				'element' => 'add_icon',
				'value' => 'true',
			),
		),
	),
	$icons_params,
	array(
		vc_map_add_css_animation(),
		themestek_vc_ele_extra_class_option(),
		themestek_vc_ele_css_editor_option(),
	)
);
// Changing modifying, adding extra options
$i = 0;
foreach( $params as $param ){
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	// Button Icon
	if( $param_name == 'i_align' ){
		$params[$i]['std'] = 'right';
	} else if( $param_name == 'i_type' ){
		$params[$i]['std'] = 'themify';
	} else if( $param_name == 'i_icon_themify' ){
		$params[$i]['std']   = 'themifyicon ti-arrow-right';
		$params[$i]['value'] = 'themifyicon ti-arrow-right';
	}
	$i++;
} // Foreach
global $themestek_sc_params_btn;
$themestek_sc_params_btn = $params;
vc_map( array(
	'name'     => esc_html__( 'ThemeStek Button', 'liviza' ),
	'base'     => 'themestek-btn',
	'icon'     => 'icon-themestek-vc',
	'category' => array( esc_html__( 'THEMESTEK', 'liviza' ) ),
	'params'   => $params,
	'js_view'  => 'VcButton3View',
	'custom_markup' => '{{title}}<div class="vc_btn3-container"><button class="vc_general vc_btn3 vc_btn3-size-sm vc_btn3-shape-{{ params.shape }} vc_btn3-style-{{ params.style }} vc_btn3-color-{{ params.color }}">{{{ params.title }}}</button></div>',
) );
