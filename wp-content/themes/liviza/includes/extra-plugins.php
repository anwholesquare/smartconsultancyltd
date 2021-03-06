<?php
add_action( 'tgmpa_register', 'themestek_register_required_plugins' );
// Install Plugins when activate theme
function themestek_register_required_plugins(){
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'     				=> esc_html('WPBakery Page Builder'), // The plugin name
			'slug'     				=> esc_html('js_composer'), // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/includes/plugins/js_composer.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> esc_html('6.6.0'),
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html('Slider Revolution'), // The plugin name
			'slug'     				=> esc_html('revslider'), // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/includes/plugins/revslider.zip', // The plugin source
			'required' 				=> true,
			'version' 				=> esc_html('6.4.8'),
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> esc_html('ThemeStek Extras for Liviza Theme'), // The plugin name
			'slug'     				=> esc_html('themestek-liviza-extras'), // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/includes/plugins/themestek-liviza-extras.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> esc_html('2.6'), // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html('CF Post Formats'), // The plugin name
			'slug'     				=> esc_html('cf-post-formats'), // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/includes/plugins/cf-post-formats.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html('Envato Market'), // The plugin name
			'slug'     				=> esc_html('envato-market'), // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/includes/plugins/envato-market.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> esc_html('2.0.1'), // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     => esc_html('Classic Editor'),
			'slug'     => esc_html('classic-editor'),
			'required' => true,
		),

		array(
			'name'     => esc_html('Breadcrumb NavXT'),
			'slug'     => esc_html('breadcrumb-navxt'),
			'required' => true,
		),
		array(
			'name'     => esc_html('Contact Form 7'),
			'slug'     => esc_html('contact-form-7'),
			'required' => true,
		),
		array(
			'name'     => esc_html('Widget CSS Classes'),
			'slug'     => esc_html('widget-css-classes'),
			'required' => true,
		),

		array(
			'name'     => esc_html('Mailchimp for WordPress'),
			'slug'     => esc_html('mailchimp-for-wp'),
			'required' => true,
		),
	);
	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'id'			 => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	 => '', // Default absolute path to pre-packaged plugins.
		'menu'			 => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'	 => 'themes.php', // Parent menu slug.
		'capability'	 => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	 => true, // Show admin notices or not.
		'dismissable'	 => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg'	 => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	 => false, // Automatically activate plugins after installation or not.
		'message'		 => '', // Message to output right before the plugins table.
		'strings'		 => array(
			'page_title'						 => esc_html__( 'Install Required Plugins', 'liviza' ),
			'menu_title'						 => esc_html__( 'Install Plugins', 'liviza' ),
			'installing'						 => esc_html__( 'Installing Plugin: %s', 'liviza' ), // %s = plugin name.
			'oops'								 => esc_html__( 'Something went wrong with the plugin API.', 'liviza' ),
			'notice_can_install_required'		 => _n_noop(
			'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'liviza'
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'	 => _n_noop(
			'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'liviza'
			), // %1$s = plugin name(s).
			'notice_cannot_install'				 => _n_noop(
			'Sorry, but you do not have the correct permissions to install the %1$s plugin.', 'Sorry, but you do not have the correct permissions to install the %1$s plugins.', 'liviza'
			), // %1$s = plugin name(s).
			'notice_ask_to_update'				 => _n_noop(
			'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'liviza'
			), // %1$s = plugin name(s).
			'notice_ask_to_update_maybe'		 => _n_noop(
			'There is an update available for: %1$s.', 'There are updates available for the following plugins: %1$s.', 'liviza'
			), // %1$s = plugin name(s).
			'notice_cannot_update'				 => _n_noop(
			'Sorry, but you do not have the correct permissions to update the %1$s plugin.', 'Sorry, but you do not have the correct permissions to update the %1$s plugins.', 'liviza'
			), // %1$s = plugin name(s).
			'notice_can_activate_required'		 => _n_noop(
			'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'liviza'
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended'	 => _n_noop(
			'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'liviza'
			), // %1$s = plugin name(s).
			'notice_cannot_activate'			 => _n_noop(
			'Sorry, but you do not have the correct permissions to activate the %1$s plugin.', 'Sorry, but you do not have the correct permissions to activate the %1$s plugins.', 'liviza'
			), // %1$s = plugin name(s).
			'install_link'						 => _n_noop(
			'Begin installing plugin', 'Begin installing plugins', 'liviza'
			),
			'update_link'						 => _n_noop(
			'Begin updating plugin', 'Begin updating plugins', 'liviza'
			),
			'activate_link'						 => _n_noop(
			'Begin activating plugin', 'Begin activating plugins', 'liviza'
			),
			'return'							 => esc_html__( 'Return to Required Plugins Installer', 'liviza' ),
			'plugin_activated'					 => esc_html__( 'Plugin activated successfully.', 'liviza' ),
			'activated_successfully'			 => esc_html__( 'The following plugin was activated successfully :', 'liviza' ),
			'plugin_already_active'				 => esc_html__( 'No action taken. Plugin %1$s was already active.', 'liviza' ), // %1$s = plugin name(s).
			'plugin_needs_higher_version'		 => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'liviza' ), // %1$s = plugin name(s).
			'complete'							 => esc_html__( 'All plugins installed and activated successfully. %1$s', 'liviza' ), // %s = dashboard link.
			'contact_admin'						 => esc_html__( 'Please contact the administrator of this site for help.', 'liviza' ),
			'nag_type'							 => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);
	tgmpa( $plugins, $config );
}
