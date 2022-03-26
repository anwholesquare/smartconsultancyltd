<?php

class liviza_contact_widget extends WP_Widget {


	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		$widget_style = array('classname'   => 'liviza_contact_widget',
							  'description' => esc_html__('Show Contact details with icons.', 'liviza') );
							  
		$widget_define = array('show_id'   => 'themestek_single_contact',
							   'get_tips'  => 'true',
							   'get_title' => 'true');
							   
		$control_styles = array('width'   => 300,
								'height'  => 350,
								'id_base' => 'liviza_contact_widget');
								
		$widget_change = array('change1' => 'delay',
							   'change2' => 'effect',
							   'change3' => 'slide',
							   'change4' => 100,
							   'change5' => 0);
							   
		parent::__construct(
			'liviza_contact_widget', // Base ID
			esc_html__('Liviza Contact Widget', 'liviza'), // Name
			$widget_style // Args
		);
	}


	function widget( $args, $cur_instance ) {
		extract( $args );
		
		$title   = apply_filters( 'widget_title', $cur_instance['title'] );
		$Phone   = $cur_instance['Phone'];
		$Email   = $cur_instance['Email'];
		$Website = $cur_instance['Website'];
		$Address = $cur_instance['Address'];
		$Time    = $cur_instance['Time'];
		
		
		/*
		 *  WPML Translation ready
		 */
		


		// Address
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'Liviza Contact Widget', 'Address' . $this->id, $Address );
		}
		if ( function_exists( 'icl_t' ) ) {
			$Address = icl_t( 'Liviza Contact Widget', 'Address' . $this->id, $Address );
		}

		// Phone
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'Liviza Contact Widget', 'Phone Number' . $this->id, $Phone );
		}
		if ( function_exists( 'icl_t' ) ) {
			$Phone = icl_t( 'Liviza Contact Widget', 'Phone Number' . $this->id, $Phone );
		}
		
		// Email
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'Liviza Contact Widget', 'Email Address' . $this->id, $Email );
		}
		if ( function_exists( 'icl_t' ) ) {
			$Email = icl_t( 'Liviza Contact Widget', 'Email Address' . $this->id, $Email );
		}
		
		// Website
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'Liviza Contact Widget', 'Website URL' . $this->id, $Website );
		}
		if ( function_exists( 'icl_t' ) ) {
			$Website = icl_t( 'Liviza Contact Widget', 'Website URL' . $this->id, $Website );
		}
		

		
		// Time
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'Liviza Contact Widget', 'Time' . $this->id, $Time );
		}
		if ( function_exists( 'icl_t' ) ) {
			$Time = icl_t( 'Liviza Contact Widget', 'Time' . $this->id, $Time );
		}
		
		
		echo wp_kses( /* html Filter */
			$before_widget,
			array(
				'aside' => array(
					'id'    => array(),
					'class' => array(),
				),
				'strong' => array(),
				'div' => array(
					'id'    => array(),
					'class' => array(),
				),
				'span' => array(
					'class' => array(),
				),
				'h2' => array(
					'class' => array(),
					'id'    => array(),
				),
				'h3' => array(
					'class' => array(),
					'id'    => array(),
				),
				'h4' => array(
					'class' => array(),
					'id'    => array(),
				),
				
			)
		);
		
		
		if ( !empty($title) ){
			$contact_widget_title = $before_title . $title . $after_title;
			echo wp_kses( /* html Filter */
				$contact_widget_title,
				array(
					'aside' => array(
						'id'    => array(),
						'class' => array(),
					),
					'div' => array(
						'id'    => array(),
						'class' => array(),
					),
					'strong' => array(),
					'span'   => array(
						'class' => array(),
					),
					'h2' => array(
						'class' => array(),
						'id'    => array(),
					),
					'h3' => array(
						'class' => array(),
						'id'    => array(),
					),
					'h4' => array(
						'class' => array(),
						'id'    => array(),
					),
					
				)
			);
		}
		?>
		
		<ul class="liviza_contact_widget_wrapper">
			<?php if( trim($Address)!='' ): ?><li class="themestek-contact-address  themestek-liviza-icon-location-pin">
			<?php 
				echo wp_kses( /* html Filter */
					$Address,
					array(
						'br'     => array(),
						'div'	 => array(
							'id'    => array(),
							'class' => array(),
						),
						'strong' => array(),
					)
				);
			?>
			</li><?php endif; ?>
			<?php if( trim($Phone)!='' ): ?><li class="themestek-contact-phonenumber themestek-liviza-icon-mobile"><?php 
				echo wp_kses( /* html Filter */
					$Phone,
					array(
						'br'     => array(),
						'div'	 => array(
							'id'    => array(),
							'class' => array(),
						),
						'strong' => array(),
					)
				);
			?></li><?php endif; ?>

			<?php if( trim($Email)!='' ): ?><li class="themestek-contact-email themestek-liviza-icon-comment-1"><?php 
				echo wp_kses( /* html Filter */
					$Email,
					array(
						'br'     => array(),
						'div'	 => array(
							'id'    => array(),
							'class' => array(),
						),
						'strong' => array(),
					)
				);
			?></li><?php endif; ?>


			<?php if( trim($Website)!='' ): ?><li class="themestek-contact-website  themestek-liviza-icon-world"><?php 
				echo wp_kses( /* html Filter */
					$Website,
					array(
						'br'     => array(),
						'div'	 => array(
							'id'    => array(),
							'class' => array(),
						),
						'strong' => array(),
					)
				);
			?></li><?php endif; ?>


			<?php if( trim($Time)!='' ): ?><li class="themestek-contact-time themestek-liviza-icon-clock">
			<?php 
				echo wp_kses( /* html Filter */
					$Time,
					array(
						'br'     => array(),
						'div'	 => array(
							'id'    => array(),
							'class' => array(),
						),
						'strong' => array(),
					)
				);
			?></li><?php endif; ?>
		</ul>
		
		<?php
		echo wp_kses( /* html Filter */
			$after_widget,
			array(
				'aside' => array(
					'id'    => array(),
					'class' => array(),
				),
				'div' => array(
					'id'    => array(),
					'class' => array(),
				),
				'span' => array(
					'class' => array(),
				),
				'h2' => array(
					'class' => array(),
					'id'    => array(),
				),
				'h3' => array(
					'class' => array(),
					'id'    => array(),
				),
				'h4' => array(
					'class' => array(),
					'id'    => array(),
				),
				
			)
		);
		
	}
		
	function update( $new_instance, $org_instance ) {
		$cur_instance = $org_instance;
		$cur_instance['title']   = $new_instance['title'];
		$cur_instance['Phone']   = $new_instance['Phone'];
		$cur_instance['Email']   = $new_instance['Email'];
		$cur_instance['Website'] = $new_instance['Website'];
		$cur_instance['Address'] = $new_instance['Address']; 
		$cur_instance['Time']    = $new_instance['Time']; 
		return $cur_instance;
	}
		 
	function form( $cur_instance ) {
		$defaults = array('title'   => 'Get in touch',
					    //'class' => 'flickr',
						'Phone'   => '(+01) 123 456 7890',
						'Email'   => 'info@example.com',
						'Website' => 'www.example.com',
						'Address' => "Honey Business \n 24 Fifth st., Los Angeles, \n USA",
						'Time'    => "Mon to Sat - 9:00am to 6:00pm \n (Sunday Closed)",
		);
		
		$cur_instance = wp_parse_args( (array) $cur_instance, $defaults ); ?>

		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title', 'liviza'); ?>:</label>
			<input type="text" class="widefat" id="<?php echo esc_html($this->get_field_id( 'title' )); ?>" name="<?php echo esc_html($this->get_field_name( 'title' )); ?>" value="<?php echo wp_kses( /* html Filter */
				$cur_instance['title'],
				array(
					'br'     => array(),
					'div'	 => array(
						'id'    => array(),
						'class' => array(),
					),
					'strong' => array(),
				)
			); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'Address' )); ?>"><?php esc_html_e('Address', 'liviza'); ?>:</label>
			<textarea class="widefat" id="<?php echo esc_html($this->get_field_id( 'Address' )); ?>" name="<?php echo esc_html($this->get_field_name( 'Address' )); ?>"><?php echo wp_kses( /* html Filter */
				$cur_instance['Address'],
				array(
					'br'     => array(),
					'div'	 => array(
						'id'    => array(),
						'class' => array(),
					),
					'strong' => array(),
				)
			); ?></textarea>
		</p>
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'Phone' )); ?>"><?php esc_html_e('Phone', 'liviza'); ?>:</label>
			<textarea class="widefat" id="<?php echo esc_html($this->get_field_id( 'Phone' )); ?>" name="<?php echo esc_html($this->get_field_name( 'Phone' )); ?>"><?php echo wp_kses( /* html Filter */
				$cur_instance['Phone'],
				array(
					'br'     => array(),
					'div'	 => array(
						'id'    => array(),
						'class' => array(),
					),
					'strong' => array(),
				)
			); ?></textarea>
		</p>
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'Email' )); ?>"><?php esc_html_e('Email', 'liviza'); ?>:</label>
			<textarea class="widefat" id="<?php echo esc_html($this->get_field_id( 'Email' )); ?>" name="<?php echo esc_html($this->get_field_name( 'Email' )); ?>"><?php echo wp_kses( /* html Filter */
				$cur_instance['Email'],
				array(
					'br'     => array(),
					'div'	 => array(
						'id'    => array(),
						'class' => array(),
					),
					'strong' => array(),
				)
			); ?></textarea>
		</p>
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'Website' )); ?>"><?php esc_html_e('Website', 'liviza'); ?>:</label>
			<textarea class="widefat" id="<?php echo esc_html($this->get_field_id( 'Website' )); ?>" name="<?php echo esc_html($this->get_field_name( 'Website' )); ?>"><?php echo wp_kses( /* html Filter */
				$cur_instance['Website'],
				array(
					'br'     => array(),
					'div'	 => array(
						'id'    => array(),
						'class' => array(),
					),
					'strong' => array(),
				)
			); ?></textarea>
		</p>
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'Time' )); ?>"><?php esc_html_e('Time', 'liviza'); ?>:</label>
			<textarea class="widefat" id="<?php echo esc_html($this->get_field_id( 'Time' )); ?>" name="<?php echo esc_html($this->get_field_name( 'Time' )); ?>"><?php echo wp_kses( /* html Filter */
				$cur_instance['Time'],
				array(
					'br'     => array(),
					'div'	 => array(
						'id'    => array(),
						'class' => array(),
					),
					'strong' => array(),
				)
			); ?></textarea>
		</p>
		
		
		<?php
	}
}
register_widget( 'liviza_contact_widget' );
