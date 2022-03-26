<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Background
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_themestek_background extends CSFramework_Options {
  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }
  public function output() {
	echo wp_kses( $this->element_before(),
		array(
			'div' => array(
				'class' => array(),
				'id'    => array(),
			),
			'a' => array(
				'href'  => array(),
				'title' => array(),
				'class' => array()
			),
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
			'span'   => array(
				'class'  => array(),
			),
			'ol'     => array(),
			'ul'     => array(
				'class'  => array(),
			),
			'li'     => array(
				'class'  => array(),
			),
		)
	);
    $value_defaults = array(
      'image'       => '',
      'repeat'      => '',
      'position'    => '',
      'attachment'  => '',
	  'size'        => '',
      'color'       => '',
    );
    $this->value    = wp_parse_args( $this->element_value(), $value_defaults );
    $upload_type    = ( isset( $upload_type  ) ) ? $upload_type  : 'image';
    $button_title   = ( isset( $button_title ) ) ? $button_title : esc_html__( 'Upload', 'liviza' );
    $frame_title    = ( isset( $frame_title  ) ) ? $frame_title  : esc_html__( 'Upload', 'liviza' );
    $insert_title   = ( isset( $insert_title ) ) ? $insert_title : esc_html__( 'Use Image', 'liviza' );
	$preview = '';
    $value   = ( isset($this->value['image']) ) ? $this->value['image'] : '' ;
	$valueid = ( isset($this->value['imageid']) ) ? $this->value['imageid'] : '' ;
    $hidden       = ( empty( $value ) )  ? ' hidden' : '';
	$hidden_text  = ( !empty( $value ) ) ? ' hidden' : '';
	$btntext_add    = esc_html__('Add image','liviza');
	$btntext_change = esc_html__('Change image','liviza');
	$btntext        = ( empty( $value ) )  ? esc_html__('Add image','liviza') : esc_html__('Change image','liviza');
    if( ! empty( $value ) ) {
      $attachment = wp_get_attachment_image_src( $valueid, 'thumbnail' );
		if( !empty($attachment[0]) ){
			$preview = $attachment[0];
		}
		else{
			$preview = '';
		}
    }
	if( empty($preview) ){
		$preview = $value;
	}
	echo '<div class="themestek-cs-background-wrapper">';
	// Translation ready button text
	echo '<span class="themestek-cs-background-text-add-image" style="display:none;">'.esc_html__('Add image','liviza').'</span>';
	echo '<span class="themestek-cs-background-text-change-image" style="display:none;">'.esc_html__('Change image','liviza').'</span>';
	// Image selector wrapper
	echo '<div class="themestek-cs-background-image-picker">';
	echo '<div class="themestek-cs-background-image-picker-inner">';
	echo '<div class="cs-image-preview"><div class="cs-preview"><div class="cs-preview-inner">
			<i class="fa fa-times cs-remove themestek-cs-remove'. esc_attr($hidden) .'"></i>
			<img src="'. esc_url($preview) .'" alt="' . esc_attr__('Preview','liviza') . '" class="'. esc_attr($hidden) .'" />
			<div class="themestek-cs-background-heading-noimg'. esc_html($hidden_text) .'"> ' . esc_html__('No image selected for background','liviza') . ' </div>
		</div></div></div>';
    echo '<a href="javascript:void(0)" class="button button-primary cs-add">'. ( ( empty( $value ) ) ? esc_html__('Add image','liviza') : esc_html__('Change image','liviza') ) .'</a>';
    echo '<input type="text" name="'. esc_attr($this->element_name('[image]')) .'" value="'. esc_url($this->value['image']) .'"'. $this->element_class('themestek-background-image') . $this->element_attributes() .'/>';
	echo '<input type="text" name="'. esc_attr($this->element_name('[imageid]')) .'" value="'. esc_attr($valueid) .'" class="themestek-background-imageid"/>';
	echo '</div> <!-- .themestek-cs-background-image-picker-inner --> ';
	echo '</div> <!-- .themestek-cs-background-image-picker --> ';
    // background attributes
    echo '<fieldset>';
	echo '<div class="themestek-cs-background-options-wrapper-top">';
	echo '<div class="themestek-background-option">';
	echo '<label class="themestek-background-repeat">';
	echo '<small>BG image repeat</small>';
    echo cs_add_element( array(
        'pseudo'          => true,
        'type'            => 'select',
        'name'            => esc_html($this->element_name( '[repeat]' )),
        'options'         => array(
          ''              => 'repeat',
          'repeat-x'      => 'repeat-x',
          'repeat-y'      => 'repeat-y',
          'no-repeat'     => 'no-repeat',
          'inherit'       => 'inherit',
        ),
        'attributes'      => array(
          'data-atts'     => 'repeat',
        ),
        'value'           => esc_html($this->value['repeat'])
    ) );
	echo '</label>';
	echo '</div>';
	echo '<div class="themestek-background-option">';
	echo '<label class="themestek-background-position">';
	echo '<small>'. esc_html__('BG image position','liviza') .'</small>';
    echo cs_add_element( array(
        'pseudo'          => true,
        'type'            => 'select',
        'name'            => esc_html($this->element_name( '[position]' )),
        'options'         => array(
          ''              => 'left top',
          'left center'   => 'left center',
          'left bottom'   => 'left bottom',
          'right top'     => 'right top',
          'right center'  => 'right center',
          'right bottom'  => 'right bottom',
          'center top'    => 'center top',
          'center center' => 'center center',
          'center bottom' => 'center bottom'
        ),
        'attributes'      => array(
          'data-atts'     => 'position',
        ),
        'value'           => esc_html($this->value['position'])
    ) );
	echo '</label>';
	echo '</div>';
    echo '<div class="themestek-background-option">';
	echo '<label class="themestek-background-attachment">';
	echo '<small>'. esc_html__('BG image attachment','liviza') .'</small>';
    echo cs_add_element( array(
        'pseudo'          => true,
        'type'            => 'select',
        'name'            => esc_html($this->element_name( '[attachment]' )),
        'options'         => array(
          ''              => 'scroll',
          'fixed'         => 'fixed',
        ),
        'attributes'      => array(
          'data-atts'     => 'attachment',
        ),
        'value'           => esc_html($this->value['attachment'])
    ) );
	echo '</label>';
	echo '</div>';
	echo ' <div class="clr clear"></div> ';
	echo '</div> <!-- .themestek-cs-background-options-wrapper-top --> ';
	echo '<div class="themestek-cs-background-options-wrapper-bottom">';
	echo '<div class="themestek-background-option">';
	echo '<label class="themestek-background-size">';
	echo '<small>'. esc_html__('BG image size','liviza') .'</small>';
    echo cs_add_element( array(
        'pseudo'          => true,
        'type'            => 'select',
        'name'            => esc_html($this->element_name( '[size]' )),
        'options'         => array(
		  ''                => 'Auto',
          'cover'           => 'Cover',
          'fixed'           => 'Contain',
        ),
        'attributes'      => array(
          'data-atts'     => 'size',
        ),
        'value'           => esc_html($this->value['size'])
    ) );
	echo '</label>';
	echo '</div>';
	if( isset($this->field['color']) && $this->field['color']==false ){
		// Do nothing
	} else {
		echo '<div class="themestek-background-option themestek-background-color-w">';
		echo '<label class="themestek-background-color">';
		echo '<small>'. esc_html__('BG image color','liviza') .'</small>';
		echo cs_add_element( array(
			'pseudo'          => true,
			'id'              => esc_html($this->field['id'].'_color'),
			'type'            => 'color_picker',
			'name'            => esc_html($this->element_name('[color]')),
			'attributes'      => array(
			  'data-atts'     => 'bgcolor',
			),
			'value'           => esc_html($this->value['color']),
			'default'         => ( isset( $this->field['default']['color'] ) ) ? $this->field['default']['color'] : '',
			'rgba'            => ( isset( $this->field['rgba'] ) && $this->field['rgba'] === false ) ? false : '',
		) );
		echo '</label>';
		echo '</div>';
	};
				echo '<div class="clear clr"></div> <!-- clear --> ';
			echo '</div> <!-- .themestek-cs-background-options-wrapper-bottom --> ';
		echo '</fieldset>';
		echo '<div class="clear clr"></div> <!-- clear --> ';
	echo '</div> <!-- .themestek-cs-background-wrapper --> ';
	echo wp_kses( $this->element_after(),
		array(
			'div' => array(
				'class' => array(),
				'id'    => array(),
			),
			'a' => array(
				'href'  => array(),
				'title' => array(),
				'class' => array()
			),
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
			'span'   => array(
				'class'  => array(),
			),
			'ol'     => array(),
			'ul'     => array(
				'class'  => array(),
			),
			'li'     => array(
				'class'  => array(),
			),
		)
	);
  }
}
