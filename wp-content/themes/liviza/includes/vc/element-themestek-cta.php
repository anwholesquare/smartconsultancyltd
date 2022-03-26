<?php
/* Options for ThemeStek Call To Action */
$h2_custom_heading = vc_map_integrate_shortcode( 'themestek-custom-heading', 'h2_', esc_html__( 'Heading', 'liviza' ),
	array(
		'exclude' => array(
			'source',
			'text',
			'css',
		),
	),
	array(
		'element' => 'use_custom_fonts_h2',
		'value'   => 'true',
	)
);
// This is needed to remove custom heading _tag and _align options.
if ( is_array( $h2_custom_heading ) && ! empty( $h2_custom_heading ) ) {
	foreach ( $h2_custom_heading as $key => $param ) {
		if ( is_array( $param ) && isset( $param['type'] ) && 'font_container' === $param['type'] ) {
			$h2_custom_heading[ $key ]['value'] = '';
			if ( isset( $param['settings'] ) && is_array( $param['settings'] ) && isset( $param['settings']['fields'] ) ) {
				$sub_key = array_search( 'tag', $param['settings']['fields'] );
				if ( false !== $sub_key ) {
					unset( $h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
				} elseif ( isset( $param['settings']['fields']['tag'] ) ) {
					unset( $h2_custom_heading[ $key ]['settings']['fields']['tag'] );
				}
				$sub_key = array_search( 'text_align', $param['settings']['fields'] );
				if ( false !== $sub_key ) {
					unset( $h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
				} elseif ( isset( $param['settings']['fields']['text_align'] ) ) {
					unset( $h2_custom_heading[ $key ]['settings']['fields']['text_align'] );
				}
			}
		}
	}
}
$h4_custom_heading = vc_map_integrate_shortcode( 'themestek-custom-heading', 'h4_', esc_html__( 'Subheading', 'liviza' ),
	array(
		'exclude' => array(
			'source',
			'text',
			'css',
		),
	),
	array(
		'element' => 'use_custom_fonts_h4',
		'value' => 'true',
	)
);
// This is needed to remove custom heading _tag and _align options.
if ( is_array( $h4_custom_heading ) && ! empty( $h4_custom_heading ) ) {
	foreach ( $h4_custom_heading as $key => $param ) {
		if ( is_array( $param ) && isset( $param['type'] ) && 'font_container' === $param['type'] ) {
			$h4_custom_heading[ $key ]['value'] = '';
			if ( isset( $param['settings'] ) && is_array( $param['settings'] ) && isset( $param['settings']['fields'] ) ) {
				$sub_key = array_search( 'tag', $param['settings']['fields'] );
				if ( false !== $sub_key ) {
					unset( $h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
				} elseif ( isset( $param['settings']['fields']['tag'] ) ) {
					unset( $h4_custom_heading[ $key ]['settings']['fields']['tag'] );
				}
				$sub_key = array_search( 'text_align', $param['settings']['fields'] );
				if ( false !== $sub_key ) {
					unset( $h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
				} elseif ( isset( $param['settings']['fields']['text_align'] ) ) {
					unset( $h4_custom_heading[ $key ]['settings']['fields']['text_align'] );
				}
			}
		}
	}
}
$params = array_merge(
	array(
		array(
			'type'             => 'textfield',
			'heading'          => esc_html__( 'Heading', 'liviza' ),
			'admin_label'      => true,
			'param_name'       => 'h2',
			'value'            => '',
			'description'      => esc_html__( 'Enter text for heading line.', 'liviza' ),
			'edit_field_class' => 'vc_col-sm-9 vc_column',
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Use custom font?', 'liviza' ),
			'param_name'       => 'use_custom_fonts_h2',
			'description'      => esc_html__( 'Enable Google fonts.', 'liviza' ),
			'edit_field_class' => 'vc_col-sm-3 vc_column',
		),
	),
	$h2_custom_heading,
	array(
		array(
			'type'             => 'textfield',
			'heading'          => esc_html__( 'Subheading', 'liviza' ),
			'param_name'       => 'h4',
			'value'            => '',
			'description'      => esc_html__( 'Enter text for subheading line.', 'liviza' ),
			'edit_field_class' => 'vc_col-sm-9 vc_column',
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Use custom font?', 'liviza' ),
			'param_name'       => 'use_custom_fonts_h4',
			'description'      => esc_html__( 'Enable custom font option.', 'liviza' ),
			'edit_field_class' => 'vc_col-sm-3 vc_column',
		),
	),
	$h4_custom_heading,
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Text alignment', 'liviza' ),
			'param_name'  => 'txt_align',
			'value'       => themestek_vc_get_shared( 'text align' ), // default left
			'description' => esc_html__( 'Select text alignment in "Call to Action" block.', 'liviza' ),
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Reverse heading order', 'liviza' ),
			'param_name'       => 'reverse_heading',
			'description'      => esc_html__( 'Show sub-heading before heading.', 'liviza' ),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Shape', 'liviza' ),
			'param_name' => 'shape',
			'std'        => 'rounded',
			'value'      => array(
				esc_html__( 'Square', 'liviza' )  => 'square',
				esc_html__( 'Rounded', 'liviza' ) => 'rounded',
				esc_html__( 'Round', 'liviza' )   => 'round',
			),
			'description' => esc_html__( 'Select call to action shape.', 'liviza' ),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Style', 'liviza' ),
			'param_name' => 'style',
			'value' => array(
				esc_html__( 'Classic', 'liviza' ) => 'classic',
				esc_html__( 'Flat', 'liviza' )    => 'flat',
				esc_html__( 'Outline', 'liviza' ) => 'outline',
				esc_html__( '3d', 'liviza' )      => '3d',
			),
			'std'         => 'classic',
			'description' => esc_html__( 'Select call to action display style.', 'liviza' ),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Color', 'liviza' ),
			'param_name'  => 'color',
			'value'       => array_merge( array( esc_html__('Transparent', 'liviza' ) => 'transparent' ), themestek_vc_get_shared( 'colors-dashed' ) ),
			'std'         => 'transparent',
			'description' => esc_html__( 'Select color for button.', 'liviza' ),
			'param_holder_class' => 'themestek_vc_colored-dropdown vc_cta3-colored-dropdown',
			'dependency'  => array(
				'element'            => 'style',
				'value_not_equal_to' => array( 'custom' )
			),
		),
		array(
			'type'       => 'textarea_html',
			'heading'    => esc_html__( 'Text', 'liviza' ),
			'param_name' => 'content',
			'value'      => esc_html__( 'I am promo text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'liviza' )
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Width', 'liviza' ),
			'param_name' => 'el_width',
			'value'      => array(
					'100%' => '',
					'90%'  => 'xl',
					'80%'  => 'lg',
					'70%'  => 'md',
					'60%'  => 'sm',
					'50%'  => 'xs',
			),
			'description' => esc_html__( 'Select call to action width (percentage).', 'liviza' ),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Add button', 'liviza' ) . '?',
			'description' => esc_html__( 'Add button for call to action.', 'liviza' ),
			'std'		  => 'right',
			'param_name'  => 'add_button',
			'value'       => array(
				esc_html__( 'No', 'liviza' )     => '',
				esc_html__( 'Top', 'liviza' )    => 'top',
				esc_html__( 'Bottom', 'liviza' ) => 'bottom',
				esc_html__( 'Left', 'liviza' )   => 'left',
				esc_html__( 'Right', 'liviza' )  => 'right',
			),
		),
	),
	vc_map_integrate_shortcode( 'themestek-btn', 'btn_', esc_html__( 'Button', 'liviza' ),
		array(
			'exclude' => array( 'css' )
		),
		array(
			'element'   => 'add_button',
			'not_empty' => true,
		)
	),
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Add icon?', 'liviza' ),
			'description' => esc_html__( 'Add icon for call to action.', 'liviza' ),
			'param_name'  => 'add_icon',
			'value'       => array(
				esc_html__( 'No', 'liviza' )     => '',
				esc_html__( 'Top', 'liviza' )    => 'top',
				esc_html__( 'Bottom', 'liviza' ) => 'bottom',
				esc_html__( 'Left', 'liviza' )   => 'left',
				esc_html__( 'Right', 'liviza' )  => 'right',
			),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Place icon on border?', 'liviza' ),
			'description' => esc_html__( 'Display icon on call to action element border.', 'liviza' ),
			'param_name'  => 'i_on_border',
			'value'       => array(
				esc_html__( 'No', 'liviza' )     => 'false',
				esc_html__( 'Yes', 'liviza' )    => 'true',
			),
			'group'       => esc_html__( 'Icon', 'liviza' ),
			'dependency'  => array(
				'element'   => 'add_icon',
				'not_empty' => true,
			),
		),
	),
	vc_map_integrate_shortcode( 'themestek-icon', 'i_', esc_html__( 'Icon', 'liviza' ),
		array(
			'exclude' => array( 'align', 'css' )
		),
		array(
			'element'   => 'add_icon',
			'not_empty' => true,
		)
	),
	array(
		/// cta3
		vc_map_add_css_animation(),
		themestek_vc_ele_extra_class_option(),
		themestek_vc_ele_css_editor_option(),
	)
);
global $themestek_sc_params_cta;
$themestek_sc_params_cta = $params;
vc_map( array(
	'name'     => esc_html__( 'ThemeStek Call to Action', 'liviza' ),
	'base'     => 'themestek-cta',
	'icon'     => 'icon-themestek-vc',
	'category' => array( esc_html__( 'THEMESTEK', 'liviza' ) ),
	'since'    => '4.5',
	'params'   => $params,
	'js_view'  => 'VcCallToActionView3',
) );