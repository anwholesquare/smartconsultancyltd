<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// SHORTCODE GENERATOR OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options       = array();
// -----------------------------------------
// Basic Shortcode Examples                -
// -----------------------------------------
$options[]     = array(
  'title'      => esc_html__('ThemeStek Special Shortcodes', 'liviza'),
  'shortcodes' => array(
	//Site Tagline
	array(
		'name'      => 'themestek-site-tagline',
		'title'     => esc_html__('Site Tagline', 'liviza'),
		'fields'    => array(
			array(
				'type'    => 'content',
				'content' => esc_html__('This shortcode will show the Site Tagline. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode. ', 'liviza'),
			),
      ),
    ),
	// Site Title
	array(
		'name'      => 'themestek-site-title',
		'title'     => esc_html__('Site Title', 'liviza'),
		'fields'    => array(
			array(
				'type'    => 'content',
				'content' => esc_html__('This shortcode will show the Site Title. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'liviza'),
			),
      ),
    ),
	// Site URL
	array(
		'name'      => 'themestek-site-url',
		'title'     => esc_html__('Site URL', 'liviza'),
		'fields'    => array(
			array(
				'type'    => 'content',
				'content' => esc_html__('This shortcode will show the Site URL. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'liviza'),
			),
      ),
    ),
	// Site LOGO
	array(
		'name'      => 'themestek-logo',
		'title'     => esc_html__('Site Logo', 'liviza'),
		'fields'    => array(
			array(
				'type'    => 'content',
				'content' => esc_html__('This shortcode will show the Site Logo. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'liviza'),
			),
      ),
    ),
	// Current Year
	array(
		'name'      => 'themestek-current-year',
		'title'     => esc_html__('Current Year', 'liviza'),
		'fields'    => array(
			array(
				'type'    => 'content',
				'content' => esc_html__('This shortcode will show the Current Year. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'liviza'),
			),
      ),
    ),
	// Footer Menu
	array(
		'name'      => 'themestek-footermenu',
		'title'     => esc_html__('Footer Menu', 'liviza'),
		'fields'    => array(
			array(
				'type'    => 'content',
				'content' => esc_html__('This shortcode will show the Footer Menu. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'liviza'),
			),
      ),
    ),
	// Skin Color
	array(
		'name'      => 'themestek-skincolor',
		'title'     => esc_html__('Skin Color', 'liviza'),
		'fields'    => array(
			array(
				'type'   	 => 'content',
				'content'	 => esc_html__('This shortcode will show the Text in Skin Color', 'liviza'),
			),
			 array(
				'id'         => 'content',
				'type'       => 'text',
				'title'      => esc_html__('Skin Color Text', 'liviza'),
				'after'   	 => '<div class="cs-text-muted"><br>'.esc_html__('The content is this box will be shown in Skin Color', 'liviza').'</div>', 
			),
      ),
    ),
	// Dropcaps
	array(
		'name'      => 'themestek-dropcap',
		'title'     => esc_html__('Dropcap', 'liviza'),
		'fields'    => array(
			array(
				'type'   	 => 'content',
				'content'	 => esc_html__('This will show text in dropcap style.', 'liviza'),
			),
			array(
				'id'        	=> 'style',
				'title'     	=> esc_html__('Style', 'liviza'),
				'type'      	=> 'image_select',
				'options'    	=> array(
									''        => get_template_directory_uri() .'/includes/images/dropcap1.png',
									'square'  => get_template_directory_uri() .'/includes/images/dropcap2.png',
									'rounded' => get_template_directory_uri() .'/includes/images/dropcap3.png',
									'round'   => get_template_directory_uri() .'/includes/images/dropcap4.png',
								),
				'default'     	=> ''
			),
			array(
				'id'         	=> 'bgcolor',
				'type'       	=> 'select',
				'title'     	=> esc_html__('Background Color', 'liviza'),
				'options'    	=> array(
									'white' 	    => esc_html__('White', 'liviza'),
									'skincolor'     => esc_html__('Skin Color', 'liviza'),
									'grey' 			=> esc_html__('Grey', 'liviza'),
									'dark' 		    => esc_html__('Dark', 'liviza'),
								),
				'class'         => 'chosen',
				'default'     	=> 'skincolor'
			),
			array(
				'id'         	=> 'color',
				'type'       	=> 'select',
				'title'     	=> esc_html__('Color', 'liviza'),
				'options'    	=> array(
									'skincolor'     => esc_html__('Skin Color', 'liviza'),
									'white' 	    => esc_html__('White', 'liviza'),
									'grey' 			=> esc_html__('Grey', 'liviza'),
									'dark' 		    => esc_html__('Dark', 'liviza'),
								),
				'class'         => 'chosen',
				'default'     	=> 'skincolor'
			),
			 array(
				'id'         	=> 'content',
				'type'      	=> 'text',
				'title'     	=> esc_html__('Text', 'liviza'),
				'after'   	 	=> '<div class="cs-text-muted"><br>'.esc_html__('The Letter in this box will be shown Dropcapped', 'liviza').'</div>', 
			),
      ),
    ),
  ),
);
CSFramework_Shortcode_Manager::instance( $options );
