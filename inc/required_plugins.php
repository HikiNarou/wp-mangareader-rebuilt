<?php
/*------------------------------------*\
	Required Plugins
\*------------------------------------*/
function mangastarter_register_required_plugins() {
    $plugins = array(

        array(
            'name'               => 'Advanced Custom Fields',
            'slug'               => 'advanced-custom-fields',
            'required'           => true,
            'force_activation'   => true, // Force activation because we need advanced custom fields,
            'force_deactivation' => false
        ),

        array(
            'name'      => 'ACF Photo Gallery Field',
            'slug'      => 'navz-photo-gallery',
            'required'           => true,
            'force_activation'   => true, // Force activation because we need advanced custom fields,
            'force_deactivation' => false
        ),
		
        array(
            'name'               => 'OtakuHub Manga', // The plugin name.
            'slug'               => 'otakuhub-manga', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/inc/plugins/otakuhub-manga.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),

    );

    $config = array(
        'id'           => 'mangastarter',             // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
		
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'mangastarter' ),
            'menu_title'                      => __( 'Install Plugins', 'mangastarter' ),
            'installing'                      => __( 'Installing Plugin: %s', 'mangastarter' ),
            'updating'                        => __( 'Updating Plugin: %s', 'mangastarter' ),
            'oops'                            => __( 'Something went wrong with the plugin API.', 'mangastarter' ),
            'notice_can_install_required'     => _n_noop(
                'This theme requires the following plugin: %1$s.',
                'This theme requires the following plugins: %1$s.',
                'mangastarter'
            ),
            'notice_can_install_recommended'  => _n_noop(
                'This theme recommends the following plugin: %1$s.',
                'This theme recommends the following plugins: %1$s.',
                'mangastarter'
            ),
            'notice_ask_to_update'            => _n_noop(
                'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                'mangastarter'
            ),
            'notice_ask_to_update_maybe'      => _n_noop(
                'There is an update available for: %1$s.',
                'There are updates available for the following plugins: %1$s.',
                'mangastarter'
            ),
            'notice_can_activate_required'    => _n_noop(
                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                'mangastarter'
            ),
            'notice_can_activate_recommended' => _n_noop(
                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                'mangastarter'
            ),
            'install_link'                    => _n_noop(
                'Begin installing plugin',
                'Begin installing plugins',
                'mangastarter'
            ),
            'update_link' 					  => _n_noop(
                'Begin updating plugin',
                'Begin updating plugins',
                'mangastarter'
            ),
            'activate_link'                   => _n_noop(
                'Begin activating plugin',
                'Begin activating plugins',
                'mangastarter'
            ),
            'return'                          => __( 'Return to Required Plugins Installer', 'mangastarter' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'mangastarter' ),
            'activated_successfully'          => __( 'The following plugin was activated successfully:', 'mangastarter' ),
            'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'mangastarter' ),
            'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'mangastarter' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'mangastarter' ),
            'dismiss'                         => __( 'Dismiss this notice', 'mangastarter' ),
            'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'mangastarter' ),
            'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'mangastarter' ),

            'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
        ),
    );

    tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'mangastarter_register_required_plugins' ); // Required Plugins