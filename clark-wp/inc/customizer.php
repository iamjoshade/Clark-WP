<?php
/**
 * clark Theme Customizer
 *
 * @package clark
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function clark_wp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'clark_wp_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'clark_wp_customize_partial_blogdescription',
		) );
	}


        $wp_customize->add_section(

        'sec_count', array(
            'title'             => 'Award Counter Section',
            'description'       => 'Completed Jobs, Awards, Etc.'
        )
    );

            // Field 1 - Award Text

            $wp_customize->add_setting(
                'set_award_text', array(
                    'type'                  => 'theme_mod',
                    'default'               => '',
                    'sanitize_callback'     => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_award_text', array(
                'label'                   =>  'Award Text Goes Here',
                'description'             =>  'Enter Awards Text Here',
                'section'                 =>  'sec_count',
                'type'                    =>  'text'
                )
            );


             // Field 1 - Award Number

            $wp_customize->add_setting(
                'set_award_count', array(
                    'type'                  => 'theme_mod',
                    'default'               => '',
                    'sanitize_callback'     => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_award_count', array(
                'label'                   =>  'Number of Awards Won',
                'description'             =>  'Enter Numbers of Awards Won',
                'section'                 =>  'sec_count',
                'type'                    =>  'text'
                )
            );


            // Field 1 - Completed Project Text Goes Here

            $wp_customize->add_setting(
                'set_completed_project_text', array(
                    'type'                  => 'theme_mod',
                    'default'               => '',
                    'sanitize_callback'     => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_completed_project_text', array(
                'label'                   =>  'Completed Project Text Goes Here',
                'description'             =>  'Enter Completed Text Here',
                'section'                 =>  'sec_count',
                'type'                    =>  'text'
                )
            );


            //  Number of Completed Project.

            $wp_customize->add_setting(
                'set_number_completed_project_text', array(
                    'type'                  => 'theme_mod',
                    'default'               => '',
                    'sanitize_callback'     => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_number_completed_project_text', array(
                'label'                   =>  'Number of completed Project',
                'description'             =>  'Enter Number of Completed Project',
                'section'                 =>  'sec_count',
                'type'                    =>  'text'
                )
            );


            //  Happy customer Text

            $wp_customize->add_setting(
                'set_happy_customer_text', array(
                    'type'                  => 'theme_mod',
                    'default'               => '',
                    'sanitize_callback'     => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_happy_customer_text', array(
                'label'                   =>  'Happy Customer Text Goes Here',
                'description'             =>  'Enter Happy Customer Here',
                'section'                 =>  'sec_count',
                'type'                    =>  'text'
                )
            );


            //  Happy customer number

            $wp_customize->add_setting(
                'set_happy_customer_number', array(
                    'type'                  => 'theme_mod',
                    'default'               => '',
                    'sanitize_callback'     => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_happy_customer_number', array(
                'label'                   =>  'Happy Customer Number Goes Here',
                'description'             =>  'Enter Happy Customer Numbers Here',
                'section'                 =>  'sec_count',
                'type'                    =>  'text'
                )
            );


            //  Coffee Number Text

            $wp_customize->add_setting(
                'set_coffee_number_text', array(
                    'type'                  => 'theme_mod',
                    'default'               => '',
                    'sanitize_callback'     => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_coffee_number_text', array(
                'label'                   =>  'Coffee Number Text Goes Here',
                'description'             =>  'Enter Coffee Numbers Text Here',
                'section'                 =>  'sec_count',
                'type'                    =>  'text'
                )
            );

            //  Coffee Number Text

            $wp_customize->add_setting(
                'set_coffee_number', array(
                    'type'                  => 'theme_mod',
                    'default'               => '',
                    'sanitize_callback'     => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_coffee_number', array(
                'label'                   =>  'Coffee Number Goes Here',
                'description'             =>  'Enter Coffee Numbers Here',
                'section'                 =>  'sec_count',
                'type'                    =>  'text'
                )
            );




	// Contact Section

    $wp_customize->add_section(

        'sec_contact', array(
            'title'             => 'Contact Us Settings',
            'description'       => 'Contact Us Section'
        )
    );

            // Field 1 - contact Address

            $wp_customize->add_setting(
                'set_contact_address', array(
                    'type'                  => 'theme_mod',
                    'default'               => '',
                    'sanitize_callback'     => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_contact_address', array(
                'label'                   =>  'Contact Address Goes here',
                'description'             =>  'Enter Your Address Here',
                'section'                 =>  'sec_contact',
                'type'                    =>  'text'
                )
            );


            // Field 1 - contact phone number

            $wp_customize->add_setting(
                'set_contact_number', array(
                    'type'                  => 'theme_mod',
                    'default'               => '',
                    'sanitize_callback'     => 'sanitize_text_field'
                )
            );

             $wp_customize->add_control(
                'set_contact_number', array(
                'label'                   =>  'Contact Phone Number',
                'description'             =>  'Enter Your Phone Number Here Seperate with Comma if its more than one.',
                'section'                 =>  'sec_contact',
                'type'                    =>  'text'
                )
            );

              // contact email

            $wp_customize->add_setting(
                'set_contact_email', array(
                    'type'                  => 'theme_mod',
                    'default'               => '',
                    'sanitize_callback'     => 'sanitize_email'
                )
            );

             $wp_customize->add_control(
                'set_contact_email', array(
                'label'                   =>  'Contact Email',
                'description'             =>  'Enter Your Contact Email',
                'section'                 =>  'sec_contact',
                'type'                    =>  'email'
                )
            );

              // website Link

            $wp_customize->add_setting(
                'set_contact_website', array(
                    'type'                  => 'theme_mod',
                    'default'               => '',
                    'sanitize_callback'     => 'esc_url_raw'
                )
            );

             $wp_customize->add_control(
                'set_contact_website', array(
                'label'                   =>  'Your Website URL',
                'description'             =>  'Enter Your Website Url Here',
                'section'                 =>  'sec_contact',
                'type'                    =>  'url'
                )
            );


	 // Copyright Section

    $wp_customize->add_section(

        'sec_copyright', array(
            'title'             => 'Copyright Settings',
            'description'       => 'Copyright Section'
        )
    );

            // Field 1 - copyright textbox

            $wp_customize->add_setting(
                'set_copyright', array(
                    'type'                  => 'theme_mod',
                    'default'               => '',
                    'sanitize_callback'     => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_copyright', array(
                'label'                   =>  'CopyRight Information',
                'description'             =>  'Please Add Your Copyright Information Here',
                'section'                 =>  'sec_copyright',
                'type'                    =>  'text'
                )
            );






}
add_action( 'customize_register', 'clark_wp_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function clark_wp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function clark_wp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function clark_wp_customize_preview_js() {
	wp_enqueue_script( 'clark-wp-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'clark_wp_customize_preview_js' );



